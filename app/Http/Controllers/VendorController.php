<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Asset;
use App\Vendor;

class VendorController extends Controller
{
    /**
     * Display an index page of vendor management.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('vendors.index');
    }

    /**
     * Display a listing of the vendors.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return Vendor::All();
    }

    /**
     * Show the form for creating a new vendor.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in vendor.
     *
     * @param  \App\Http\Requests\VendorRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VendorRequest $request)
    {
        $vendor = Vendor::create([
            'name'    => $request->input('name'),
            'address' => $request->input('address'),
            'phone'   => $request->input('phone'),
        ]);
        if ($request->ajax()) {
            return $vendor;
        } else {
            return redirect()->route('vendors.index');
        }
    }

    /**
     * Display the specified vendor.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendors.show')
            ->with('vendor', $vendor);
    }

    /**
     * Display a listing of the assets that related to this vendor.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function assetsList($id)
    {
        $this->checkNull($id, 'vendors');
        return Asset::with('assetModel')
            ->with('location')
            ->with('vendor')
            ->where('vendor_id', $id)->get();
    }

    /**
     * Show the form for editing the specified vendor.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function edit($id)
    {
        $this->checkNull($id, 'vendors');
        $vendor = Vendor::findOrFail($id);
        return view('vendors.edit')
            ->with('vendor', $vendor);
    }

    /**
     * Update the specified vendor in storage.
     *
     * @param  \App\Http\Requests\VendorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VendorRequest $request, $id)
    {
        $this->checkNull($id, 'vendors');
        Vendor::findOrFail($id)->update([
            'name'    => $request->input('name'),
            'address' => $request->input('address'),
            'phone'   => $request->input('phone'),
        ]);
        return redirect()->route('vendors.index');
    }

    /**
     * Remove the specified vendor from storage.
     *
     * @param  int  $id
     * @return null
     */
    public function destroy($id)
    {
        $this->checkNull($id, 'vendors');
        Vendor::destroy($id);
        return;
    }
}
