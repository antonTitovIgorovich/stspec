<!doctype html>
<html class="no-js">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <title>Админ</title>
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
    <!-- tosrus.css -->
    <link rel="stylesheet" href="{{ asset('css/jquery.tosrus.all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
                    @include('layouts.logo.main_logo')
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
@include('layouts.sections.footer')
<!-- Template Javascript Files ================================================== -->
<!-- modernizr js -->
<script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
<!-- jquery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/menu-item-active.js') }}"></script>
<script src="{{ asset('packages/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/jquery.tosrus.all.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-filestyle.js') }}"></script>
<script src="{{ asset('js/admin-dialog.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>