@extends('layouts.form')

@section('title', 'Edit Order: '.$order->orderNumber)
@section('category', 'Order')
@section('returnPage', route('order.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="orderNumber">Order Number *Required</label>
        <input type="text" class="form-control" name="orderNumber" value="{{ old('orderNumber', $order->orderNumber) }}"
               required>
    </div>
    <div class="form-group">
        <label class="control-label" for="deliveryDate">Delivery Date *Required</label>
        <input type="date" class="form-control" name="deliveryDate"
               value="{{ old('deliveryDate', $order->deliveryDate) }}" required>
    </div>
    <div class="form-group">
        <label class="control-label" for="warrantyExpiryDate">Warranty Expiry Date *Required</label>
        <input type="date" class="form-control" name="warrantyExpiryDate"
               value="{{ old('warrantyExpiryDate', $order->warrantyExpiryDate) }}"
               required>
    </div>
    <div class="form-group">
        <label class="control-label" for="type">Machine Type</label>
        <select class="form-control custom-select" name="type" id="vendor" data-tags="true">
            <option selected value="">
                Please choose...
            </option>
            @foreach($vendors as $vendor)
                <option
                    {{ (old('type', $order->vendor_id) === $vendor->id) ? 'selected' : '' }} value="{{ $vendor->id }}">
                    {{ $vendor->name }}
                </option>
            @endforeach
        </select>
        <!-- TODO: Add button here for adding model types -->
    </div>
    <div class="form-group">
        <label class="control-label" for="type">Type</label>
        <input type="text" class="form-control" name="type" value="{{ old('type', $order->type) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="orderNumber">Funding</label>
        <input type="text" class="form-control" name="funding" value="{{ old('funding', $order->funding) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="orderNumber">Remarks</label>
        <input type="text" class="form-control" name="remarks" value="{{ old('remarks', $order->remarks) }}">
    </div>
@endsection
