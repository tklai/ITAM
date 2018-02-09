@extends('layouts.show')

@section('title', "View Asset: {$asset->machineName}")
@section('category', 'assets')
@section('editPage', route('assets.edit', ['id' => $asset->id]))
@section('returnPage', route('assets.index'))

@section('tab-items')
    <li class="nav-item">
        <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail"
           aria-selected="true">Asset Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="maintenance-tab" data-toggle="tab" href="#maintenance" role="tab"
           aria-controls="maintenance" aria-selected="true">Maintenances</a>
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
                <tr>
                    <td class="align-top">Remarks</td>
                    <td>{!! $asset->remarks !!}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="maintenance" role="tabpanel" aria-labelledby="maintenance-tab">
        <div id="toolbar">
            <a class="btn btn-primary" href="{{ route('maintenances.create', ['id' => $asset->id]) }}" aria-label="create">
                <span class="fa fa-plus"></span> Add
            </a>
            {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
            {{--<span class="fa fa-trash"></span> Delete--}}
            {{--</a>--}}
        </div>
        <div class="table-responsive">
            <table class="table" id="assetsList" data-toggle="table"
                   data-url="{{ route('assets.maintenances', ['id' => $asset->id]) }}"
                   data-id-field="id"
                   data-sort-order="desc"
                   data-sort-name="place_date"
                   data-search="true"
                   data-show-columns="true"
                   data-mobile-responsive="true"
                   data-pagination="true"
                   data-pagination-v-align="both"
                   data-page-list="[25, 50, ALL]">
                <thead>
                <tr>
                    <th data-field="call_number" data-sortable="true">Call Number</th>
                    <th data-field="reason" data-sortable="true">Reason</th>
                    <th data-field="place_date" data-sortable="true">Place Date</th>
                    <th data-field="return_date" data-sortable="true">Return Date</th>
                    <th data-field="actions" data-sortable="false" data-formatter="maintenanceAction" data-events="maintenanceActionEvents"
                        data-searchable="false">
                        Actions
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="javascript">
        <script type="text/javascript">
            function maintenanceAction(value, row) {
                return [
                    `<button id="edit" class="btn btn-light mr-1" aria-label="edit">` +
                    '<span class="fa fa-pencil" data-glyph="pencil"></span>' +
                    '<span class="d-none d-md-inline"> Edit</span>' +
                    '</button>'
                ].join('');
            }

            window.maintenanceActionEvents = {
                'click #edit': function (e, value, row) {
                    window.location.assign("{{route('assets.show', ['id' => $asset->id])}}"+`/maintenance/${row['id']}/edit`);
                }
            }
        </script>
    </div>
@endsection
