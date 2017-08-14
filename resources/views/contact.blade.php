@extends('layouts.main')
@section('seo')
    @include('layouts.seo.contacts_seo')
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
                        <h2>Контакты</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('indexPage') }}">
                                    <i class="ion-ios-home"></i>
                                    Главная
                                </a>
                            </li>
                            <li class="active">Контакты</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#page-header-->


    <!--
    ==================================================
        Contact Section Start
    ================================================== -->
    <section id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="map-area">
                        <h2 class="subtitle  wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Найти нас</h2>
                        <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                            г.Киев ул.Б.Окружная 4-б, возле Ашана, поворот перед БРСМ-Нафта
                        </p>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="row address-details">
                <div class="col-md-4">
                    <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                        <i class="ion-ios-location-outline"></i>
                        <p>г.Киев<br>ул.Б.Окружная 4-б</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="email wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s" style="height: 178px">
                        <i class="ion-ios-email-outline"></i>
                        <p>stspec@ukr.net</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="phone wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                        <i class="ion-ios-telephone-outline"></i>
                        <p>(068) 502-28-82 (сервис)<br>(073) 402-28-82 (зап.части)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')
@section('findUs')
<section id="call-to-action" class="mobile-version">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="200ms">Позвонить к нам</h2>
                        <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="300ms">На номер Киевстар (068) 502-28-82</p>
                        <a href="tel:0685022882" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s"
                           data-wow-duration="500ms">Позвонить</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection('findUs')
@section('googleMapScript')
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD7pg71lgH5y_eGNIpVUzispD53ExiNeg&callback=initMap" async defer></script>
@endsection('googleMapScript')
