@extends('layouts.list')

@section('title', 'Vendors')
@section('category', 'vendor')

@section('table')
    <table class="table" id="modelList"
           data-toggle="table"
           data-url="{{ route('vendor.list') }}"
           data-id-field="id"
           data-sort-name="name"
           data-mobile-responsive="true"
    >
        <thead>
        <tr>
            <th data-field="checkbox" data-checkbox="true">Checkbox</th>
            <th data-field="name" data-sortable="true">Name</th>
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
