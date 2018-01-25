<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Vendor;
use App\Http\Requests\VendorRequest;

class VendorController extends Controller
{
    public function getList() {
        return Vendor::All();
    }

    public function postAdd(VendorRequest $request) {
        Vendor::create([
            'name'    => $request->input('name'),
            'address' => $request->input('address'),
            'phone'   => $request->input('phone'),
        ]);
        return redirect()->route( 'vendor.index');
    }

    public function getDetail($id = null) {
        $vendor = Vendor::find($id);
        return view('admin.vendor.detail')
            ->with('vendor', $vendor);
    }

    public function getDetailList($id = null) {
        $this->checkNull($id, 'vendor');
        return Asset::with('assetModel')
            ->with('location')
            ->with('vendor')
            ->where('vendor_id', $id)->get();
    }

    public function getEdit($id = null) {
        $this->checkNull($id, 'vendor');
        $vendor = Vendor::find($id);
        return view('admin.vendor.edit')
            ->with('vendor', $vendor);
    }

    public function putUpdate(VendorRequest $request, $id = null) {
        $this->checkNull($id, 'vendor');
        Vendor::find($id)->update([
            'name'    => $request->input('name'),
            'address' => $request->input('address'),
            'phone'   => $request->input('phone'),
        ]);
        return redirect()->route('vendor.index');
    }

    public function postDelete($id = null) {
        $this->checkNull($id, 'vendor');
        Vendor::destroy($id);
        return;
    }

}
