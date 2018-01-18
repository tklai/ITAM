@extends('layouts.form')

@section('title', 'Edit Department')

@section('form')
    <h4 class="d-flex align-items-center">
        <a class="btn btn-outline-dark" href="{{ route('department.index') }}">
            <span class="oi" data-glyph="chevron-left"></span>
            <span class="d-none d-sm-inline"> Back</span>
        </a>
        <span class="ml-2 text-truncate">Edit Department: {{ $department->name }}</span>
    </h4>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" id="form-department">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="input-name">Name</label>
                    <input type="text" class="form-control" id="input-name" name="name"
                           value="{{ old('name', $department->name) }}">
                </div>
            </form>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-outline-dark" href="{{ route('department.index') }}">
                <span class="oi" data-glyph="x"></span> Cancel
            </a>
            <button type="submit" class="btn btn-primary" form="form-department">
                <span class="oi" data-glyph="pencil"></span> Edit
            </button>
        </div>
    </div>
@endsection
