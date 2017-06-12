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
                        <h2>Блог</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('index') }}">
                                    <i class="ion-ios-home"></i>
                                    Главная
                                </a>
                            </li>
                            <li class="active">Блог</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->
    <section id="blog-full-width">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @forelse($posts as $key => $post)
                        <article class="wow fadeInDown" data-wow-delay="{{ $key * 0.2 }}s" data-wow-duration="500ms">
                            <div class="blog-post-image">
                                <a href="{{ route('blogPost', $post->id) }}">
                                    <img class="img-responsive" src="{{ $post->img_main }}" alt="{{ $post->title }}"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <h2 class="blogpost-title">
                                    <a href="{{ route('blogPost', $post->id) }}">{{ $post->title }}</a>
                                </h2>
                                <div class="blog-meta">
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ $post->desc }}</p>
                                <a href="{{ route('blogPost', $post->id) }}"
                                   class="btn btn-dafault btn-details">Читать</a>
                            </div>
                        </article>
                    @empty
                        <h2>Нет записей</h2>
                    @endforelse
                </div>
            </div>
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
                            sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam
                            temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                        <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown"
                           data-wow-delay=".7s" data-wow-duration="300ms">Contact With Me</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection('content')