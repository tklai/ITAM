<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AssetRequest;
use App\Asset;
use App\AssetModel;
use App\Category;
use App\Location;
use App\Vendor;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{

    /**
     * Display the index page of asset management.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('assets.index');
    }

    /**
     * Display a listing of the assets.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        $keyword = '%' . $_GET['search'] . '%';
        $total = Asset::count();
        $assets = Asset::with('assetModel', 'location', 'vendor')
                       ->where('serialNumber', 'like', $keyword)
                       ->skip($_GET['offset'])
                       ->take($_GET['limit'])
                       ->get();
        $result['total'] = $total;
        $result['rows'] = $assets;
        return json_encode($result);
    }

    /**
     * Show the form for creating a new asset.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $locations  = Location::all();
        $models     = AssetModel::all();
        $vendors    = Vendor::all();
        return view('assets.create')->with([
            'categories' => $categories,
            'locations'  => $locations,
            'models'     => $models,
            'vendors'    => $vendors
        ]);
    }

    /**
     * Store a newly created asset in storage.
     *
     * @param  \App\Http\Requests\AssetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AssetRequest $request)
    {
        Asset::create([
            'machineName'        => $request->input('machineName'),
            'asset_model_id'     => $request->input('asset_model_id'),
            'serialNumber'       => $request->input('serialNumber'),
            'vendor_id'          => $request->input('vendor_id'),
            'orderDate'          => $request->input('orderDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'location_id'        => $request->input('location_id'),
            'remarks'            => nl2br($request->input('remarks')),
        ]);
        return redirect()->route( 'assets.index');
    }

    /**
     * Display the specified asset.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $asset = Asset::with('assetModel', 'location', 'vendor')
                      ->with(['auditLog' => function($query) { return $query->orderBy('id', 'DESC')->take(1); }])
                      ->findOrFail($id);
        return view('assets.show')->with('asset', $asset);
    }

    /**
     * DISABLED
     * Display a listing of the asset related informations.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function assetsList($id) {
        return null;
        //$asset = Asset::with('assetModel', 'location', 'vendor')
        //              ->findOrFail($id);
        //return view('admin.asset.detail')->with('asset', $asset);
    }

    /**
     * Show the form for editing the specified asset.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->checkNull($id, 'assets');
        $asset          = Asset::findOrFail($id);
        $asset->remarks = $this->br2nl($asset->remarks);
        $locations      = Location::all();
        $models         = AssetModel::all();
        $vendors        = Vendor::all();
        return view('assets.edit')->with([
            'asset'     => $asset,
            'locations' => $locations,
            'models'    => $models,
            'vendors'   => $vendors
        ]);
    }

    /**
     * Update the specified asset in storage.
     *
     * @param  \App\Http\Requests\AssetRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AssetRequest $request, $id)
    {
        $this->checkNull($id, 'assets');
        Asset::findOrFail($id)->update([
            'machineName'        => $request->input('machineName'),
            'asset_model_id'     => $request->input('asset_model_id'),
            'serialNumber'       => $request->input('serialNumber'),
            'vendor_id'          => $request->input('vendor_id'),
            'orderDate'          => $request->input('orderDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'location_id'        => $request->input('location_id'),
            'remarks'            => nl2br($request->input('remarks')),
        ]);
        return redirect()->route('assets.index');
    }

    /**
     * Remove the specified asset from storage.
     *
     * @param  int $id
     * @return null
     */
    public function destroy($id)
    {
        $this->checkNull($id, 'assets');
        Asset::destroy($id);
        return null;
    }

    /**
     * Obtain data that have requested from the database.
     * Return the view with data via ajax call and render it on client-side.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\View\View
     */
    public function getBarcode(Request $request)
    {
        $recievedIDs = $request->get('id');
        foreach ($recievedIDs as $id) {
            $data = Asset::select('id', 'asset_model_id', 'machineName', 'serialNumber')
                         ->with('assetModel:id,name')
                         ->findOrFail($id);
            $result = new \StdClass();
            $result->id           = $data->id;
            $result->serialNumber = $data->serialNumber;
            $result->machineName  = $data->machineName;
            $result->modelName    = $data->assetModel->name;
            $barcodes[] = $result;
        }
        return view('assets.barcode')
            ->with('barcodes', $barcodes);
    }

    /**
     * Display landing page When the user scanned the qr code.
     *
     * @param  Int $id
     * @return \Illuminate\View\View
     */
    public function landing($id)
    {
        $asset = Asset::with('assetModel', 'location', 'maintenance', 'vendor')
                      ->findOrFail($id);
        return view('assets.landing')->with('result', $asset);
    }

    /**
     * Display import page to allow user upload the excel file
     *
     * @return \Illuminate\View\View
     */
    public function getImport()
    {
        return view('assets.import');
    }

    /**
     * Handle uploaded file and read the excel data and import into database.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postImport(Request $request)
    {
        if(!$request->hasFile('excel_file')) {
            return 'File not found';
        } else {
            $file = $request->file('excel_file');
            Excel::selectSheetsByIndex(0)->load($file, function ($reader) {
                $reader->formatDates(true, 'Y-m-d');
                $rows = $reader->get();
                foreach ($rows as $row) {
                    $category = Category::firstOrCreate(['name' => $row['type']]);
                    $model = AssetModel::firstOrCreate(['name' => $row['model']], ['category_id' => $category->id]);
                    $location = Location::firstOrCreate(['room_number' => $row['loc']]);
                    $vendor = Vendor::firstOrCreate(['name' => $row['vendor']]);
                    Asset::create([
                        'machineName'        => $row['name'],
                        'asset_model_id'     => $model->id,
                        'serialNumber'       => $row['serial_no.'],
                        'vendor_id'          => $vendor->id,
                        'orderDate'          => $row['date'],
                        'warrantyExpiryDate' => $row['update'],
                        'location_id'        => $location->id,
                        'remarks'            => nl2br($row['remark']),
                    ]);
                }
            });
        }
        Session::flash('success', 'Import OK!');
        return redirect()->route('assets.index');
    }

}
