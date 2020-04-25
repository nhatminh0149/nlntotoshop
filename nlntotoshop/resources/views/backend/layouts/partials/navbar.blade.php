<!-- <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item">
            <a class="nav-link" href="#">Sign out</a>
        </li>
    </ul>
</nav> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Header-->
    <nav class="navbar navbar-light justify-content-between" style="color: #f6a519; background: #0c0805; text-decoration: none;">
    <div class="container">
            <div class="left-panel">
                <img src="{{ asset('img/logo/logoshop1.jpg') }}" class="img-list" width="100" height="50"/>
            </div>
            <div class="right-panel">
            <a>  Xin chào Admin </a>&nbsp;&nbsp;&nbsp;
            <i class="fa fa-heart" aria-hidden="true"></i> <a href="{{ route('frontend.home') }}" style="color: #e49818; text-decoration: none;">Trang chủ</a>&nbsp;&nbsp;&nbsp;
            <i class="fa fa-sign-out" aria-hidden="true"></i> <a href="#"  style="color: #e49818; text-decoration: none;">Đăng xuất</a>
            </div>
        </div>
    </nav>
    <!-- End Header --> 
</body>
</html>
