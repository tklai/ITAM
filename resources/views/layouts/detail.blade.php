@extends('layouts.master')

@section('additionalHeaders')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table.css') }}">
    <script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
    @include('layouts.bootstrap-table')
@endsection

@section('actionButtons')
    <a class="btn btn-outline-dark mr-3" href="@yield('returnPage')">
        <span class="fa fa-chevron-left"></span>
        <span class="d-none d-sm-inline"> Back</span>
    </a>
@endsection

@section('contents')
    <ul class="nav nav-tabs" id="detailTab" role="tablist">
        @yield('tab-items')
    </ul>

    <div class="tab-content" id="tab-content">
        @yield('tab-contents')
    </div>
@endsection
