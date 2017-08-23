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
                        <li><a href="{{ route('blog.index') }}">Блог</a></li>
                        <li class="active">{{ $content->title }}</li>
                    </ol>
                    <div id="main-image" class="post-img">
                        <img class="img-responsive" alt="{{ $content->title }}"
                                 src="{{ asset('storage/blog/img_main') . "/" .  $content->img_main }}">
                    </div>
                    <div class="post-content portfolio-content">
                        {!! $content->text !!}
                    </div>
                    @if(count($content->images) > 0)
                        <div id="images" class="images-list">
                            @foreach($content->images as $image)
                                <img src="{{ asset('storage/blog/gallery') . "/" . $image->file_name }}"
                                     alt="{{ $image->title }}">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection('content')