@extends('layouts.list')

@section('title', 'Vendors')
@section('category', 'vendors')
@section('createPage', route('vendors.create'))

@section('table')
    <table class="table" id="modelList"
           data-toggle="table"
           data-url="{{ route('vendors.list') }}"
           data-id-field="id"
           data-sort-name="name"
           data-toolbar="#toolbar"
           data-mobile-responsive="true"
    >
        <thead>
        <tr>
            <th data-field="name" data-sortable="true" data-formatter="vendorDetail">Name</th>
            <th data-field="address" data-sortable="true">Address</th>
            <th data-field="phone" data-sortable="false" data-formatter="phoneCall">Phone No.</th>
            <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                data-searchable="false">
                Actions
            </th>
        </tr>
        </thead>
    </table>
@endsection
