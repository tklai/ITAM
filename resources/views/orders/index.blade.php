@extends('layouts.list')

@section('title', 'Orders')
@section('category', 'orders')

@section('table')
    <table class="table" id="orderList"
           data-toggle="table"
           data-url="{{ route('order.list') }}"
           data-id-field="id"
           data-sort-name="deliveryDate"
           data-sort-order="desc"
           data-mobile-responsive="true"
    >
        <thead>
        <tr>
            <th data-field="orderNumber" data-sortable="true" data-visible="true">Order Number</th>
            <th data-field="deliveryDate" data-sortable="true">Delivery Date</th>
            <th data-field="warrantyExpiryDate" data-sortable="true">Exp. Date</th>
            <th data-field="vendor.name" data-sortable="true">Vendor</th>
            <th data-field="type" data-sortable="true">Type</th>
            <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                data-searchable="false">
                Actions
            </th>
        </tr>
        </thead>
    </table>
@endsection
