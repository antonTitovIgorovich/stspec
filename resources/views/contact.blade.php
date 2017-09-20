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
                        <h2 class="subtitle">Найти нас</h2>
                        <p class="subtitle-des">
                            г.Киев ул.Б.Окружная 4-б, возле Ашана, поворот перед БРСМ-Нафта
                        </p>
                        <a href="https://www.google.com.ua/maps/place/ST+spec+SUBARU/@50.427834,30.358725,15z/data=!4m5!3m4!1s0x0:0xf47ddbf1b88fe840!8m2!3d50.427834!4d30.358725" class="gm-link">{{ env('APP_TITLE') }} на "Google Maps"</a>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="row address-details">
                <div class="col-md-4">
                    <div class="address">
                        <i class="ion-ios-location-outline"></i>
                        <p>г.Киев<br>ул.Б.Окружная 4-б</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="email" style="height: 178px">
                        <i class="ion-ios-email-outline"></i>
                        <p>stspec@ukr.net</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <p>(068) 502-28-82 (сервис)<br>(073) 402-28-82 (зап.части)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')
@section('findUs')

@endsection('findUs')
@section('googleMapScript')
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD7pg71lgH5y_eGNIpVUzispD53ExiNeg&callback=initMap" async defer></script>
<script src="{{ asset('js/google-map_init.js') }}"></script>
@endsection('googleMapScript')
