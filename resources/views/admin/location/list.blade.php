@extends('layouts.list')

@section('title', 'Locations')
@section('category', 'location')

@section('table')
    <table class="table" id="locationList"
           data-toggle="table"
           data-url="{{ route('location.list') }}"
           data-id-field="id"
           data-sort-name="room_number"
           data-mobile-responsive="true"
    >
        <thead>
        <tr>
            <th data-field="checkbox" data-checkbox="true">Checkbox</th>
            <th data-field="room_number" data-sortable="true">Room Number</th>
            <th data-field="description" data-sortable="true">Description</th>
            <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                data-searchable="false">Actions
            </th>
        </tr>
        </thead>
    </table>
@endsection
