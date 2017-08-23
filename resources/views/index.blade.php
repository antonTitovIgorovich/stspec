@extends('layouts.main')
@section('seo')
    @include('layouts.seo.index_seo')
@endsection
@section('content')
    <!--
==================================================
Slider Section Start
================================================== -->
    <section id="hero-area"
             style="background-image: url({{ asset('images/sliders/slider' . rand(1,4) .'.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block wow fadeInUp" data-wow-delay=".3s">

                        <!-- Slider -->
                        <section class="cd-intro">
                            <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
                                <span class="title-line">SERVICE TUNING SPEC.</span><br>
                                <span>SUBARU<br></span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Impreza</b>
                                    <b>Legacy</b>
                                    <b>Impreza WRX</b>
                                    <b>Forester</b>
                                    <b>Tribeca</b>
                                    <b>Impreza STI</b>
                                    <b>Levorg</b>
                                    <b>Outback</b>
                                </span>
                            </h1>
                            <h2 class="wow fadeInUp animated" data-wow-delay=".6s">
                                <span>Сервис тюнинг специализация</span><br>
                                <span>г.Киев ул.Б.Окружная 4-б</span>
                            </h2>
                        </section> <!-- cd-intro -->
                        <!-- /.slider -->
                        <a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green"
                           data-wow-delay=".9s" href="#works" data-section="#works">Предоставляемые<br>услуги</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#main-slider-->
    <!--
    ==================================================
    Slider Section Start
    ================================================== -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                        <h2>
                            О нас
                        </h2>
                        <p>
                            Мы любим марку Субару! После долгого поиска подходящего сервиса марки Субару, было решено
                            создать свой. Мы перешли из любителей в профессионалы, создав сервис с нуля. Вас ждёт
                            специальный сервис марки SUBARU на Б.Окружной 4-б, возле ТЦ"Ашан".
                        </p>
                        <p>
                            На ST spec. опытные мастера, настоящие субаристы. Выполняем полный спектр работ, от протирки
                            пыли до капитального ремонта двигателя и АКПП. Также выполняем подетальный ремонт вариаторов
                            CVT SUBARU. Дарим хорошее настроение и даём гарантию на выполненные работы. Технический
                            тюнинг, свап, помощь в реализации любой идеи усовершенствования и конструирования.
                        </p>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                        <img src="images/about/aboutUs.jpg" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /#about -->
     <!--
    ==================================================
    Stock Section Start
    ================================================== -->
    @if(count($stocks) !== 0)
        <section  class="stock">
            <div class="container">
            	<div class="section-heading">
                    <h1 class="title wow fadeInDown" data-wow-delay=".3s">
                    {{ count($stocks) == 1 ? 'Акция' : 'Акции' }}
                    </h1>
                </div>
            <div class="row">
                @foreach($stocks as $key => $stock)
                    <div class="col-md-12">
	                    <div class="media wow fadeInLeft animated" data-wow-duration="500ms"
	                     data-wow-delay="{{ $key + 300 }}ms">
	                        <div class="media-left">
	                            @include('layouts.logo.small_logo')
	                        </div>
	                        <div class="media-body">
	                            <h4 class="media-heading">{{ $stock->title }}</h4>
	                            {!! $stock->text !!}                  
	                        </div>
	                    </div>
               		</div>
                @endforeach
            </div>
            </div>
        </section><!-- /#stocks -->
    @endif
    <!--
    ==================================================
    Portfolio Section Start
    ================================================== -->
    <section id="works" class="works">
        <div class="container">
            <div class="section-heading">
                <h1 class="title wow fadeInDown" data-wow-delay=".3s">Предоставляемые услуги</h1>
                <p class="wow fadeInDown" data-wow-delay=".5s">
                    {{ env('APP_TITLE') }} дает возможность воспользоваться такими видами услуг :
                </p>
            </div>
            @include('layouts.service_cards')
        </div>
    </section> <!-- #works -->
    <!--
    ==================================================
    Portfolio Section Start
    ================================================== -->
    <section id="feature">
        <div class="container">
            <div class="section-heading">
                <h1 class="title wow fadeInDown" data-wow-delay=".3s">Почему Стоит Выбрать<br>{{ env('APP_TITLE') }}?</h1>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="flaticon flaticon-diagnostic"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Полный контроль</h4>
                            <p>При выполнении работ вы контактируете с мастером, который занимается вашим автомобилем.</p>
                            <p>Вы всегда можете рассчитывать на полезные совет и рекомендацию из первых уст.</p>                       
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="flaticon flaticon-piston"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Гарантия на работу.</h4>
                            <p>Мы уверены в качестве наших услуг, по-этому на все наши работы мы даем гарантию.</p>
                            <p>Если после наших работ возникнет какая-либо проблема — мы решим ее бесплатно.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="flaticon flaticon-gearstick"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Сервис + Запчасти</h4>
                            <p>Вы можете рассчитывать не только на качественный автосервис, но и на широких выбор запчастей.</p>
                            <p>Вам больше не нужно тратить время на поиск запчастей — мы об этом позаботимся.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /#feature -->
@endsection('content')
