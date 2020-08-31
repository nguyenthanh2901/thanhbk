<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop ThanhBK | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type=" {{asset('image/x-icon')}}" href="">

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href=" {{asset('css/bootstrap.min.css')}}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href=" {{asset('css/owl.carousel.css')}}">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href=" {{asset('css/owl.theme.css')}}">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('fonts/font-icon.css')}}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="custom-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="custom-slider/css/preview.css" type="text/css" media="screen" />

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body class="home-four">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<!-- header area start -->
@include('components.header')
<!-- header area end -->
@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible" style="position: fixed;right: 20px;top: 20px;left: 50%;transform: translateX(-50%);z-index: 9999999999999;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ \Session::get('success') }}</strong>
    </div>
@endif

@if (\Session::has('warning'))
    <div class="alert alert-warning alert-dismissible" style="position: fixed;right: 20px;top: 20px;left: 50%;transform: translateX(-50%);z-index: 9999999999999;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ \Session::get('warning') }} </strong>
    </div>
@endif

@if (\Session::has('danger'))
    <div class="alert alert-danger alert-dismissible" style="position: fixed;right: 20px;top: 20px;left: 50%;transform: translateX(-50%);z-index: 9999999999999;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ \Session::get('danger') }}</strong>
    </div>
@endif
<!-- main area start -->
@yield('content')
<!-- FOOTER START -->
@include('components.footer')
<!-- FOOTER END -->

<!-- JS -->

<!-- jquery-1.11.3.min js
============================================ -->
<script src=" {{asset('js/vendor/jquery-1.11.3.min.js')}}"></script>

<!-- bootstrap js
============================================ -->
<script src=" {{asset('js/bootstrap.min.js')}}"></script>

<!-- Nivo slider js
============================================ -->
<script src=" {{asset('custom-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src=" {{asset('custom-slider/home.js')}}" type="text/javascript"></script>

<!-- owl.carousel.min js
============================================ -->
<script src=" {{asset('js/owl.carousel.min.js')}}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src=" {{asset('js/jquery.scrollUp.min.js')}}"></script>

<!-- price-slider js
============================================ -->
<script src="{{asset('js/price-slider.js')}}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{asset('js/jquery.bxslider.min.js')}}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{asset('js/jquery.meanmenu.js')}}"></script>

<!-- wow js
============================================ -->
<script src="{{asset('js/wow.js')}}"></script>

<!-- plugins js
============================================ -->
<script src="{{asset('js/plugins.js')}}"></script>

<!-- main js
============================================ -->
<script src="{{asset('js/main.js')}}"></script>
@yield('script')
</body>
</html>
