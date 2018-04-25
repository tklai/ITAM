@extends('layouts.form')

@section('title', "Edit Department: {$department->name}")
@section('category', 'departments')
@section('actionPage', route('departments.update', ['id' => $department->id]))
@section('returnPage', route('departments.index'))

@section('form')
    @method('patch')
    <div class="form-group">
        <label class="control-label" for="input-name">Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name', $department->name)}}">
    </div>
@endsection
