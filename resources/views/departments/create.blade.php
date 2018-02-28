@extends('layouts.form')

@section('title', 'Add Department')
@section('category', 'departments')
@section('actionPage', route('departments.store'))
@section('returnPage', route('departments.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="input-name">Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name') }}">
    </div>
@endsection
