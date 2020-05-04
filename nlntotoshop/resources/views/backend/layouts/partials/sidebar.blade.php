<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            
/* content-wrapper */
.menu-heading{
    background: #0c0805;
    line-height: 20px;
    padding: 10px;
    color: #f6a519;
    font-size: 18px;
    text-align: center;
}
 .menu-items{
    padding: 0;
    border: 1px solid #ccc;
}
 .menu-items ul{
    margin: 0;
    padding: 0;
}
.menu-items ul li{
    list-style: none;
    line-height: 30px;
    border-bottom: 1px solid #ccc;
    padding-left: 40px;
    background: white;
}
 .menu-items ul li:last-child{
    border-bottom: 0;
}
 .menu-items ul li a{
    color: rgba(16,29,44,.70) ;
    text-decoration: none;
}
 .menu-items ul li:hover{
    background: whitesmoke;
    color: rgba(16,29,44,.70) ;
}

    

        </style>
    </head>
    <body>
        <nav class="col-md-3 d-none d-md-block sidebar">
            <div class="sidebar-sticky" style="margin-top: 50px;">
                <!-- <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul> -->
                <div class="menu-heading" style="font-weight: bold;">DANH MỤC QUẢN LÝ</div>
                <div class="menu-items">
                <ul>
                    <li><a href="{{ route('danhsachnhacungcap.index') }}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Nhà cung cấp</a></li>
                    <li><a href="{{ route('danhsachloaisanpham.index') }}"><i class="fa fa-th-large" aria-hidden="true"></i>&nbsp; Loại sản phẩm</a></li>
                    <li><a href="{{ route('danhsachsanpham.index') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp; Sản phẩm</a></li>
                    <!-- <li><a href="?page=hinhsanpham_danhsach"><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp; Hình ảnh</a></li> -->
                    <li><a href="{{ route('danhsachkhachhang.index') }}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Khách hàng</a></li>
                    <li><a href="{{ route('danhsachhinhthucvanchuyen.index') }}"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp; Hình thức vận chuyển</a></li>
                    <li><a href="{{ route('danhsachdondathang.index') }}"><i class="fa fa-wpforms" aria-hidden="true"></i>&nbsp; Đơn đặt hàng</a></li>
                    <li><a href="{{ route('backend.baocao.donhang') }}"><i class="fa fa-area-chart" aria-hidden="true"></i>&nbsp; Thống kê</a></li>
                </ul>
                </div>
            </div>
        </nav>
    </body>
</html>