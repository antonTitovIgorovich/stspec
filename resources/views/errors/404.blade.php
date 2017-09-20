@extends('layouts.main')
@section('content')
    <section class="moduler wrapper_404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">404</h1>
                        <h2 class="wow fadeInUp animated" data-wow-delay=".6s">Opps! Имеем проблему.</h2>
                        <p class="wow fadeInUp animated" data-wow-delay=".9s">Страница, которую вы ищете, была
                            перемещена,
                            удалена или, возможно, никогда не существовало.</p>
                        <a href="{{ url('/') }}" class="btn btn-dafault btn-home wow fadeInUp animated"
                           data-wow-delay="1s">На главную</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')