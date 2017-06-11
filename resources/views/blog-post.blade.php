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
                            <span>{{ $content->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-img">
                        <img class="img-responsive" alt="{{ $content->title }}" src="{{ $content->img_main }}">
                    </div>
                    <div class="post-content">
                        {{ $content->text }}
                    </div>
                    @if(count($images) !== 0)
                        <div class="images">
                            <ul>
                                @foreach($images as $image)
                                    <li>
                                        @isset($image->title)
                                        <h4>{{ $image->title }}</h4>
                                        @endisset
                                        @isset($image->title)
                                        <p>{{ $image->desc }}</p>
                                        @endisset
                                        <img src="{{ $image->file_path }}" alt="{{ $image->title }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul class="social-share">
                        <h4>Share this article</h4>
                        <li>
                            <a href="#" class="Facebook">
                                <i class="ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Twitter">
                                <i class="ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Linkedin">
                                <i class="ion-social-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Google Plus">
                                <i class="ion-social-googleplus"></i>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="comments">
                        @include('layouts.sections.disqus')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')