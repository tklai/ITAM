@extends('layouts.form')

@section('title', 'Add Location')

@section('form')
    <h4 class="d-flex align-items-center">
        <a class="btn btn-outline-dark" href="{{ route('location.index') }}">
            <span class="oi" data-glyph="chevron-left"></span>
            <span class="d-none d-sm-inline"> Back</span>
        </a>
        <span class="ml-2 text-truncate">Add Location</span>
    </h4>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" id="form-location">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="input-id">Room Number</label>
                    <input type="text" class="form-control" id="input-room_number" name="room_number" value="{{ old('room_number') }}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-description">Description</label>
                    <input type="text" class="form-control" id="input-description" name="description"
                           value="{{ old('description') }}">
                </div>
            </form>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-outline-dark" href="{{ route('location.index') }}">
                <span class="oi" data-glyph="x"></span> Cancel
            </a>
            <button type="submit" class="btn btn-primary" form="form-location">
                <span class="oi" data-glyph="plus"></span> Add
            </button>
        </div>
    </div>
@endsection
