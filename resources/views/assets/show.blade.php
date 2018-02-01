@extends('layouts.show')

@section('title', "View Asset: {$asset->machineName}")
@section('category', 'assets')

@section('tab-items')
    <li class="nav-item">
        <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail"
           aria-selected="true">Asset Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="vendor-tab" data-toggle="tab" href="#vendor" role="tab" aria-controls="vendor"
           aria-selected="true">Call Maintenance</a>
    </li>
@endsection

@section('tab-contents')
    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ $asset->machineName }}</td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td>{{ $asset->assetModel->name }}</td>
                </tr>
                <tr>
                    <td>Serial No.</td>
                    <td>{{ $asset->serialNumber }}</td>
                </tr>
                <tr>
                    <td>Order Date</td>
                    <td>{{ $asset->orderDate }}</td>
                </tr>
                <tr>
                    <td>Warranty</td>
                    <td>{{ $asset->warrantyExpiryDate }}</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>{{ $asset->location->description }} {{ $asset->location->room_number }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="detail-tab">
        <div class="table-responsive">
            <table class="table">
                <tr class="alert-info">
                    <td>Name</td>
                    <td>{{ $asset->vendor->name }}</td>
                </tr>
                <tr class="alert-info">
                    <td>Phone No.</td>
                    <td>{{ $asset->vendor->phone }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $asset->machineName }}</td>
                </tr>
                <tr>
                    <td>Serial No.</td>
                    <td>{{ $asset->serialNumber }}</td>
                </tr>
                <tr>
                    <td>Order Date</td>
                    <td>{{ $asset->orderDate }}</td>
                </tr>
                <tr>
                    <td>Warranty</td>
                    <td>{{ $asset->warrantyExpiryDate }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
