<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!--Font-awesome-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <title>ToTo Shop | @yield('title')</title>

    <!-- Các custom style dành riêng cho từng view -->
    @yield('custom-css')
  </head>
  <body>
    <!-- Navbar -->
    @include('backend.layouts.partials.navbar')
    <!-- End Navbar -->

    <!-- Main content -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('backend.layouts.partials.sidebar')
            <!-- End sidebar -->

            <!-- Content -->
            <main class="col-md-9 col-sm-6 col-12 mb-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('feature-title')</h1>
                    <small>@yield('feature-description')</small>
                </div>
                @yield('content')
            </main>
            <!-- End content -->
        </div>
    </div>
    <!-- End main content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Các custom script dành riêng cho từng view -->
    @yield('custom-scripts')
  </body>
</html>