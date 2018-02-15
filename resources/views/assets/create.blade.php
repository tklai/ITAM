@extends('layouts.form')

@section('title', 'Add asset')
@section('category', 'assets')
@section('actionPage', route('assets.store'))
@section('returnPage', route('assets.index'))

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
        <textarea class="form-control" id="input-remarks" name="remarks" rows="5">{{ old('remarks') }}</textarea>
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
                            <input type="text" class="form-control" id="modelModal-input-name" name="name"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="modal-input-category_id">Category</label>
                            <select id="modelModal-input-category_id" name="category_id">
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
                            <input type="text" class="form-control" id="modelModal-input-details" name="details"
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
    <div class="modal fade" id="vendorModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal-form-vendor">
                        <div class="form-group">
                            <label class="control-label" for="input-name">Company Name</label>
                            <input type="text" class="form-control" id="vendorModal-input-name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-address">Address</label>
                            <input type="text" class="form-control" id="vendorModal-input-address" name="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-phone">Phone Number</label>
                            <input type="tel" class="form-control" id="vendorModal-input-phone" name="phone" value="{{ old('phone') }}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="modal-form-vendor">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal-form-location">
                        <div class="form-group">
                            <label class="control-label" for="input-room_number">Room Number</label>
                            <input type="text" class="form-control" id="locationModal-input-room_number" name="room_number"
                                   value="{{ old('room_number') }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-description">Description</label>
                            <input type="text" class="form-control" id="locationModal-input-description" name="description"
                                   value="{{ old('description') }}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="modal-form-location">Create</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJS')
    <script type="text/javascript">
        $(document).ready(function () {
            var selectizeCallback = null;
            $("div.modal").on('hide.bs.modal', function() {
                if (selectizeCallback != null) {
                    selectizeCallback();
                    selectizeCallback = null;
                }
            });
            // Selectize
            $('#input-asset_model_id').selectize({
                create: function (input, callback) {
                    selectizeCallback = callback;
                    $('#modal-form-model').trigger('reset');
                    $('#modelModal').modal('show');
                    $('#modelModal-input-name').val(input);
                }
            });
            $('#input-vendor_id').selectize({
                create: function (input, callback) {
                    selectizeCallback = callback;
                    $('#modal-form-vendor').trigger('reset');
                    $('#vendorModal').modal('show');
                    $('#vendorModal-input-name').val(input);
                }
            });
            $('#input-location_id').selectize({
                create: function (input, callback) {
                    selectizeCallback = callback;
                    $('#modal-form-location').trigger('reset');
                    $('#locationModal').modal('show');
                    $('#locationModal-input-room_number').val(input);
                }
            });
            $('#modelModal-input-category_id').selectize({
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

            $('#modal-form-model').on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/models',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $(this).serialize(),
                    success: function(response) {
                        selectizeCallback({value: response.id, text: response.name});
                        selectizeCallback = null;
                        $('#modelModal').modal('toggle');
                    },
                    error: function(error) {alert(error.responseJSON.message);}
                });
            });
            $('#modal-form-vendor').on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/vendors',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $(this).serialize(),
                    success: function(response) {
                        selectizeCallback({value: response.id, text: response.name});
                        selectizeCallback = null;
                        $('#vendorModal').modal('toggle');
                    },
                    error: function(error) {alert(error.responseJSON.message);}
                });
            });
            $('#modal-form-location').on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: '/locations',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $(this).serialize(),
                    success: function(response) {
                        selectizeCallback({value: response.id, text: response.room_number});
                        selectizeCallback = null;
                        $('#locationModal').modal('toggle');
                    },
                    error: function(error) {alert(error.responseJSON.message);}
                });
            });
        });
    </script>
@endsection
