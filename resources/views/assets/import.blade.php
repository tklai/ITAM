@extends('layouts.master')

@section('title', 'Import assets')

@section('contents')
    @include('layouts.message')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" id="form-assets" method="POST" enctype="multipart/form-data" action="{{route('assets.import')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="input-file">File</label>
                    <input type="file" class="form-control" id="input-file" name="excel_file">
                </div>
            </form>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-outline-dark" href="{{route('assets.index')}}">
                <span class="fa fa-times"></span> Cancel
            </a>
            <button type="submit" class="btn btn-primary" form="form-assets">
                    <span class="fa fa-upload"></span> Import
            </button>
        </div>
    </div>
@endsection
