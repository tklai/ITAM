@extends('layouts.form')

@section('title', 'Edit Location: '.$location->room_number)
@section('category', 'location')
@section('returnPage', route('location.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="input-id">Room Number</label>
        <input type="text" class="form-control" id="input-room_number" name="room_number"
               value="{{ old('room_number', $location->room_number) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-description">Description</label>
        <input type="text" class="form-control" id="input-description" name="description"
               value="{{ old('description', $location->description) }}">
    </div>
@endsection
