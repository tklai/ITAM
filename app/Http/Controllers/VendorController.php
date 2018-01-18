<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Http\Requests\VendorRequest;

class VendorController extends Controller
{
    public function getList() {
        return Vendor::All();
    }

    public function postAdd(VendorRequest $request) {
        Vendor::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);
        return redirect()->route( 'vendor.index');
    }

    public function getEdit($id = null) {
        if ($id == null) {
            return redirect()->route('vendor.index');
        }

        $vendor = Vendor::find($id);
        return view('admin.vendor.edit')
            ->with('vendor', $vendor);
    }

    public function putUpdate(VendorRequest $request, $id = null) {
        if ($id == null) {
            return redirect()->route('vendor.index');
        }

        Vendor::find($id)->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);
        return redirect()->route('vendor.index');
    }

    public function postDelete($id) {
        if ($id == null) {
            return redirect()->route('vendor.index');
        }

        Vendor::destroy($id);
        return;
    }
}
