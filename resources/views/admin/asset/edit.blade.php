@extends('layouts.form')

@section('title', 'Edit asset: '.$asset->machineName)
@section('category', 'asset')
@section('returnPage', route('asset.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="machineName">Name</label>
        <input type="text" class="form-control" name="machineName" value="{{ old('machineName', $asset->machineName) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="asset_model_id">Model</label>
        <select class="form-control" data-live-search="true" name="asset_model_id" id="asset_model_id" data-tags="true" title="Choose one of the following...">
            <option>
                Please choose...
            </option>
            @foreach($models as $model)
                <option
                    {{ (old('type', $asset->asset_model_id) === $model->id) ? 'selected' : '' }} value="{{ $model->id }}">
                    {{ $model->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="serialNumber">Serial Number</label>
        <input type="text" class="form-control" name="serialNumber" value="{{ old('serialNumber', $asset->serialNumber) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="vendor_id">Vendor</label>
        <select class="form-control" name="vendor_id" id="vendor" data-tags="true">
            <option>
                Please choose...
            </option>
            @foreach($vendors as $vendor)
                <option
                    {{ (old('type', $asset->vendor_id) === $vendor->id) ? 'selected' : '' }} value="{{ $vendor->id }}">
                    {{ $vendor->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="orderDate">Order Date</label>
        <input type="date" class="form-control" name="orderDate" value="{{ old('orderDate', $asset->orderDate) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="warrantyExpiryDate">Warranty Expiry Date</label>
        <input type="date" class="form-control" name="warrantyExpiryDate" value="{{ old('warrantyExpiryDate', $asset->warrantyExpiryDate) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="location_id">Location</label>
        <select class="form-control" name="location_id" id="location" data-tags="true">
            <option>
                Please choose...
            </option>
            @foreach($locations as $location)
                <option
                    {{ (old('location', $asset->location_id) === $location->id) ? 'selected' : '' }} value="{{ $location->id }}">
                    {{ $location->room_number }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="remarks">Remarks</label>
        <input type="text" class="form-control" name="remarks" value="{{ old('remarks', $asset->remarks) }}">
    </div>
@endsection
