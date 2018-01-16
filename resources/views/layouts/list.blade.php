@extends('layouts.master')

@section('additionalHeaders')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table-app.css') }}">
    <script src="{{ asset('assets/js/bootstrap-table-app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#flashAlert").fadeTo(3000, 500).slideUp(500, function(){
                $("#flashAlert").slideUp(500);
            });
        });
        function addActions(value, row) {
            return [
                '<div class="btn-group">',
                @if(Route::currentRouteName() === 'asset.index')
                    '<button id="detail" class="btn btn-sm btn-primary" href="javascript:void(0)"><span class="glyphicon glyphicon-list"></span> Detail</button>',
                @endif
                '<button id="edit" class="btn btn-sm btn-default" href="javascript:void(0)"><span class="glyphicon glyphicon-pencil"></span> Edit</button>',
                '<button id="delete" class="btn btn-sm btn-danger" href="javascript:void(0)"><span class="glyphicon glyphicon-trash"></span> Delete</button>',
                '</div>'
            ].join('');
        };
    </script>
    @yield('customJS')
@endsection

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                @if (session('status'))
                    <div class="alert alert-success" id="flashAlert">
                        {{ session('status') }}
                    </div>
                @endif
                @yield('table')
            </div>
        </div>
    </div>
@endsection
