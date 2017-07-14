@extends('layouts.main')
@section('content')
    <!--
==================================================
Slider Section Start
================================================== -->
    <section id="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="block wow fadeInUp" data-wow-delay=".3s">

                        <!-- Slider -->
                        <section class="cd-intro">
                            <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
                                <span>SERVICE TUNING SPEC.</span><br>
                                <span>SUBARU<br></span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Impreza STI</b>
                                    <b>Legacy</b>
                                    <b>Forester</b>
                                    <b>Tiberyca</b>
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
                        @if(count($stocks) !== 0)
                            <a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green"
                               data-wow-delay="1.2s" href="#stocks" data-section="#stocks">Акции</a>
                        @endif
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
                        <img src="images/about/about.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /#about -->
    <!--
    ==================================================
    Portfolio Section Start
    ================================================== -->
    <section id="works" class="works">
        <div class="container">
            <div class="section-heading">
                <h1 class="title wow fadeInDown" data-wow-delay=".3s">Предоставляемые услуги</h1>
                <p class="wow fadeInDown" data-wow-delay=".5s">
                    Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit
                    amet
                    est. Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna
                    dolor
                    sagittis lacus.
                </p>
            </div>
            @include('layouts.service_cards')
        </div>
    </section> <!-- #works -->
    <!--
    ==================================================
    Stock Section Start
    ================================================== -->
    @if(count($stocks) !== 0)
        <section id="stocks" class="stocks">
            <div class="container">
                <div class="section-heading">
                    <h1 class="title wow fadeInDown" data-wow-delay=".3s">Акции</h1>
                    <p class="wow fadeInDown" data-wow-delay=".5s">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed,<br> quasi dolores numquam dolor
                        vero
                        ex,
                        tempora commodi repellendus quod laborum.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($stocks as $key => $stock)
                    <div class="col-md-4 col-md-offset-4">
                        <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                            <div class="media-left">
                                <div class="icon">
                                    <i class="ion-ios-lightbulb-outline"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $stock->title }}</h4>
                                <p>{{ $stock->text }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section><!-- /#stocks -->
    @endif
    <!--
    ==================================================
    Portfolio Section Start
    ================================================== -->
    <section id="feature">
        <div class="container">
            <div class="section-heading">
                <h1 class="title wow fadeInDown" data-wow-delay=".3s">Offer From Me</h1>
                <p class="wow fadeInDown" data-wow-delay=".5s">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed,<br> quasi dolores numquam dolor vero
                    ex,
                    tempora commodi repellendus quod laborum.
                </p>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="ion-ios-flask-outline"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Media heading</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="ion-ios-lightbulb-outline"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Well documented.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="ion-ios-lightbulb-outline"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Well documented.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="ion-ios-americanfootball-outline"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Free updates</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1500ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="ion-ios-keypad-outline"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Solid Support</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1800ms">
                        <div class="media-left">
                            <div class="icon">
                                <i class="ion-ios-barcode-outline"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Simple Installation</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /#feature -->

    <!--
    ==================================================
    Call To Action Section Start
    ================================================== -->
    <section id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU
                            THINK
                            ?</h2>
                        <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit
                            amet,
                            consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero
                            magni
                            recusandae? Dolore, maxime praesentium.</p>
                        <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s"
                           data-wow-duration="500ms">Contact With Me</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection('content')
