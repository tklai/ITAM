@extends('layouts.form')

@section('title', "Edit Department: {$department->name}")
@section('category', 'departments')
@section('actionPage', route('departments.update', ['id' => $department->id]))

@section('form')
    {{ method_field('PUT') }}
    <input type="hidden" id="id" name="id" value="{{ old('id', $department->id) }}">
    <div class="form-group">
        <label class="control-label" for="input-name">Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name', $department->name)}}">
    </div>
@endsection
