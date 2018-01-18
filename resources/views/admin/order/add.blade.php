@extends('layouts.form')

@section('title', 'Add Order')
@section('category', 'Order')
@section('returnPage', route('order.index'))

@section('form')
    <div class="form-group">
        <label class="control-label col-md-3" for="orderNumber">Order Number</label>
        <input type="text" class="form-control" name="orderNumber" value="{{ old('orderNumber') }}" required>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="deliveryDate">Delivery Date</label>
        <input type="date" class="form-control" name="deliveryDate" value="{{ old('deliveryDate') }}" required>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="warrantyExpiryDate">Warranty Expiry Date</label>
        <input type="date" class="form-control" name="warrantyExpiryDate" value="{{ old('warrantyExpiryDate') }}"
               required>
    </div>
@endsection
