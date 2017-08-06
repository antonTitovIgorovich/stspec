<!doctype html>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- template main css file -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/file-uploader/5.14.4/all.fine-uploader/fine-uploader-new.min.css">
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
                <a href="{{ url('/') }}">
                    <img src="{{asset('images/logo.png')}}" alt="st">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
    @include('admin.layouts.sections.navigate')
    <!-- /main nav -->
    </div>
</header>
{{-- Start Content section --}}
<div class="content-wrap">
    @yield('content')
    @show
</div>
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
<!-- Template Javascript Files ================================================== -->
<!-- modernizr js -->
<script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
<!-- jquery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/file-uploader/5.14.4/all.fine-uploader/all.fine-uploader.core.js"></script>
<script src="{{ asset('packages/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-filestyle.js') }}"></script>
<script src="{{ asset('js/admin-dialog.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>