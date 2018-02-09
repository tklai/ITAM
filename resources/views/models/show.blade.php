@extends('layouts.show')

@section('title', "View Model: {$model->name}")
@section('category', 'models')
@section('returnPage', route('models.index'))

@section('tab-items')
    <li class="nav-item">
        <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail"
           aria-selected="true">Model Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="assets-tab" data-toggle="tab" href="#assets" role="tab" aria-controls="assets"
           aria-selected="false">Assets</a>
    </li>
@endsection

@section('tab-contents')
    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ $model->name }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{ $model->category->name }}</td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td>{!! $model->details  !!}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="assets" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
            <table class="table" id="assetList"
                   data-toggle="table"
                   data-url="{{ route('models.assets', ['id' => $model->id ]) }}"
                   data-id-field="id"
                   data-sort-name="name"
                   data-group-by="true"
                   data-group-by-field="name"
                   data-search="true"
                   data-show-columns="true"
                   data-mobile-responsive="true"
                   data-pagination="true"
                   data-pagination-v-align="both"
                   data-page-list="[25, 50, ALL]">
                <thead>
                <tr>
                    <th data-field="machineName" data-sortable="true" data-formatter="assetDetail">Name</th>
                    <th data-field="serialNumber" data-sortable="true">Serial No.</th>
                    <th data-field="orderDate" data-sortable="true" data-visible="false">Order Date</th>
                    <th data-field="warrantyExpiryDate" data-sortable="true" data-visible="false"
                        data-cell-style="warrantyCell">Warranty
                    </th>
                    <th data-field="location.room_number" data-sortable="true" data-formatter="locationDetail">Location</th>
                    <th data-field="created_at" data-sortable="true" data-visible="false">Created at</th>
                    <th data-field="updated_at" data-sortable="true" data-visible="false">Updated at</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
