@extends('layouts.form')

@section('title', 'Edit model: '.$model->name)
@section('category', 'model')
@section('returnPage', route('model.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="name">Model Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $model->name) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="stage">Machine Type</label>
        <select class="form-control custom-select" name="category_id" id="categoryIDSelector" data-tags="true">
            <option value="">
                Please choose...
            </option>
            @foreach($categories as $category)
                <option {{ old('category_id', $model->category_id) === $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="name">Details</label>
        <textarea class="form-control" name="details">{{ old('details', $model->details) }}</textarea>
    </div>
@endsection
