@extends('layouts.master')

@section('title', 'Barcode')

@section('style')
    <style type="text/css">
        #barcodeArea {
            width: 400px;
            padding: 10px;
            border: 1px solid #000;
            margin-bottom: 1.5em;
        }
    </style>
@endsection

@section('actionButtons')
    <a class="btn btn-outline-dark mr-3" href="{{ route('assets.index') }}">
        <span class="fa fa-chevron-left"></span>
        <span class="d-none d-sm-inline"> Back</span>
    </a>
@endsection

@section('contents')
    @foreach($barcodes as $barcode)
        <div class="d-flex" id="barcodeArea">
            <div class="d-flex align-items-start flex-column">
                <div class="pb-1">
                    <h4><b>{{$barcode->modelName}}</b></h4>
                </div>
                <div class="pb-1">
                    <h5>{{$barcode->machineName}}</h5>
                </div>
                <div class="pb-1">
                    S/N: {{$barcode->serialNumber}}
                </div>
            </div>
            <div class="align-self-center ml-auto">
                {!! DNS2D::getBarcodeSVG(route('assets.landing', ['id' => $barcode->id]), 'QRCODE') !!}
            </div>
        </div>
    @endforeach
@endsection
