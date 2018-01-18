@extends('layouts.list')

@section('title', 'Order List')

@section('customJS')
    <script type="text/javascript">
        window.actionEvents = {
            'click #edit': function (e, value, row) {
                window.location.assign('/admin/vendor/' + row['id'] + '/edit');
            },

            'click #delete': function (e, value, row) {
                event.preventDefault();
                $.ajax({
                    url: `/admin/vendor/${row['id']}`,
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function () {
                        if (!confirm('Are you sure to delete the selected data?')) { return false; }
                    },
                    success: function () {
                        $('.table').bootstrapTable('refresh');
                    },
                    error: function (response) {
                        alert('Something happened wrong.');
                        console.log(response);
                    }
                });
            }
        };

        function phoneCall(value) {
            return `<a href="tel:${value}">${value}</a>`;
        }
    </script>
@endsection

@section('table')
    <div class="d-flex align-items-baseline mb-1">
        <h4 class="mr-auto">Order</h4>
        <a class="btn btn-primary mr-1" href="{{ route('order.add') }}" aria-label="create">
            <span class="oi" data-glyph="plus"></span> Add
        </a>
        {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
        {{--<span class="oi" data-glyph="trash"></span> Delete--}}
        {{--</a>--}}
    </div>
    <table class="table" id="orderList"
           data-toggle="table"
           data-url="{{ route('order.list') }}"
           data-id-field="id"
           data-sort-name="deliveryDate"
           data-sort-order="desc"
    >
        <thead>
        <tr>
            <th data-field="checkbox" data-checkbox="true">Checkbox</th>
            <th data-field="orderNumber" data-sortable="true" data-visible="true">Order Number</th>
            <th data-field="deliveryDate" data-sortable="true">Delivery Date</th>
            <th data-field="warrantyExpiryDate" data-sortable="true">Exp. Date</th>
            <th data-field="vendor" data-sortable="true" data-formatter="getVendorName">Vendor</th>
            <th data-field="type" data-sortable="true">Type</th>
            <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                data-searchable="false">
                Actions
            </th>
        </tr>
        </thead>
    </table>
@endsection
