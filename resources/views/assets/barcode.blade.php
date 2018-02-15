<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barcode - IT Asset Management System</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <style type="text/css">
        .barcodeArea {
            width: 400px;
            padding: 10px;
            border: 1px solid #000;
            color: #000;
            line-height: 1;
        }
        .barcodeArea, h4 {
             margin-top: 0px;
             margin-bottom: 0px;
        }
        .barcode {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="col-sm-3 col-sm-offset-3">
                <div class="row">
                    <a class="btn btn-light" href="{{ route('assets.index') }}">
                        <span class="fa fa-chevron-left"></span> Back
                    </a>
                    <span style="padding-left:10px">Barcode</span>
                    @foreach($barcodes as $barcode)
                        <br>
                        <br>
                        <div class="row">
                            <div class="barcodeArea">
                                <div class="float-right">{!! DNS2D::getBarcodeSVG(route('assets.landing', ['id' => $barcode->id]), 'QRCODE', 3, 3) !!}</div>
                                <h4><b>{{$barcode->modelName}}</b></h4>
                                <p><h4>{{$barcode->machineName}}</h4></p>
                                <p>S/N: {{$barcode->serialNumber}}</p>
                                <p>
                                    <div class="barcode">{!! DNS1D::getBarcodeSVG($barcode->serialNumber, 'C39', 1.50, 50) !!}</div>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <noscript>This site is JavaScript-required. Please consider to enable JavaScript in your browser.</noscript>
</body>
</html>
