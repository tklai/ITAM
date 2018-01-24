@extends('layouts.guest')

@section('title', 'Login')

@section('contents')
        <div class="d-flex flex-row justify-content-center">
            <div class="col-sm-10 col-md-10">
                @include('layouts.message')
            </div>
        </div>
        <div class="d-flex flex-row flex-wrap justify-content-center">
            <div class="col-sm-5 col-md-5 align-self-center pt-sm-2 pb-md-1">
                <h2>Placeholder Company</h2>
                <h4>IT Asset Management System</h4>
            </div>
            <div class="col-sm-5 col-md-5 align-self-center pb-sm-3">
                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input id="username" type="text" class="form-control" name="username" required="true"
                               autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password" required="true">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-sign-in"></span> Login
                    </button>
                </form>
            </div>
        </div>
@endsection
