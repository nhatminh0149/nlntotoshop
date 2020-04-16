<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .wrap-modal1 {
            position: fixed;
            width: 100%;
            height: 100vh;
            top: 0;
            left: 0;
            z-index: 9000;
            overflow: auto;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;

            visibility: hidden;
            opacity: 0;

            padding-top: 60px;
            padding-bottom: 20px;
        }

        .overlay-modal1 {
            position: fixed;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: #000;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="wrap-modal1 js-modal-{{ $sp->sp_ma }}">
        <div class="overlay-modal1 js-hide-modal" data-sp-ma="{{ $sp->sp_ma }}"></div>
         <!-- Product info -->
        @include('frontend.widgets.product-info', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
    </div>
</body>
</html>