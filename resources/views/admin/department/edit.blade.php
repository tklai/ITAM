@extends('layouts.form')

@section('title', 'Edit Department: '.$department->name)
@section('category', 'department')
@section('returnPage', route('department.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="input-name">Name</label>
        <input type="text" class="form-control" id="input-name" name="name"
               value="{{ old('name', $department->name)}}">
    </div>
@endsection
