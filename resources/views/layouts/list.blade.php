@extends('layouts.master')

@section('contents')
    @include('layouts.message')
    <div id="toolbar">
        <a class="btn btn-primary" href="/admin/@yield('category')/add" aria-label="create">
            <span class="fa fa-plus"></span> Add
        </a>
        {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
            {{--<span class="fa fa-trash"></span> Delete--}}
        {{--</a>--}}
    </div>
    <div class="table-responsive">
        @yield('table')
    </div>
    @include('layouts.bootstrap-table')
@endsection
