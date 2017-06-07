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
                        @foreach($commentsGroup as $key => $comments)
                            @if($key !== 0 )
                                {{--If the comment is responding--}}
                                @break
                            @endif
                            @include('layouts.sections.comment', ['items' => $comments])
                        @endforeach
                    </div>
                    <div class="post-comment">
                        <h3>Оставить комментарий</h3>
                        <form role="form" class="form-horizontal">
                            @if(!Auth::check())
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="text" class="col-lg-12 form-control" placeholder="Имя">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="col-lg-12 form-control" placeholder="Email">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea class=" form-control" rows="8" placeholder="Сообщение"></textarea>
                                </div>
                            </div>
                            <p>
                                <button class="btn btn-send" type="submit">Отправить</button>
                            </p>
                                <input id="comment_post_id" type="hidden"
                                       name="comment_post_id" value="{{ $content->id }}">
                                <input id="comment_parent" type="hidden" name="comment_parent" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')