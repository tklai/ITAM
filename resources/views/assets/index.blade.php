@extends('layouts.list')

@section('title', 'Assets')
@section('category', 'assets')
@section('createPage', route('assets.create'))

@section('table')
    <table class="table" id="assetList"
           data-toggle="table"
           data-url="{{ route('assets.list') }}"
           data-id-field="id"
           data-sort-name="location.room_number"
           data-search="true"
           data-show-columns="true"
           data-toolbar="#toolbar"
           data-mobile-responsive="true"
           data-pagination="true"
           data-pagination-v-align="both"
           data-page-list="[25, 50, ALL]"
    >
        <thead>
        <tr>
            <th data-field="checkbox" data-checkbox="true">Checkbox</th>
            <th data-field="asset_model.name" data-sortable="true" data-formatter="assetModelDetail">Model</th>
            <th data-field="machineName" data-sortable="true" data-formatter="assetDetail">Name</th>
            <th data-field="serialNumber" data-sortable="true">Serial No.</th>
            <th data-field="vendor.name" data-sortable="true" data-formatter="assetVendorDetail" data-visible="false">Vendor</th>
            <th data-field="orderDate" data-sortable="true" data-visible="false">Order Date</th>
            <th data-field="warrantyExpiryDate" data-sortable="true" data-cell-style="warrantyCell">Warranty</th>
            <th data-field="location.room_number" data-sortable="true" data-formatter="assetLocationDetail">Location</th>
            <th data-field="created_at" data-sortable="true" data-visible="false">Created at</th>
            <th data-field="updated_at" data-sortable="true" data-visible="false">Updated at</th>
            <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                data-searchable="false">
                Actions
            </th>
        </tr>
        </thead>
    </table>
@endsection
