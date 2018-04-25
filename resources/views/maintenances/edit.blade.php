@extends('layouts.form')

@section('title', 'Edit maintenance call: '.$maintenance->call_number)
@section('category', 'maintenances')
@section('actionPage', route('maintenances.update', ['id' => $maintenance->asset_id, 'maintenance_id' => $maintenance->id]))
@section('returnPage', 'javascript:window.history.back();')

@section('form')
    @method('patch')
    <div class="form-group">
        <label class="control-label" for="input-call_number">Call Number *Required</label>
        <input type="text" class="form-control" id="input-call_number" name="call_number"
               value="{{ $maintenance->call_number }}" disabled>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-reason">Reason</label>
        <input type="text" class="form-control" id="input-reason" name="reason" value="{{ $maintenance->reason }}" disabled>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-place_date">Place Date</label>
        <input type="date" class="form-control" id="input-place_date" name="place_date"
               value="{{ $maintenance->place_date }}" disabled>
    </div>
    <div class="form-group">
        <label class="control-label" for="input-return_date">Return Date</label>
        <input type="date" class="form-control" id="input-return_date" name="return_date"
               value="{{ old('return_date', $maintenance->return_date) }}" required>
    </div>
@endsection
