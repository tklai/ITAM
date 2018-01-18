@extends('layouts.form')

@section('title', 'Edit Order: '.$order->orderNumber)
@section('category', 'Order')
@section('returnPage', route('order.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="orderNumber">Order Number</label>
        <input type="text" class="form-control" name="orderNumber" required
               value="{{ old('orderNumber', $result->orderNumber) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="deliveryDate">Delivery Date</label>
        <input type="date" class="form-control" name="deliveryDate" required
               value="{{ old('deliveryDate', $result->deliveryDate) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="warrantyExpiryDate">Warranty Expiry Date</label>
        <input type="date" class="form-control" name="warrantyExpiryDate" required
               value="{{ old('warrantyExpiryDate', $result->warrantyExpiryDate) }}">
    </div>
@endsection
