@extends('layouts.main')
@section('content')
    <section class="moduler wrapper_404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">{{ $numberErr }}</h1>
                        <h2 class="wow fadeInUp animated" data-wow-delay=".6s">Opps! Имеем проблему.</h2>
                        <p class="wow fadeInUp animated" data-wow-delay=".9s">Страница, которую вы ищете, была
                            перемещена,
                            удалена или, возможно, никогда не существовало.</p>
                        <a href="{{ route('index') }}" class="btn btn-dafault btn-home wow fadeInUp animated"
                           data-wow-delay="1s">На главную</a>
                    </div>
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
                        <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="300ms">Lorem ipsum dolor sit
                            amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus
                            vero magni recusandae? Dolore, maxime praesentium.</p>
                        <a href="#" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s"
                           data-wow-duration="300ms">Contact With Me</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection('content')