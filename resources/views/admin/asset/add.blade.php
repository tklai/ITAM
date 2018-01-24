@extends('layouts.form')

@section('title', 'Add asset')
@section('category', 'asset')
@section('returnPage', route('asset.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="machineName">Name</label>
        <input type="text" class="form-control" name="machineName" value="{{ old('machineName') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="asset_model_id">Model</label>
        <select class="form-control" data-live-search="true" name="asset_model_id" id="asset_model_id" data-tags="true" title="Choose one of the following...">
            <option>
                Please choose...
            </option>
            @foreach($models as $model)
                <option
                    {{ (old('asset_model_id') === $model->id) ? 'selected' : '' }} value="{{ $model->id }}">
                    {{ $model->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="serialNumber">Serial Number</label>
        <input type="text" class="form-control" name="serialNumber" value="{{ old('serialNumber') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="vendor_id">Vendor</label>
        <select class="form-control" name="vendor_id" id="vendor" data-tags="true">
            <option>
                Please choose...
            </option>
            @foreach($vendors as $vendor)
                <option
                    {{ (old('vendor_id') === $vendor->id) ? 'selected' : '' }} value="{{ $vendor->id }}">
                    {{ $vendor->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="orderDate">Order Date</label>
        <input type="date" class="form-control" name="orderDate" value="{{ old('orderDate') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="warrantyExpiryDate">Warranty Expiry Date</label>
        <input type="date" class="form-control" name="warrantyExpiryDate" value="{{ old('warrantyExpiryDate') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="location_id">Location</label>
        <select class="form-control" name="location_id" id="location" data-tags="true">
            <option>
                Please choose...
            </option>
            @foreach($locations as $location)
                <option
                    {{ (old('location_id') === $location->id) ? 'selected' : '' }} value="{{ $location->id }}">
                    {{ $location->room_number }}
                </option> w
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="remarks">Remarks</label>
        <input type="text" class="form-control" name="remarks" value="{{ old('remarks') }}">
    </div>
@endsection
