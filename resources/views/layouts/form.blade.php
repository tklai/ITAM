@extends('layouts.master')

@section('contents')
    @yield('customJS')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.error_msg')
            @yield('form')
        </div>
    </div>
@endsection