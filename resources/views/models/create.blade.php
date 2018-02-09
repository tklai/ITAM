@extends('layouts.form')

@section('title', 'Add Asset Model')
@section('category', 'models')
@section('actionPage', route('models.store'))
@section('returnPage', route('models.index'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="input-name">Model Name</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-category_id">Category</label>
        <select id="input-category_id" name="category_id">
            <option></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id') === $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-details">Details</label>
        <textarea class="form-control" id="input-details" name="details">{{ old('details') }}</textarea>
    </div>
@endsection

@section('additionalJS')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#input-category_id').selectize({
                placeholder: "Please select...",
                create: function (input, callback) {
                    $.ajax({
                        url: '/categories',
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {'name': input},
                        success: function (result) {
                            callback({value: result.id, text: input});
                        },
                        error: function (error) {
                            alert(error.responseJSON.message);
                        }
                    });
                }
            });
        });
    </script>
@endsection
