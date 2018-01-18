@extends('layouts.form')

@section('title', 'Edit Vendor: '.$vendor->name)
@section('category', 'vendor')
@section('returnPage', route('vendor.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="name">Company Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $vendor->name) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="address">Address</label>
        <input type="text" class="form-control" name="address" value="{{ old('address', $vendor->address) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="phone">Phone Number</label>
        <input type="tel" class="form-control" name="phone" value="{{ old('phone', $vendor->phone) }}">
    </div>
@endsection
