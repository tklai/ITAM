@extends('layouts.form')

@section('title', 'Add Location')
@section('category', 'location')
@section('returnPage', route('location.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="input-room_number">Room Number</label>
        <input type="text" class="form-control" id="input-room_number" name="room_number"
               value="{{ old('room_number') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-description">Description</label>
        <input type="text" class="form-control" id="input-description" name="description"
               value="{{ old('description') }}">
    </div>
@endsection
