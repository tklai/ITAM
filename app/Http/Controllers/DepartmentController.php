<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function getList() {
        return Department::All();
    }

    public function postAdd(DepartmentRequest $request) {
        Department::create([
            'name' => $request->input('name')
        ]);
        return redirect()->route( 'department.index');
    }

    public function getEdit($id = null) {
        if ($id == null) {
            return redirect()->route('department.index');
        }

        $department = Department::find($id);
        return view('admin.department.edit')
            ->with('department', $department);
    }

    public function putUdate(DepartmentRequest $request, $id = null) {
        if ($id == null) {
            return redirect()->route('department.index');
        }

        Department::find($id)->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('department.index');
    }

    public function postDelete($id) {
        if ($id == null) {
            return redirect()->route('department.index');
        }

        Department::destroy($id);
        return;
    }
}
