<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display the index page of department management.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('departments.index');
    }

    /**
     * Display a listing of the departments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list() {
        $departments = Department::All();
        return $departments;
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created department in storage.
     *
     * @param  \App\Http\Requests\DepartmentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        Department::create([
            'name' => $request->input('name')
        ]);
        return redirect()->route( 'departments.index');
    }

    /**
     * NOT IMPLEMENTED
     * Original:    Display the specified department.
     * Placeholder: Return to department management index page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('departments.index');
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function edit($id)
    {
        $this->checkNull($id, 'departments');
        $department = Department::findOrFail($id);
        return view('departments.edit')
            ->with('department', $department);
    }

    /**
     * Update the specified department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentRequest $request, $id)
    {
        $this->checkNull($id, 'departments');
        Department::findOrFail($id)->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  int  $id
     * @return null
     */
    public function destroy($id)
    {
        $this->checkNull($id, 'departments');
        Department::destroy($id);
        return null;
    }
}
