<style>
    @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli|Roboto|Gugi|Roboto+Mono|Roboto+Mono:wght@100;300;40|Quicksand:wght@500");

    a.btnToto{
        width: 50px;
        padding: 5px;
        border: 1px solid whitesmoke;
        position: relative;
        color: whitesmoke;
        text-decoration: none;
        font-size: 12px;
        font-family: Quicksand,sans-serif;
        font-weight: bold;
    }
    a.btnToto:hover{
        border: 1px solid #f6a519;
        color: black;
        text-decoration: none;
        color: #f6a519;
    }
</style>

<!--Header-->
<nav class="navbar navbar-light justify-content-between" style="color: #f6a519; text-decoration: none; background: linear-gradient(rgba(23, 23, 24, 0.7), rgba(30, 30, 31, 0.7)),
            url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;">
<div class="container">
        <div class="left-panel">
            <img src="{{ asset('img/logo/logoshop1.jpg') }}" class="img-list" width="100" height="47"/>
        </div>
        <div class="right-panel">
            <!-- <a>  Xin chào Admin </a>&nbsp;&nbsp;&nbsp;
            <i class="fa fa-heart" aria-hidden="true"></i> <a href="{{ route('frontend.home') }}" style="color: #e49818; text-decoration: none;">Trang chủ</a>&nbsp;&nbsp;&nbsp; -->
            <a href="#" class="btnToto">Xin chào Admin</a>&nbsp;
            <a href="{{ route('frontend.home') }}" class="btnToto"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;Trang chủ</a>    
        </div>
       
    </div>
</nav>
<!-- End Header --> 
