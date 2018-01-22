@extends('layouts.master')

@section('actionButtons')
    <a class="btn btn-outline-dark mr-3" href="@yield('returnPage')">
        <span class="oi" data-glyph="chevron-left"></span>
        <span class="d-none d-sm-inline"> Back</span>
    </a>
@endsection

@section('contents')
    @include('layouts.message')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" method="POST" id="form-@yield('category')">
                {{ csrf_field() }}
                @yield('form')
            </form>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-outline-dark" href="@yield('returnPage')">
                <span class="oi" data-glyph="x"></span> Cancel
            </a>
            <button type="submit" class="btn btn-primary" form="form-@yield('category')">
                <span class="oi" data-glyph="plus"></span> Add
            </button>
        </div>
    </div>
@endsection
