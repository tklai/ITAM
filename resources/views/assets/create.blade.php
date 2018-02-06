@extends('layouts.form')

@section('title', 'Add asset')
@section('category', 'assets')
@section('actionPage', route('assets.store'))

@section('form')
    <div class="form-group">
        <label class="control-label" for="input-machineName">Name</label>
        <input type="text" class="form-control" id="input-machineName" name="machineName"
               value="{{ old('machineName') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-asset_model_id">Model</label>
        <select id="input-asset_model_id" name="asset_model_id" placeholder="Please select...">
            <option></option>
            @foreach($models as $model)
                <option value="{{ $model->id }}" {{ (old('asset_model_id') === $model->id) ? 'selected' : '' }}>
                    {{ $model->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-serialNumber">Serial Number</label>
        <input type="text" class="form-control" id="input-serialNumber" name="serialNumber"
               value="{{ old('serialNumber') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-vendor_id">Vendor</label>
        <select id="input-vendor_id" name="vendor_id" placeholder="Please select...">
            <option></option>
            @foreach($vendors as $vendor)
                <option value="{{ $vendor->id }}" {{ (old('vendor_id') === $vendor->id) ? 'selected' : '' }}>
                    {{ $vendor->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-orderDate">Order Date</label>
        <input type="date" class="form-control" id="input-orderDate" name="orderDate" value="{{ old('orderDate') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-warrantyExpiryDate">Warranty Expiry Date</label>
        <input type="date" class="form-control" id="input-warrantyExpiryDate" name="warrantyExpiryDate"
               value="{{ old('warrantyExpiryDate') }}">
    </div>
    <div class="form-group">
        <label class="control-label" for="input-location_id">Location</label>
        <select id="input-location_id" name="location_id" placeholder="Please select...">
            <option></option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}" {{ (old('location_id') === $location->id) ? 'selected' : '' }}>
                    {{ $location->room_number }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-remarks">Remarks</label>
        <input type="text" class="form-control" id="input-remarks" name="remarks" value="{{ old('remarks') }}">
    </div>
@endsection

@section('modals')
    <!-- Modal Section -->
    <div class="modal fade" id="modelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new asset model</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal-form-model">
                        <div class="form-group">
                            <label class="control-label" for="modal-input-name">Model Name</label>
                            <input type="text" class="form-control" id="modal-input-name" name="name"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="modal-input-category_id">Category</label>
                            <select id="modal-input-category_id" name="category_id">
                                <option></option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ (old('category_id') === $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="modal-input-details">Details</label>
                            <input type="text" class="form-control" id="modal-input-details" name="details"
                                   value="{{ old('details') }}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="modal-form-model">Create</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJS')
    <script type="text/javascript">
        $(document).ready(function () {
            // Selectize
            $('#input-vendor_id').selectize();
            $('#input-location_id').selectize();
            $('#input-asset_model_id').selectize({
                create: function (input, callback) {
                    $('#modelModal').modal('show');
                    $('#modal-input-name').val(input);
                    $('#modal-form-model').on("submit", function(event) {
                        event.preventDefault();
                        $.ajax({
                            url: '/models',
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: $(this).serialize(),
                            success: function(response) {
                                callback({value: response.id, text: response.name});
                                $('#modelModal').modal('hide');
                            },
                            error: function(error) {alert(error.responseJSON.message);}
                        });
                    });
                }
            });
            $('#modal-input-category_id').selectize({
                placeholder: "Please select...",
                create: function (input, callback) {
                    $.ajax({
                        url: '/categories',
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {'name':input},
                        success: function (result) {callback({ value: result.id, text: input });},
                        error: function (error) {alert(error.responseJSON.message);}
                    });
                }
            });
        });
    </script>
@endsection
