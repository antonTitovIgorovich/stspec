<!doctype html>
<html class="no-js">
<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- SEO
	================================================== -->
@yield('seo')

<!-- Favicon
	================================================== -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
	<link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Template CSS Files
	================================================== -->
	<!-- Twitter Bootstrs CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<!-- Ionicons Fonts Css -->
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<!-- tosrus.css -->
	<link rel="stylesheet" href="{{ asset('css/jquery.tosrus.all.css') }}">
	<!-- Hero area slider css-->
	<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
	<!-- owl craousel css -->
	<!-- <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}"> -->
	<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
	<!-- flaticon -->
	<link rel="stylesheet" href="{{ asset('fonts/flaticon/flaticon.css') }}">
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
			<!-- logo -->
			<div class="navbar-brand">
				<div class="mainLogo">
					<a href="{{ url('/') }}" title="{{ env('APP_TITLE') }}">
						@include('layouts.logo.main_logo')
					</a>
				</div>
			</div>
			<!-- /logo -->
		</div>
	<!-- contacts-head -->
	<div class="contacts-head">
		<i class="ion-ios-telephone-outline"></i>
		<p>(068) 502-28-82</p>
	</div>
	<!-- main nav -->
	   @include('layouts.sections.navigate')
	<!-- /main nav -->
	</div>
	<!-- call-me -->
	<div class="call-me">
		<a href="tel:0685022882">
			<i class="ion-ios-telephone-outline"></i>        
			<p>Позвонить</p>
		</a>
	</div>
	<!-- /call-me -->
</header>
<!-- /contacts-head -->

<!--
	==================================================
	Content Action Section Start
	================================================== -->
@yield('content')

@section('findUs')
	<!--
	==================================================
	Call To Action Section Start
	================================================== -->
	<section id="call-to-action">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
							{{ env('APP_TITLE') }}<br>на "Google Map"
						</h2>
						<p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">г.Киев ул.Б.Окружная
							4-б</p>
						<a href="https://www.google.com.ua/maps/place/ST+spec+SUBARU/@50.427834,30.358725,15z/data=!4m5!3m4!1s0x0:0xf47ddbf1b88fe840!8m2!3d50.427834!4d30.358725" class="btn btn-default btn-contact wow fadeInDown"
						   data-wow-delay=".7s"
						   data-wow-duration="500ms" title="Контакты">Перейти</a>
					</div>
				</div>

			</div>
		</div>
	</section>
@show
<!--
==================================================
  Footer Section Start
================================================== -->
@include('layouts.sections.footer')
<!-- Template Javascript Files
	================================================== -->
<!-- modernizr js -->
<script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
<!-- jquery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/menu-item-active.js') }}"></script>
<!-- tosrus js -->
<!-- <script src="{{ asset('js/vendor/hammer.min.js') }}"></script> -->
<script src="{{ asset('js/jquery.tosrus.all.min.js') }}"></script>
<script src="{{ asset('js/tosrus_init.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!-- slider js -->
<script src="{{ asset('js/slider.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<!-- template main js -->
<script src="{{ asset('js/main.js') }}"></script>
@yield('googleMapScript')
</body>
</html>