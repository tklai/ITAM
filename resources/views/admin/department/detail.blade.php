@extends('layouts.list')

@section('title', 'Departments')
@section('category', 'department')
@section('returnPage', 'javascript:window.history.back();')

@section('table')
    <table class="table" id="departmentList"
           data-toggle="table"
           data-url="{{ route('department.list') }}"
           data-id-field="id"
           data-sort-name="id"
           data-mobile-responsive="true"
    >
        <thead>
        <tr>
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="name" data-sortable="true">Name</th>
        </tr>
        </thead>
    </table>
@endsection
