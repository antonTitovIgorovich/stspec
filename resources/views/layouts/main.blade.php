<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <title>Timer Agency Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Template CSS Files
    ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <!-- owl craousel css -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <!-- template main css file -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body>
<!--
       ==================================================
       Header Section Start
       ================================================== -->
<header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a href="index.html">
                    <img src="{{asset('images/logo.png')}}" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
    @include('layouts.sections.navigate')
    <!-- /main nav -->
    </div>
</header>
{{-- Start Content section --}}
@yield('content')
@show
{{-- /Content section --}}
<!--
==================================================
  Footer Section Start
================================================== -->
<footer id="footer">
    <div class="container">
        <div class="col-md-8">
            <p class="copyright">Copyright: <span>2015</span> . Design and Developed by <a
                        href="http://www.Themefisher.com">Themefisher</a></p>
        </div>
        <div class="col-md-4">
            <!-- Social Media -->
            <ul class="social">
                <li>
                    <a href="http://wwww.fb.com/themefisher" class="Facebook">
                        <i class="ion-social-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                        <i class="ion-social-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="Linkedin">
                        <i class="ion-social-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                        <i class="ion-social-googleplus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer> <!-- /#footer -->
<!-- Template Javascript Files
    ================================================== -->
<!-- modernizr js -->
<script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
<!-- jquery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- owl carouserl js -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- bootstrap js -->

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!-- slider js -->
<script src="{{ asset('js/slider.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/comment-reply.js') }}"></script>
<!-- template main js -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>