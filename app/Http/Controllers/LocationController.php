<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Asset;
use App\Location;

class LocationController extends Controller
{

    /**
     * Display an index page of the locations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('locations.index');
    }

    /**
     * Display a listing of the locations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return Location::All();
    }

    /**
     * Show the form for creating a new location.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created location in storage.
     *
     * @param  \App\Http\Requests\LocationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LocationRequest $request)
    {
        $location = Location::create([
            'room_number' => $request->input('room_number'),
            'description' => $request->input('description'),
        ]);
        if ($request->ajax()) {
            return $location;
        } else {
            return redirect()->route('locations.index');
        }
    }

    /**
     * Display the specified location.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.show')
            ->with('location', $location);
    }

    /**
     * Display a listing of the assets that related to this location.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function assetsList($id)
    {
        $this->checkNull($id, 'locations');
        $assets = Asset::select('id', 'machineName', 'serialNumber', 'asset_model_id', 'vendor_id')
                       ->where('location_id', $id)
                       ->with('assetModel:id,name', 'location:id,room_number', 'vendor:id,name')
                       ->get();
        return $assets;
    }

    /**
     * Show the form for editing the specified location.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function edit($id)
    {
        $this->checkNull($id, 'locations');
        $location = Location::findOrFail($id);
        return view('locations.edit')
            ->with('location', $location);
    }

    /**
     * Update the specified location in storage.
     *
     * @param  \App\Http\Requests\LocationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LocationRequest $request, $id)
    {
        $this->checkNull($id, 'locations');
        Location::findOrFail($id)->update([
            'room_number' => $request->input('room_number'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified location from storage.
     *
     * @param  int  $id
     * @return null
     */
    public function destroy($id)
    {
        $this->checkNull($id, 'location');
        Location::destroy($id);
        return null;
    }
}
