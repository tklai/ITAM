@extends('layouts.form')

@section('title', "Edit Location: {$location->room_number}")
@section('category', 'locations')
@section('actionPage', route('locations.update', ['id' => $location->id]))

@section('form')
    {{ method_field('PUT') }}
    <input type="hidden" id="id" name="id" value="{{ old('id', $location->id) }}">
    <div class="form-group">
        <label class="control-label" for="input-room_number">Room Number</label>
        <input type="text" class="form-control" id="input-room_number" name="room_number"
               value="{{ old('room_number', $location->room_number) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-description">Description</label>
        <input type="text" class="form-control" id="input-description" name="description"
               value="{{ old('description', $location->description) }}">
    </div>
@endsection
