
    <style>
        @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli|Roboto|Gugi|Roboto+Mono|Roboto+Mono:wght@100;300;40|Quicksand:wght@500|Quicksand");
        
        /* Section-slide */
        .item-slick1{
            width: 100%;
            height: 550px;
        }
        .slick1 span{
            color: white;
        }
        .slick1 h2{
            color: white;
        }

        /* Section-2 */
        .section-2 .container{
            background: white;
            padding: 30px 0 30px 0;
            border: 5px solid black;
            margin-top: 50px;
        }
        .section-2 .row .col-md-6 .lookbook img {
            opacity: 0.8;
            width: 80%;
            border-radius: 0.2em;
            -webkit-transition: transform 0.9s ease;
            -o-transition: transform 0.9s ease;
            -moz-transition: transform 0.9s ease;
            transition: transform 0.9s ease;
        }
        .section-2 .row .col-md-6 .lookbook img:hover {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }

        .section-2 .row .col-md-6:last-child {
            position: relative;
        }

        .section-2 .row .col-md-6 .panel {
            position: absolute;
            top: 9vmin;
            left: -16vmin;
            background: white;
            border-radius: 3px;
            text-align: left;
            padding: 13vmin 5vmin 13vmin 10vmin;
            box-shadow: 0px 25px 42px rgba(0, 0, 0, 0.2);
            font-family: var(--Rubik);
            z-index: 1;
            font-size: 14px;
            -webkit-transition: transform 0.9s ease;
            -o-transition: transform 0.9s ease;
            -moz-transition: transform 0.9s ease;
            transition: transform 0.9s ease;
        }
        .section-2 .row .col-md-6 .panel:hover {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }

        .section-2 .row .col-md-6 .panel h1 {
            padding: 0em 0;
            font-size: 5vmin;
            font-family: 'Roboto Mono', monospace;
            color: black;
            letter-spacing: 2px;
        }

        .section-2 .row .col-md-6 .panel p {
            font-size: 0.83em;
            font-family: 'Roboto Mono', monospace;
        }

        .section-2 .button{
            width: 100%;
            margin-top: 30px;
        }
        .section-2 a.btnXemThem1{
            width: 50px;
            padding: 5px;
            border: 1px solid black;
            position: relative;
            color: black;
            background: white;
            text-decoration: none;
            font-family: 'Roboto Mono', monospace;
            font-weight: bold;
            letter-spacing: 2px;
            font-size: 15px;
        }
        .section-2 a.btnXemThem1:hover{
            background: white;
            color: #fdda5f;
            font-family: 'Roboto Mono', monospace;
            border: 1px solid #fdda5f;
        }

        /* Section-3 */
        .section-3{
            background: linear-gradient(rgba(23, 23, 24, 0.8), rgba(30, 30, 31, 0.8)),
            url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;
            margin-top: 150px;
            
        }
        .section-3 .list-title{
            font-family: 'Muli', sans-serif;
            letter-spacing: 2px;
            width: 100%;
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            padding: 30px 0 30px 0;
            color: #fdda5f;
        }
        .section-3 .shop-info h4{
            margin-top: 20px;
            font-family: 'Muli', sans-serif;
            font-weight: bold;
            color: #fdda5f;
        }
        .section-3 .shop-info p{
            font-family: 'Muli', sans-serif;
            font-weight: bold;
            color: #fdda5f;
        }

         /* Section-4 */
         .section-4{
            margin-top: 30px;
        }
        .section-4 h3{
            width: 100%;
            text-align: center;
            font-family: 'Muli', sans-serif;
            letter-spacing: 1px;
            font-weight: 700;
            margin-top: 15px;
        }
        .section-4 img{
            width: 100%;
            height: 100%;
        }
        .section-4 .text-center a.btnToco:hover{
            background: white;
            color: rgb(224, 186, 97);
            font-family: 'Muli', sans-serif;
            font-weight: bold;
        }
        .section-4 .button{
            width: 100%;
            margin-top: 30px;
        }
        .section-4 a.btnXemThem2{
            width: 50px;
            padding: 5px;
            border: 1px solid black;
            position: relative;
            color: black;
            background: white;
            text-decoration: none;
            font-family: 'Roboto Mono', monospace;
            font-weight: bold;
            letter-spacing: 2px;
            font-size: 15px;
        }
        .section-4 a.btnXemThem2:hover{
            background: white;
            color: #78cccd;
            font-family: 'Roboto Mono', monospace;
            border: 1px solid #78cccd;
        }
        .section-4 .linetoto hr{
            width: 30%;
            border: 1px solid #409294;
            margin-left: 385px;
            /* text-align: center; */
        }
        .hovereffect {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
        }

        .hovereffect .overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            background-color: rgba(0,0,0,0.5);
            -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
        }

        .hovereffect img {
            display: block;
            position: relative;
            -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
        }

        .hovereffect h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            background: rgba(0,0,0,0.6);
            -webkit-transform: translatey(-100px);
            -ms-transform: translatey(-100px);
            transform: translatey(-100px);
            -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
            transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
            padding: 10px;
        }

        .hovereffect a.info {
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            color: #fff;
            border: 1px solid #fff;
            background-color: transparent;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
            margin: 50px 0 0;
            padding: 7px 14px;
        }

        .hovereffect a.info:hover {
            box-shadow: 0 0 5px #fff;
        }

        .hovereffect:hover img {
            -ms-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
        }

        .hovereffect:hover .overlay {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        .hovereffect:hover h2,.hovereffect:hover a.info {
            opacity: 1;
            filter: alpha(opacity=100);
            -ms-transform: translatey(0);
            -webkit-transform: translatey(0);
            transform: translatey(0);
        }

        .hovereffect:hover a.info {
            -webkit-transition-delay: .2s;
            transition-delay: .2s;
        }
    </style>

    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url({{ asset('img/banner/banner9.jpg') }});">
                    
                </div>

                <div class="item-slick1" style="background-image: url({{ asset('img/banner/banner10.jpg') }});">
                    
                </div>

                <div class="item-slick1" style="background-image: url({{ asset('img/banner/banner11.jpg') }});">
                    
                </div>

                <div class="item-slick1" style="background-image: url({{ asset('img/banner/banner12.jpg') }});">
                    
                </div>

            </div>
        </div>
    </section>

    <!--  Section 2 -->
    <section class="section-2">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="lookbook">
                        <img src="{{ asset('img/lookbook/lookbook6.jpg') }}" alt="lookbook" class="" />
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="panel text-left">
                        <h1>{{ __('totoshop.section2_h1') }}</h1>
                        <p class="pt-4">
                            {{ __('totoshop.section2_p1') }} 
                        </p>
                        <p class="pt-2">
                            {{ __('totoshop.section2_p2') }}
                        </p>
                        <p class="pt-2">
                            {{ __('totoshop.section2_p3') }}
                        </p>
                        <div class="button">
                            <a href="{{ route('frontend.about') }}" class="btnXemThem1">{{ __('totoshop.section2_xemthem') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  Section 3 -->
    <section class="section-3">
        <div class="container-fluid">
            <div class="row"> 
                <h2 class="list-title">{{ __('totoshop.section3_h2') }}</h2>
            </div>
            
            <div class="row text-center text-white">
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="shop-info">
                        <img class="img-fluid" src="{{ asset('img/icon/facebook2.jpg') }}" alt="icon-1" width="100" height="100">
                        <h4>Facebook</h4>
                        <p>https://www.facebook.com/Totoshop.com.vn/</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="shop-info">
                        <img class="img-fluid" src="{{ asset('img/icon/store2.jpg') }}" alt="icon-1" width="100" height="100">
                        <h4>{{ __('totoshop.section3_h4_quymo') }}</h4>
                        <p>{{ __('totoshop.section3_p_quymo') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <div class="shop-info">
                        <img class="img-fluid" src="{{ asset('img/icon/phone2.jpg') }}" alt="icon-1" width="100" height="100">
                        <h4>1900 633 501</h4>
                        <p>{{ __('totoshop.section3_p_hotline') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  Section 4 -->
    <section class="section-4">
            <div class="container">
                <div class="row mt-5"> 
                    <h3 class="list-title">{{ __('totoshop.section4_h3') }}</h3>
                </div>
                <div class="linetoto mb-5">
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{ asset('img/sanpham/do_doi/aothunC1.jpg') }}" alt="">
                            <div class="overlay">
                            <!-- <h2>COUPLE CP6</h2>
                            <a class="info" href="#">Xem thêm</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{ asset('img/sanpham/do_doi/aothunC2.jpg') }}" alt="">
                            <div class="overlay">
                            <!-- <h2>COUPLE CP7</h2>
                            <a class="info" href="#">Xem thêm</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{ asset('img/sanpham/do_doi/aothunC3.jpg') }}" alt="">
                            <div class="overlay">
                            <!-- <h2>COUPLE CP8</h2>
                            <a class="info" href="#">Xem thêm</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{ asset('img/sanpham/do_doi/aothunC4.jpg') }}" alt="">
                            <div class="overlay">
                            <!-- <h2>COUPLE CP9</h2>
                            <a class="info" href="#">Xem thêm</a> -->
                            </div>
                        </div>
                    </div>       
                </div>

                <div class="button text-center pt-3">
                    <a href="{{ route('frontend.product') }}" class="btnXemThem2">{{ __('totoshop.section4_xemtatca') }}</a>
                </div>
            </div>
        </section> 

