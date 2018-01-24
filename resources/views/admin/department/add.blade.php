@extends('layouts.form')

@section('title', 'Add Department')
@section('category', 'department')
@section('returnPage', route('department.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="input-name">Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name') }}">
    </div>
@endsection
