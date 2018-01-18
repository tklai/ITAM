@extends('layouts.list')

@section('title', 'Location List')

@section('customJS')
    <script type="text/javascript">
        window.actionEvents = {
            'click #edit': function (e, value, row) {
                window.location.assign('/admin/location/' + row['id'] + '/edit');
            },

            'click #delete': function (e, value, row) {
                event.preventDefault();
                $.ajax({
                    url: `/admin/location/${row['id']}`,
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function () {
                        if (!confirm('Are you sure to delete the selected data?')) {
                            return false;
                        }
                    },
                    success: function () {
                        $('.table').bootstrapTable('refresh');
                    },
                    error: function () {
                        alert('Something happened wrong.');
                    }
                });
            }
        };
    </script>
@endsection

@section('table')
    <div class="d-flex align-items-baseline mb-1">
        <h4 class="mr-auto">Location</h4>
        <a class="btn btn-primary mr-1" href="{{ route('location.add') }}" aria-label="create">
            <span class="oi" data-glyph="plus"></span> Add
        </a>
        {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
            {{--<span class="oi" data-glyph="trash"></span> Delete--}}
        {{--</a>--}}
    </div>
    <table class="table" id="departmentList" data-toggle="table" data-url="{{ route('location.list') }}"
           data-id-field="id" data-sort-name="room_number">
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