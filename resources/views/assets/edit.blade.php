@extends('layouts.form')

@section('title', "Edit asset: {$asset->machineName}")
@section('category', 'assets')
@section('actionPage', route('assets.update', ['id' => $asset->id]))
@section('returnPage', route('assets.index'))

@section('form')
    @method('patch')
    <input type="hidden" id="input-id" name="id" value="{{ old('id', $asset->id) }}">
    <div class="form-group">
        <label class="control-label" for="input-machineName">Name</label>
        <input type="text" class="form-control" id="input-machineName" name="machineName"
               value="{{ old('machineName', $asset->machineName) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-asset_model_id">Model</label>
        <select class="form-control" id="input-asset_model_id" name="asset_model_id">
            <option>Please choose...</option>
            @foreach($models as $model)
                <option
                    value="{{ $model->id }}" {{ (old('type', $asset->asset_model_id) === $model->id) ? 'selected' : '' }}>
                    {{ $model->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-serialNumber">Serial Number</label>
        <input type="text" class="form-control" id="input-serialNumber" name="serialNumber"
               value="{{ old('serialNumber', $asset->serialNumber) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-vendor_id">Vendor</label>
        <select class="form-control" id="input-vendor_id" name="vendor_id">
            <option>Please choose...</option>
            @foreach($vendors as $vendor)
                <option
                    value="{{ $vendor->id }}"{{ (old('type', $asset->vendor_id) === $vendor->id) ? 'selected' : '' }}>
                    {{ $vendor->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-orderDate">Order Date</label>
        <input type="date" class="form-control" id="input-orderDate" name="orderDate"
               value="{{ old('orderDate', $asset->orderDate) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-warrantyExpiryDate">Warranty Expiry Date</label>
        <input type="date" class="form-control" id="input-warrantyExpiryDate" name="warrantyExpiryDate"
               value="{{ old('warrantyExpiryDate', $asset->warrantyExpiryDate) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-location_id">Location</label>
        <select class="form-control" id="input-location_id" name="location_id">
            <option>Please choose...</option>
            @foreach($locations as $location)
                <option
                    value="{{ $location->id }}"{{ (old('location', $asset->location_id) === $location->id) ? 'selected' : '' }}>
                    {{ $location->room_number }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-remarks">Remarks</label>
        <textarea class="form-control" id="input-remarks"
                  name="remarks" rows="5">{{ old('remarks', $asset->remarks) }}</textarea>
    </div>
@endsection
