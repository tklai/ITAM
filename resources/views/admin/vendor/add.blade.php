@extends('layouts.form')

@section('title', 'Add Vendor')
@section('category', 'vendor')
@section('returnPage', route('vendor.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="input-name">Company Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-address">Address</label>
        <input type="text" class="form-control" id="input-address" name="address" value="{{ old('address') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-phone">Phone Number</label>
        <input type="tel" class="form-control" id="input-phone" name="phone" value="{{ old('phone') }}">
    </div>
@endsection
