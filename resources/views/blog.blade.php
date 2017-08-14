@extends('layouts.main')
@section('seo')
    @include('layouts.seo.blog_list_seo')
@endsection('seo')
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
                                <a href="{{ route('indexPage') }}">
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
                                    <img class="img-responsive"
                                         src="{{ asset('storage/blog/img_main') . "/" . $post->img_main }}"
                                         alt="{{ $post->title }}"/>
                                </a>
                            </div>
                            <div class="blog-content">
                                <h2 class="blogpost-title">
                                    <a href="{{ route('blogPost', $post->id) }}">{{ $post->title }}</a>
                                </h2>
                                <div class="blog-meta">
                                    <p>Опубликовано {{ $post->created_at->diffForHumans() }}</p>
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
            <div class="col-md-12 flex-centered">
                {{ $posts->render() }}
            </div>
        </div>
    </section>
@endsection('content')
