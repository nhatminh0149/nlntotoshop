<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    
    <style>
        /* footer */
        footer{
            background: linear-gradient(rgba(23, 23, 24, 0.85), rgba(30, 30, 31, 0.85)),
                    url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;
            background-size: cover;
            margin-top: 70px;
        }
        footer h6{
            color: #fdda5f;
            font-family: 'Muli', sans-serif;
        }
        footer p{
            color: #ebe8e3;
            font-family: 'Muli', sans-serif;
        }
        footer i{
            font-size: 23px;
            color: #fdda5f;
            font-family: 'Muli', sans-serif;
        }
    </style>
</head>
<body>
    <!-- Footer -->
    <footer class="page-footer font-small mdb-color">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-5 col-sm-6 col-12 mt-5">
                <h6 class="text-uppercase mb-4 font-weight-bold">{{ __('totoshop.footer_h6') }}</h6>
                <p><i class="fa fa-home mr-3"></i>{{ __('totoshop.footer_diachi') }}</p>
                <p> <i class="fa fa-phone mr-3"></i>0938 803 633</p>
                <p><i class="fa fa-envelope mr-3"></i>sale.online@totoshop.vn</p>
                <p>{{ __('totoshop.footer_dkkd') }} <br>
                {{ __('totoshop.footer_noicap') }}</p>
                <div class="text-center text-md-left">
                    <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-facebook-official" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-google-plus-official" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    </ul>
                </div>

                <div class="text-center text-md-left">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight">
                                <img src="{{ asset('img/logo/bocongthuong.jpg') }}" alt="logo2"  width="150px" height="50px;">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-sm-6 col-12 mt-5">
            <h6 class="text-uppercase mb-4 font-weight-bold">{{ __('totoshop.footer_thongtin') }}</h6>
            <p>{{ __('totoshop.footer_gioithieu') }}</p>
            <p>{{ __('totoshop.footer_doitac') }}</p>
            <p>{{ __('totoshop.footer_quydinhchung') }}</p>
            <p>{{ __('totoshop.footer_lienhecongty') }}</p>

            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-sm-6 col-12 mt-5">
            <h6 class="text-uppercase mb-4 font-weight-bold">{{ __('totoshop.footer_chinhsach') }}</h6>
            <p>{{ __('totoshop.footer_doihang') }}</p>
            <p>{{ __('totoshop.footer_baohanh') }}</p>
            <p>{{ __('totoshop.footer_baomat') }}</p>
            </div> 
            <!-- Grid column -->


            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 col-sm-6 col-12 mt-5">
            <h6 class="text-uppercase mb-4 font-weight-bold">FAQ</h6>
            <p>{{ __('totoshop.footer_thanhtoanvavanchuyen') }}</p>
            <p>{{ __('totoshop.footer_chonsize') }}</p>
            <p>{{ __('totoshop.footer_cauhoi') }}</p>
            <p>{{ __('totoshop.footer_ktratt') }}</p>
            </div> 
            <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <!-- Grid row -->
        <div class="row d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-8">

            <!--Copyright-->
            <p class="text-center text-md-left">
                <p>{{ __('totoshop.footer_thuonghieu') }}</p>
            </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-12 col-lg-4 ml-lg-0">

            <!-- Social buttons -->
            <div class="text-center text-md-left">
                <p>Copyrights © 2019 by ToToVN</p>
            </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

        </div>
        <!-- Footer Links -->

    </footer>
    <!-- End Footer -->
</body>
</html>