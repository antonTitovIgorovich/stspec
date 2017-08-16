@extends('layouts.main')
@section('seo')
    @include('layouts.seo.service_seo')
@endsection
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
                            <span>Предоставляемый сервис от {{ env('APP_TITLE') }}</span>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('indexPage') }}">
                                    <i class="ion-ios-home"></i>
                                    Главная
                                </a>
                            </li>
                            <li class="active">{{ $content->title }}</li>
                        </ol>
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
                        {!! $content->text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="works works-fit">
        <div class="container">
            <h2 class="subtitle">{{ env('APP_TITLE') }} предоставляет широкий спектр услуг :</h2>
            <!-- <p class="subtitle-des"></p> -->
            @include('layouts.service_cards')
        </div>
    </section>
    <!--
    ==================================================
    Footer Section Start
    ==================================================
@endsection('content')