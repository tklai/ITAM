@extends('layouts.form')

@section('title', 'Create new maintenance')
@section('category', 'maintenances')
@section('actionPage', route('maintenances.store', ['id' => $asset->id]))

@section('form')
    <div class="alert alert-info" role="alert">
        Vendor Informations
        <table class="table table-sm">
            <tr>
                <td>Name</td>
                <td>{{ $asset->vendor->name }}</td>
            </tr>
            <tr>
                <td>Phone No.</td>
                <td>{{ $asset->vendor->phone }}</td>
            </tr>
            <tr>
                <td>Serial Number</td>
                <td>{{ $asset->serialNumber }}</td>
            </tr>
        </table>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-call_number">Call Number *Required</label>
        <input type="text" class="form-control" id="input-call_number" name="call_number"
               value="{{ old('call_number') }}" required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-reason">Reason</label>
        <input type="text" class="form-control" id="input-reason" name="reason" value="{{ old('reason') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-place_date">Place Date</label>
        <input type="date" class="form-control" id="input-place_date" name="place_date"
               value="{{ old('place_date') }}" required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-return_date">Return Date</label>
        <input type="date" class="form-control" id="input-return_date" name="return_date"
               value="{{ old('return_date') }}"
               required>
    </div>
@endsection
