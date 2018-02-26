@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table.css') }}">
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
    @include('layouts.bootstrap-table')
@endsection

@section('contents')
    @include('layouts.message')
    <div id="toolbar">
        <a class="btn btn-primary" href="@yield('createPage')" aria-label="create">
            <span class="fa fa-plus"></span> Add
        </a>
        @if(Route::currentRouteName() === 'assets.index')
            <button type="button" class="btn btn-info" onClick="getBarcode()" aria-label="barcode">
                <span class="fa fa-barcode"></span> Barcode
            </button>
            <a class="btn btn-warning" href="{{ route('assets.import.index') }}" aria-label="import">
                <span class="fa fa-upload"></span> Import
            </a>
        @endif
        {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
            {{--<span class="fa fa-trash"></span> Delete--}}
        {{--</a>--}}
    </div>
    <div class="table-responsive">
        @yield('table')
    </div>
@endsection
