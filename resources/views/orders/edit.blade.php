@extends('layouts.form')

@section('title', 'Edit Order: '.$order->orderNumber)
@section('category', 'orders')
@section('actionPage', route('orders.update'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="input-orderNumber">Order Number *Required</label>
        <input type="text" class="form-control" id="input-orderNumber" name="orderNumber"
               value="{{ old('orderNumber', $order->orderNumber) }}"
               required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-deliveryDate">Delivery Date *Required</label>
        <input type="date" class="form-control" id="input-deliveryDate" name="deliveryDate"
               value="{{ old('deliveryDate', $order->deliveryDate) }}" required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-warrantyExpiryDate">Warranty Expiry Date *Required</label>
        <input type="date" class="form-control" id="input-warrantyExpiryDate" name="warrantyExpiryDate"
               value="{{ old('warrantyExpiryDate', $order->warrantyExpiryDate) }}"
               required>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-vendor_id">Vendor</label>
        <select class="form-control custom-select" id="input-vendor_id" name="vendor_id" id="vendor">
            <option selected value="">Please choose...</option>
            @foreach($vendors as $vendor)
                <option
                    value="{{ $vendor->id }}" {{ (old('type', $order->vendor_id) === $vendor->id) ? 'selected' : '' }}>
                    {{ $vendor->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-type">Type</label>
        <input type="text" class="form-control" id="input-type" name="type" value="{{ old('type', $order->type) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-funding">Funding</label>
        <input type="text" class="form-control" id="input-funding" name="funding"
               value="{{ old('funding', $order->funding) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-remarks">Remarks</label>
        <input type="text" class="form-control" id="input-remarks" name="remarks"
               value="{{ old('remarks', $order->remarks) }}">
    </div>
@endsection
