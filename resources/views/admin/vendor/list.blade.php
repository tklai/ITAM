@extends('layouts.list')

@section('title', 'Vendor List')

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
        <h4 class="mr-auto">Vendor</h4>
        <a class="btn btn-primary mr-1" href="{{ route('vendor.add') }}" aria-label="create">
            <span class="oi" data-glyph="plus"></span> Add
        </a>
        {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
        {{--<span class="oi" data-glyph="trash"></span> Delete--}}
        {{--</a>--}}
    </div>
    <table class="table" id="modelList"
           data-toggle="table"
           data-url="{{ route('vendor.list') }}"
           data-id-field="id"
           data-sort-name="name"
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
