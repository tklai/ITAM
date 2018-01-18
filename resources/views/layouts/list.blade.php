@extends('layouts.master')

@section('additionalHeaders')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table.css') }}">
    <script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
    <script type="text/javascript">
        function addActions(value, row) {
            return [
                '<div>',
                    @if(Route::currentRouteName() === 'asset.index')
                    '<button id="detail" class="btn btn-info mr-1" href="javascript:void(0)" aria-label="detail">' +
                        '<span class="oi" data-glyph="list"></span> ' +
                        '<span class="d-none d-md-inline"> Detail</span>' +
                    '</button>',
                    @endif
                    `<a id="edit" class="btn btn-light mr-1" href="javascript:void(0)" aria-label="edit">` +
                        '<span class="oi" data-glyph="pencil"></span>' +
                        '<span class="d-none d-md-inline"> Edit</span>' +
                    '</a>',
                    '<button id="delete" class="btn btn-danger" href="javascript:void(0)" aria-label="delete">' +
                        '<span class="oi" data-glyph="trash"></span> ' +
                        '<span class="d-none d-md-inline"> Delete</span>' +
                    '</button>',
                '</div>'
            ].join('');
        };
    </script>
    @yield('customJS')
@endsection

@section('contents')
    <div class="d-flex flex-row">
        <div class="col-12">
            <div class="table-responsive">
                <div id="flashAlert">
                </div>
                @yield('table')
            </div>
        </div>
    </div>
@endsection
