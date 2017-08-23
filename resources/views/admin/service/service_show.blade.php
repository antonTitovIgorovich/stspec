@extends('admin.layouts.main')
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
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->

    <section class="portfolio-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('service.index') }}">Сервис</a></li>
                        <li class="active">{{ $content->title }}</li>
                    </ol>
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

@endsection('content')