<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    public function getList() {
        return Location::All();
    }

    public function postAdd(LocationRequest $request) {
        Location::create([
            'room_number' => $request->input('room_number'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route( 'location.index');
    }

    public function getEdit($id = null) {
        if ($id == null) {
            return redirect()->route('location.index');
        }

        $location = Location::find($id);
        return view('admin.location.edit')
            ->with('location', $location);
    }

    public function putUpdate(LocationRequest $request, $id = null) {
        if ($id == null) {
            return redirect()->route('location.index');
        }

        Location::find($id)->update([
            'room_number' => $request->input('room_number'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('location.index');
    }

    public function postDelete($id) {
        if ($id == null) {
            return redirect()->route('location.index');
        }

        Location::destroy($id);
        return;
    }
}
