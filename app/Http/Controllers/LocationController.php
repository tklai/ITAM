<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Location;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    public function getList() {
        return Location::All();
    }

    public function getDetail($id = null) {
        $location = Location::find($id);
        return view('admin.location.detail')
            ->with('location', $location);
    }

    public function getDetailList($id = null) {
        $this->checkNull($id, 'location');
        return Asset::with('location')
            ->with('vendor')
            ->with('location')
            ->where('location_id', $id)
            ->get();
    }

    public function postAdd(LocationRequest $request) {
        Location::create([
            'room_number' => $request->input('room_number'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route( 'location.index');
    }

    public function getEdit($id = null) {
        $this->checkNull($id, 'location');

        $location = Location::find($id);
        return view('admin.location.edit')
            ->with('location', $location);
    }

    public function putUpdate(LocationRequest $request, $id = null) {
        $this->checkNull($id, 'location');
        Location::find($id)->update([
            'room_number' => $request->input('room_number'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('location.index');
    }

    public function postDelete($id = null) {
        $this->checkNull($id, 'location');
        Location::destroy($id);
        return;
    }

}
