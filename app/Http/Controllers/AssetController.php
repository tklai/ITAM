<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AssetRequest;
use App\Asset;
use App\AssetModel;
use App\Location;
use App\Vendor;

class AssetController extends Controller
{

    public function getList() {
        return Asset::with('assetModel')
            ->with('vendor')
            ->with('location')
            ->get();
    }

    public function getAdd() {
        $locations = Location::all();
        $models    = AssetModel::all();
        $vendors   = Vendor::all();
        return view('admin.asset.add')
            ->with('locations', $locations)
            ->with('models', $models)
            ->with('vendors', $vendors);
    }

    public function getDetail($id = null) {
        $asset = Asset::with('assetModel')
            ->with('vendor')
            ->with('location')
            ->find($id);
        return view('admin.asset.detail')->with('asset', $asset);
    }

    public function postAdd(AssetRequest $request) {
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
        return redirect()->route( 'asset.index');
    }

    public function getEdit($id = null) {
        $this->checkNull($id, 'asset');
        $asset     = Asset::find($id);
        $locations = Location::all();
        $models    = AssetModel::all();
        $vendors   = Vendor::all();
        return view('admin.asset.edit')
            ->with('asset', $asset)
            ->with('locations', $locations)
            ->with('models', $models)
            ->with('vendors', $vendors);
    }

    public function putUpdate(AssetRequest $request, $id = null) {
        $this->checkNull($id, 'asset');
        Asset::find($id)->update([
            'machineName'        => $request->input('machineName'),
            'asset_model_id'     => $request->input('asset_model_id'),
            'serialNumber'       => $request->input('serialNumber'),
            'vendor_id'          => $request->input('vendor_id'),
            'orderDate'          => $request->input('orderDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'location_id'        => $request->input('location_id'),
            'remarks'            => $request->input('remarks'),
        ]);
        return redirect()->route('asset.index');
    }

    public function postDelete($id = null) {
        $this->checkNull($id, 'asset');
        Asset::destroy($id);
        return null;
    }

}
