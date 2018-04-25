@extends('layouts.form')

@section('title', 'Edit Vendor: '.$vendor->name)
@section('category', 'vendors')
@section('actionPage', route('vendors.update', ['id' => $vendor->id]))
@section('returnPage', route('vendors.index'))

@section('form')
    @method('patch')
    <div class="form-group">
        <label class="control-label" for="input-name">Company Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name', $vendor->name) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-address">Address</label>
        <input type="text" class="form-control" id="input-address" name="address"
               value="{{ old('address', $vendor->address) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-phone">Phone Number</label>
        <input type="tel" class="form-control" id="input-phone" name="phone" value="{{ old('phone', $vendor->phone) }}">
    </div>
@endsection
