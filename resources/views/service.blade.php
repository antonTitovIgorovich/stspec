@extends('layouts.main')
@section('content')
    <!--
    ==================================================
    Global Page Section Start
    ================================================== -->
    <section class="global-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2>{{ $content->title }}</h2>
                        <div class="portfolio-meta">
                            <span> Категория: Сервис</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->

    <section class="portfolio-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="portfolio-single-img">
                        <img class="img-responsive" src="{{ asset('storage/services') . "/" . $content->img  }}"
                             alt="{{ $content->title }}">
                    </div>
                    <div class="portfolio-content">
                        <p>{!! $content->text !!}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="works works-fit">
        <div class="container">
            <h2 class="subtitle">Some Of Our Features Works</h2>
            <p class="subtitle-des">
                Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit amet
                est. Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor
                sagittis lacus.
            </p>
            @include('layouts.service_cards')
        </div>
    </section>

    <!--
    ==================================================
    Call To Action Section Start
    ================================================== -->
    <section id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="300ms">SO WHAT YOU
                            THINK ?</h2>
                        <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="300ms">Lorem ipsum dolor
                            sit amet, consectetur adipisicing elit. Nobis,</br>possimus commodi, fugiat magnam
                            temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                        <a href="#" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s"
                           data-wow-duration="300ms">Contact With Me</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--
    ==================================================
    Footer Section Start
    ==================================================
@endsection('content')