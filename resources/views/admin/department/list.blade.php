@extends('layouts.list')

@section('title', 'Department List')

@section('customJS')
    <script type="text/javascript">
        window.actionEvents = {
            'click #edit': function (e, value, row) {
                window.location.assign('/admin/department/' + row['id'] + '/edit');
            },

            'click #delete': function (e, value, row) {
                event.preventDefault();
                $.ajax({
                    url: `/admin/department/${row['id']}`,
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
        <h4 class="mr-auto">Department</h4>
        <a class="btn btn-primary mr-1" href="{{ route('department.add') }}" aria-label="create">
            <span class="oi" data-glyph="plus"></span> Add
        </a>
        {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
            {{--<span class="oi" data-glyph="trash"></span> Delete--}}
        {{--</a>--}}
    </div>
    <table class="table" id="departmentList" data-toggle="table" data-url="{{ route('department.list') }}"
           data-id-field="id" data-sort-name="id">
        <thead>
        <tr>
            <th data-field="checkbox" data-checkbox="true">Checkbox</th>
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="name" data-sortable="true">Name</th>
            <th data-field="actions" data-sortable="false" data-formatter="addActions" data-events="actionEvents"
                data-searchable="false">Actions
            </th>
        </tr>
        </thead>
    </table>
@endsection