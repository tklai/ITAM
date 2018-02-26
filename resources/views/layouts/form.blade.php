@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/selectize.default.css') }}">
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/selectize.min.js') }}"></script>
    @yield('additionalJS')
@endsection

@section('actionButtons')
    <a class="btn btn-outline-dark mr-3" href="@yield('returnPage')">
        <span class="fa fa-chevron-left"></span>
        <span class="d-none d-sm-inline"> Back</span>
    </a>
@endsection

@section('contents')
    @include('layouts.message')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" id="form-@yield('category')" method="POST" action="@yield('actionPage')">
                {{ csrf_field() }}
                @yield('form')
            </form>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-outline-dark" href="@yield('returnPage')">
                <span class="fa fa-times"></span> Cancel
            </a>
            <button type="submit" class="btn btn-primary" form="form-@yield('category')">
                @if(strpos(Route::currentRouteName(), 'create'))
                    <span class="fa fa-plus"></span> Create
                @elseif(strpos(Route::currentRouteName(), 'import'))
                    <span class="fa fa-upload"></span> Import
                @else
                    <span class="fa fa-pencil"></span> Edit
                @endif
            </button>
        </div>
    </div>
    @yield('modals')
@endsection
