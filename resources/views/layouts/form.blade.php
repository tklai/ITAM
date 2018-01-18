@extends('layouts.master')

@section('contents')
    @yield('customJS')
    <div class="row">
        <div class="col-md-8 mx-auto">
            @include('layouts.error_msg')
            @yield('form')
        </div>
    </div>

    <div class="modal modal-danger fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <form method="post" id="deleteForm" role="form">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">{{ trans('general.cancel') }}</button>
                        <button type="submit" class="btn btn-outline" id="dataConfirmOK">{{ trans('general.yes') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection