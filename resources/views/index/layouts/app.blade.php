<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title',config('kuan.head.title'))</title>
    <meta name="description" content="@yield('description',config('kuan.head.description'))">
    <meta name="keywords" content="@yield('keywords',config('kuan.head.keywords'))">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ================= Favicon ================== -->
    <link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
    <link rel="icon" sizes="72x72" href="images/favicon/android-icon-72x72.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
    <!-- Bootstrap css-->
    <link rel="stylesheet" href="/index/css/bootstrap.min.css?t=<?php echo time()?>">
    <link rel="stylesheet" href="/index/css/style.css">
    <script src="/index/js/modernizr-2.8.3.min.js"></script>
    <script src="/index/js/jquery-2.2.4.min.js"></script>
    <script src="/index/js/bootstrap.min.js"></script>
</head>
<body class="blue-primary-color">
    @include('index.layouts._header')
    <section class="slider-section blue-slider">
        <div class="container-fluid no-padding">
            <div id="carousel-example-generic" class="carousel slide">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item active">
                    <!-- <img src="images/slider/slider1.jpg" alt="slider"> -->
                    <div class="carousel-caption">
                        <div class="slider-post">
                            <div class="slider-heading" data-animation="animated fadeInUp">
                                <h1>@yield('purpose',config('kuan.introduce'))</h1>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.item -->
            </div><!-- /.carousel -->
        </div><!-- /.container -->
    </section>
    <section class="main-content home-one-main-content">
        @yield('content')
    </section>
    @include('index.layouts._footer')
    @yield('script')
</body>
</html>
