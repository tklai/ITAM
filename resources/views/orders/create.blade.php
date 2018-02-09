@extends('layouts.form')

@section('title', 'Add Order')
@section('category', 'orders'))
@section('actionPage', route('orders.store'))
@section('returnPage', route('orders.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="input-orderNumber">Order Number *Required</label>
        <input type="text" class="form-control" id="input-orderNumber" name="orderNumber"
               value="{{ old('orderNumber') }}" required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-deliveryDate">Delivery Date *Required</label>
        <input type="date" class="form-control" id="input-deliveryDate" name="deliveryDate"
               value="{{ old('deliveryDate') }}" required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-warrantyExpiryDate">Warranty Expiry Date *Required</label>
        <input type="date" class="form-control" id="input-warrantyExpiryDate" name="warrantyExpiryDate"
               value="{{ old('warrantyExpiryDate') }}"
               required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-vendor_id">Vendor</label>
        <select class="form-control custom-select" id="input-vendor_id" name="vendor_id">
            <option>Please choose...</option>
            @foreach($vendors as $vendor)
                <option value="{{ $vendor->id }}" {{ (old('type') === $vendor->id) ? 'selected' : '' }}>
                    {{ $vendor->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-type">Machine Type</label>
        <input type="text" class="form-control" id="input-type" name="type" value="{{ old('type') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-funding">Funding</label>
        <input type="text" class="form-control" id="input-funding" name="funding" value="{{ old('funding') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-remarks">Remarks</label>
        <input type="text" class="form-control" id="input-remarks" name="remarks" value="{{ old('remarks') }}">
    </div>
@endsection
