@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table.css') }}">
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
    @include('layouts.bootstrap-table')
@endsection

@section('actionButtons')
    <a class="btn btn-outline-dark mr-3" href="javascript:window.history.back();">
        <span class="fa fa-chevron-left"></span>
        <span class="d-none d-sm-inline"> Back</span>
    </a>
    <a class="btn btn-outline-dark ml-auto order-12" href="@yield('editPage')" aria-label="create">
        <span class="fa fa-pencil"></span> Edit
    </a>
@endsection

@section('contents')
    <ul class="nav nav-pills mb-2" id="detailTab" role="tablist">
        @yield('tab-items')
    </ul>

    <div class="tab-content" id="tab-content">
        @yield('tab-contents')
    </div>
@endsection
