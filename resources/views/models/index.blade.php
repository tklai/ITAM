@extends('layouts.list')

@section('title', 'Models')
@section('category', 'models')
@section('createPage', route('models.create'))

@section('table')
    <table class="table" id="modelList"
           data-toggle="table"
           data-url="{{ route('models.list') }}"
           data-id-field="id"
           data-sort-name="name"
           data-search="true"
           data-toolbar="#toolbar"
           data-side-pagination="server"
           data-pagination="true"
           data-pagination-v-align="both"
           data-page-list="[10, 25, 50, ALL]"
           data-mobile-responsive="true"
    >
        <thead>
            <tr>
                <th data-field="name" data-sortable="true" data-formatter="modelDetail">Model Name</th>
                <th data-field="category.name" data-sortable="true">Machine Type</th>
                <th data-field="details" data-sortable="true" data-visible="false">Detail Information</th>
                <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                    data-searchable="false">
                    Actions
                </th>
            </tr>
        </thead>
    </table>
@endsection
