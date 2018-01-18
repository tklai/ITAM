@extends('layouts.master')

@section('contents')
    <div class="d-flex flex-row">
        <div class="col-12">
            <div class="table-responsive">
                <div id="flashAlert"></div>
                <div class="d-flex align-items-baseline mb-1">
                    <h3 class="mr-auto">@yield('title')</h3>
                    <a class="btn btn-primary" href="/admin/@yield('category')/add" aria-label="create">
                        <span class="oi" data-glyph="plus"></span> Add
                    </a>
                    {{--<a class="btn btn-danger" href="" aria-label="delete">--}}
                    {{--<span class="oi" data-glyph="trash"></span> Delete--}}
                    {{--</a>--}}
                </div>
                @yield('table')
            </div>
        </div>
    </div>

    @include('layouts.bootstrap-table')
@endsection
