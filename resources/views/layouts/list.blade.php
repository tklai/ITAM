@extends('layouts.master')

@section('actionButtons')
        <a class="btn btn-primary" href="/admin/@yield('category')/add" aria-label="create">
            <span class="oi" data-glyph="plus"></span> Add</a>
    {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
    {{--<span class="oi" data-glyph="trash"></span> Delete--}}
    {{--</a>--}}
@endsection

@section('contents')
    @include('layouts.message')
    <div class="table-responsive">
        @yield('table')

    </div>
    @include('layouts.bootstrap-table')
@endsection
