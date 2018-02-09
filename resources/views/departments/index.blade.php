@extends('layouts.list')

@section('title', 'Departments')
@section('category', 'departments')
@section('createPage', route('departments.create'))

@section('table')
    <table class="table" id="departmentList"
           data-toggle="table"
           data-url="{{ route('departments.list') }}"
           data-id-field="id"
           data-sort-name="id"
           data-toolbar="#toolbar"
           data-mobile-responsive="true"
    >
        <thead>
        <tr>
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="name" data-sortable="true">Name</th>
            <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                data-searchable="false">Actions
            </th>
        </tr>
        </thead>
    </table>
@endsection
