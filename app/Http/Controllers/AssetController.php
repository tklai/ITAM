<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Asset;
use App\AssetModel;
use App\Location;
use App\Vendor;

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
        $assets = Asset::with('assetModel')
            ->with('vendor')
            ->with('location')
            ->get();
        return $assets;
    }

    /**
     * Show the form for creating a new asset.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $locations = Location::all();
        $models    = AssetModel::all();
        $vendors   = Vendor::all();
        return view('assets.create')
            ->with('locations', $locations)
            ->with('models', $models)
            ->with('vendors', $vendors);
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
            'remarks'            => $request->input('remarks'),
        ]);
        return redirect()->route( 'assets.index');
    }

    /**
     * Display the specified asset.
     *
     * @param  int $asset
     * @return \Illuminate\View\View
     */
    public function show($asset)
    {
        $asset = Asset::with('assetModel')
            ->with('vendor')
            ->with('location')
            ->findOrFail($asset);
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
        //$asset = Asset::with('assetModel')
        //    ->with('vendor')
        //    ->with('location')
        //    ->findOrFail($id);
        //return view('admin.asset.detail')->with('asset', $asset);
    }

    /**
     * Show the form for editing the specified asset.
     *
     * @param  int $asset
     * @return \Illuminate\View\View
     */
    public function edit($asset)
    {
        $this->checkNull($asset, 'assets');
        $asset     = Asset::findOrFail($asset);
        $locations = Location::all();
        $models    = AssetModel::all();
        $vendors   = Vendor::all();
        return view('assets.edit')
            ->with('asset', $asset)
            ->with('locations', $locations)
            ->with('models', $models)
            ->with('vendors', $vendors);
    }

    /**
     * Update the specified asset in storage.
     *
     * @param  \App\Http\Requests\AssetRequest $request
     * @param  int $asset
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AssetRequest $request, $asset)
    {
        $this->checkNull($asset, 'assets');
        Asset::findOrFail($asset)->update([
            'machineName'        => $request->input('machineName'),
            'asset_model_id'     => $request->input('asset_model_id'),
            'serialNumber'       => $request->input('serialNumber'),
            'vendor_id'          => $request->input('vendor_id'),
            'orderDate'          => $request->input('orderDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'location_id'        => $request->input('location_id'),
            'remarks'            => $request->input('remarks'),
        ]);
        return redirect()->route('assets.index');
    }

    /**
     * Remove the specified asset from storage.
     *
     * @param  int $asset
     * @return null
     */
    public function destroy($asset)
    {
        $this->checkNull($asset, 'assets');
        Asset::destroy($asset);
        return null;
    }
}
