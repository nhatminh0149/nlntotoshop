<style>
    @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli|Roboto|Gugi|Roboto+Mono|Roboto+Mono:wght@100;300;40|Quicksand:wght@500");
    
    /* header */
    a.btnToto{
        width: 50px;
        padding: 5px;
        border: 1px solid whitesmoke;
        position: relative;
        color: whitesmoke;
        text-decoration: none;
        font-size: 12px;
    }
    a.btnToto:hover{
        border: 1px solid #78cccd;
        color: black;
        text-decoration: none;
        color: #78cccd;
    }
</style>

<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12 mt-2 text-center">
                        <a href="{{ route('app.setLocale', ['locale' => 'vi']) }}" class="btnToto"><img src="{{ asset('img/logo/vietnam.jpg') }}" alt="img" width="14px" height="14px">&nbsp;{{ __('totoshop.vietnam') }}</a>&nbsp;
                        <a href="{{ route('app.setLocale', ['locale' => 'en']) }}" class="btnToto"><img src="{{ asset('img/logo/usa.jpg') }}" alt="img" width="14px" height="14px">&nbsp;{{ __('totoshop.english') }}</a>&nbsp;
                </div>

                <div class="col-md-4 col-sm-12 col-12 text-center">
                    
                </div>

                <div class="col-md-4 col-sm-12 col-12 mt-2 text-center">
                    @if(Session::has('kh_taiKhoan'))
                        <a href="#" class="btnToto"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp;Hi! {{ Session::get('kh_hoTen') }}</a>
                        <a id="btnDangxuat" href="{{ route('frontend.logout') }}" class="btnToto"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;{{ __('totoshop.dangxuat') }}</a>
                    @else
                        <a href="{{ route('frontend.register') }}" class="btnToto"><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;{{ __('totoshop.dangky') }}</a>&nbsp;
                        <a href="{{ route('frontend.login') }}" class="btnToto"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;{{ __('totoshop.dangnhap') }}</a>    
                    @endif
                </div>
            </div>

        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="" class="logo">
                    <img src="{{ asset('img/logo/logoshop.jpg') }}" class="img-list" width="90" height="70"/>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        @if(Session::has('kh_taiKhoan') && Session::get('kh_taiKhoan') == 'admin')
                            <li class="{{ Request::is('/') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.home') }}">{{ __('totoshop.trangchu') }}</a>
                            </li>

                            <li class="{{ Request::is('san-pham') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.product') }}">{{ __('totoshop.sanpham') }}</a>
                            </li>

                            <li class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.about') }}">{{ __('totoshop.gioithieu') }}</a>
                            </li>

                            <li class="{{ Request::is('lien-he') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.contact') }}">{{ __('totoshop.lienhe') }}</a>
                            </li>

                            <li class="{{ Request::is('admin') ? 'active-menu' : '' }}">
                                <a href="{{ route('danhsachloaisanpham.index') }}">{{ __('totoshop.quantri') }}</a>
                            </li>
                        @else
                            <li class="{{ Request::is('/') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.home') }}">{{ __('totoshop.trangchu') }}</a>
                            </li>

                            <li class="{{ Request::is('san-pham') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.product') }}">{{ __('totoshop.sanpham') }}</a>
                            </li>

                            <li class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.about') }}">{{ __('totoshop.gioithieu') }}</a>
                            </li>


                            <li class="{{ Request::is('lien-he') ? 'active-menu' : '' }}">
                                <a href="{{ route('frontend.contact') }}">{{ __('totoshop.lienhe') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
                
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <!-- Hiển thị nút summart cart -->
                    <ngcart-summary class="js-show-cart" template-url="{{ asset('vendor/ngCart/template/ngCart/summary.html') }}"></ngcart-summary>
                    
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="{{ asset('themes/cozastore/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12 mt-3 text-center">
                        <a href="#" class="btnToto"><img src="{{ asset('img/logo/vietnam.jpg') }}" alt="img" width="14px" height="14px">&nbsp;Vietnamese</a>&nbsp;
                        <a href="#" class="btnToto"><img src="{{ asset('img/logo/usa.jpg') }}" alt="img" width="14px" height="14px">&nbsp;English</a>&nbsp;
                </div>

                <div class="col-md-4 col-sm-12 col-12 text-center">
                    
                </div>

                <div class="col-md-4 col-sm-12 col-12 mt-3 text-center">
                        <a href="#" class="btnToto"><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Đăng ký</a>&nbsp;
                        <a href="#" class="btnToto"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Đăng nhập</a>
                </div>
            </div>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="index.html">Home</a>
                <ul class="sub-menu-m">
                    <li><a href="index.html">Homepage 1</a></li>
                    <li><a href="home-02.html">Homepage 2</a></li>
                    <li><a href="home-03.html">Homepage 3</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="#">Shop</a>
            </li>

            <li>
                <a href="#" class="label1 rs1" data-label1="hot">Features</a>
            </li>

            <li>
                <a href="#">About</a>
            </li>

            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('themes/cozastore/images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
