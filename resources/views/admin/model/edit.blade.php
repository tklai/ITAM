@extends('layouts.form')

@section('title', "Edit model: {$model->name}")
@section('category', 'model')
@section('returnPage', route('model.index'))

@section('form')
    {{ method_field('PUT') }}
    <div class="form-group">
        <label class="control-label" for="input-name">Model Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name', $model->name) }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-category_id">Machine Type</label>
        <select class="form-control custom-select" id="input-category_id" name="category_id">
            <option value="">Please choose...</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $model->category_id) === $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-details">Details</label>
        <input type="text" class="form-control" id="input-details" name="details" value="{{old('details', $model->details) }}">
    </div>
@endsection