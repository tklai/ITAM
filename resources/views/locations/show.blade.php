@extends('layouts.show')

@section('title', "View Location: {$location->room_number}")
@section('category', 'locations')
@section('returnPage', route('locations.index'))

@section('tab-items')
    <li class="nav-item">
        <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail"
           aria-selected="true">Location Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="assets-tab" data-toggle="tab" href="#assets" role="tab" aria-controls="assets"
           aria-selected="false">Assets</a>
    </li>
@endsection

@section('tab-contents')
    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Room Number</td>
                    <td>{{ $location->room_number }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $location->description }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="assets" role="tabpanel" aria-labelledby="assets-tab">
        <div class="table-responsive">
            <table class="table" id="assetsList" data-toggle="table"
                   data-url="{{ route('locations.assets', ['id' => $location->id ]) }}"
                   data-id-field="id"
                   data-sort-name="id"
                   data-search="true"
                   data-show-columns="true"
                   data-mobile-responsive="true"
                   data-pagination="true"
                   data-pagination-v-align="both"
                   data-page-list="[10, 25, 50, ALL]">
                <thead>
                <tr>
                    <th data-field="machineName" data-sortable="true" data-formatter="assetDetail">Name</th>
                    <th data-field="asset_model.name" data-sortable="true" data-formatter="modelDetail">Model</th>
                    <th data-field="serialNumber" data-sortable="true">Serial No.</th>
                    <th data-field="vendor.name" data-sortable="true" data-formatter="vendorDetail">Vendor</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
