@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('contents')
    <p class="lead">Welcome, {{ Auth::user()->name }}.
        <br>The time now is {{ date("Y-m-d H:i:s") }}.</p>
@endsection
