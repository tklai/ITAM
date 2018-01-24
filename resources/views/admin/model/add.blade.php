@extends('layouts.form')

@section('title', 'Add Asset Model')
@section('category', 'model')
@section('returnPage', route('model.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="name">Model Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="type">Machine Type</label>
        <select class="form-control custom-select" name="category_id" id="categoryIDSelector" data-tags="true">
            <option selected value="">
                Please choose...
            </option>
            @foreach($categories as $category)
                <option {{ (old('category_id') === $category->id) ? 'selected' : '' }} value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <!-- TODO: Add button here for adding model types -->
    </div>
    <div class="form-group">
        <label class="control-label" for="name">Details</label>
        <textarea class="form-control" name="details" value="{{ old('details') }}"></textarea>
    </div>
@endsection
