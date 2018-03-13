@extends('layouts.list')

@section('title', 'Audit Log')

@section('customJS')
    <script type="text/javascript">
        function getAssetName(value) {
            return value['machineName'];
        }
    </script>
@endsection

@section('table')
    <div class="page-header">
        Audit Log
    </div>
    <table class="table" id="auditList"
           data-toggle="table"
           data-url="{{ route('audit.list') }}"
           data-id-field="id"
           data-sort-name="id"
           data-sort-order="desc"
    >
        <thead>
        <tr>
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="asset" data-formatter="getAssetName" data-sortable="true">Asset</th>
            <th data-field="audit_on" data-sortable="false">Audited on</th>
        </tr>
        </thead>
    </table>
@endsection