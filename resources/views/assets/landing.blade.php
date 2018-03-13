@extends('layouts.master')

@section('title', 'QR code scanned')

@section('contents')
<div class="card card-default">
    <div class="card-body">
        The QR Code of asset {{ $result->machineName }} was scanned.
        <br>Please check the information and update if it is incorrect.
        <div class="alert alert-info">
            <b>Server Information</b>
            <table border="1" width="100%">
                <tr>
                    <td>Machine Name</td>
                    <td>{{ $result->machineName }}</td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td>{{ $result->assetModel->name }}</td>
                </tr>
                <tr>
                    <td>Serial Number</td>
                    <td>{{ $result->serialNumber }}</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>{{ $result->location->description . ' ' . $result->location->room_number }}</td>
                </tr>
            </table>
        </div>
        <p>Please choose an action.
    </div>
    <div class="card-footer">
        <a class="btn btn-primary btn-block"
           href="{{ route('assets.edit', ['id' => $result->id]) }}">
            Edit Asset
        </a>
        <a class="btn btn-warning btn-block"
           href="#" onclick="document.getElementById('check-form').submit();">
            Check inventory
        </a>
        <a class="btn btn-danger btn-block"
           href="{{ route('maintenances.create', ['id' => $result->id]) }}">
            Call for maintenance
        </a>

        <form id="check-form" action="{{ route('audits.check', ['id' => $result->id]) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
