@extends('master')

@section('title')
    Pomeranac
    @stop


<?php
        $gMapa = "<div id='googleMap' style='height:300px;'></div>";
$galerijaTekst.='
<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="slike/galerije/test-g-1/2.jpg" alt="..." data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
            <div class="caption">
                <h1>Galerija test 1</h1>
                <p>Testni tekst</p>
                <button type="button" class="btn btn-lg btn-success">Pregled</button>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="slike/galerije/test-g-2/4.jpg" alt="..." data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
            <div class="caption">
                <h1>Galerija test 2</h1>
                <p>Testni tekst</p>
                <button type="button" class="btn btn-lg btn-success">Pregled</button>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="slike/galerije/test-g-3/11.jpg" alt="..." data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
            <div class="caption">
                <h1>Galerija test 3</h1>
                <p>Testni tekst</p>
                <button type="button" class="btn btn-lg btn-success">Pregled</button>
            </div>
        </div>
    </div>
</div>

';
?>


@section('body')
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#pocetna + .gap"
            data-bottom-top="transform:translate3d(0px, 150%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url({!! $pozadina[1] !!})"
                data-anchor-target="#pocetna + .gap"
                data-bottom-top="transform: translate3d(0px, -80%, 0px);"
                data-top-bottom="transform: translate3d(0px, 80%, 0px);"
                ></div>
    </div>

    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#o-nama + .gap"
            data-bottom-top="transform:translate3d(0px, 200%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url({!! $pozadina[2] !!})"
                data-anchor-target="#o-nama + .gap"
                data-bottom-top="transform: translate3d(0px, -80%, 0px);"
                data-top-bottom="transform: translate3d(0px, 80%, 0px);"
                ></div>
    </div>

    <div
            class="parallax-image-wrapper parallax-image-wrapper-50"
            data-anchor-target="#rasa-pomeranac + .gap"
            data-bottom-top="transform:translate3d(0px, 300%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-50"
                style="background-image:url({!! $pozadina[3] !!})"
                data-anchor-target="#rasa-pomeranac + .gap"
                data-bottom-top="transform: translate3d(0px, -60%, 0px);"
                data-top-bottom="transform: translate3d(0px, 60%, 0px);"
                ></div>
    </div>
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#pas-boo + .gap"
            data-bottom-top="transform:translate3d(0px, 300%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-50"
                style="background-image:url({!! $pozadina[4] !!})"
                data-anchor-target="#pas-boo + .gap"
                data-bottom-top="transform: translate3d(0px, -60%, 0px);"
                data-top-bottom="transform: translate3d(0px, 60%, 0px);"
                ></div>
    </div>
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#galerija + .gap"
            data-bottom-top="transform:translate3d(0px, 300%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-50"
                style="background-image:url({!! $pozadina[5] !!})"
                data-anchor-target="#galerija + .gap"
                data-bottom-top="transform: translate3d(0px, -60%, 0px);"
                data-top-bottom="transform: translate3d(0px, 60%, 0px);"
                ></div>
    </div>
    <div
            class="parallax-image-wrapper parallax-image-wrapper-50"
            data-anchor-target="#kontakt + .gap"
            data-bottom-top="transform:translate3d(0px, 300%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-50"
                style="background-image:url({!! $pozadina[6] !!})"
                data-anchor-target="#kontakt + .gap"
                data-bottom-top="transform: translate3d(0px, -60%, 0px);"
                data-top-bottom="transform: translate3d(0px, 60%, 0px);"
                ></div>
    </div>

    <div id="skrollr-body">
{{--navigacija START::--}}
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        Pomeranac
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#pocetna" class="scroll-link" data-id="pocetna">{!! $meni[1] !!}</a></li>
                        <li><a href="#" class="scroll-link" data-id="o-nama">{!! $meni[2] !!}</a></li>
                        <li><a href="#" class="scroll-link" data-id="rasa-pomeranac">{!! $meni[3] !!}</a></li>
                        <li><a href="#" class="scroll-link" data-id="pas-boo">{!! $meni[4] !!}</a></li>
                        <li><a href="#" class="scroll-link" data-id="galerija">{!! $meni[5] !!}</a></li>
                        <li><a href="#" class="scroll-link" data-id="kontakt">{!! $meni[6] !!}</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-right"><button class='navbar-btn btn btn-default'><?php require_once'php/dugme-prevodioca.php'?></button></li>

                    </ul>
                </div>
            </div>
        </nav>
{{--navigacija END::--}}

        {{--pocetna START::--}}
        <div id="pocetna">
            <?php require_once'php/slideshow.php'?>
                <div class="okvir">
                    {!! $pocetnaNaslov !!}
                    {!! $pocetnaTekst !!}
                    <a href="#" class="scroll-link btn btn-info" data-id="kontakt">{!! $pocetnaLink !!}</a>
                </div>
        </div>
        <div class="gap gap-100">
            <!--
            <div class="okvir col-sm-7">
                <div class="col-sm-8">

                </div>
                <div class="col-sm-4">
                    {!! $pocetnaNaslov !!}
                    {!! $pocetnaTekst !!}
                    <a href="#" class="scroll-link btn btn-info" data-id="kontakt">{!! $pocetnaLink !!}</a>
                </div>

            </div>-->
        </div>
        {{--pocetna END::--}}

        {{--O nama START::--}}
        <div class="content" id="o-nama">
            <div class="container">
                {!! $oNamaNaslov !!}
                {!! $oNamaTekst !!}
            </div>
        </div>
        <div class="gap gap-100"></div>
        {{--O nama END::--}}

        {{--Rasa pomeranac START::--}}
        <div class="content content-full" id="rasa-pomeranac">
            <div class="container">
                {!! $rasaPomeranacNaslov !!}
                {!! $rasaPomeranacTekst !!}
            </div>
        </div>
        <div class="gap gap-50"></div>
        {{--Rasa pomeranac END::--}}

        {{--pas Boo START::--}}
        <div class="content" id="pas-boo">
            <div class="container">
                {!! $pasBooNaslov !!}
                {!! $pasBooTekst !!}
            </div>
        </div>
        <div class="gap gap-100"></div>
        {{--pas Boo END::--}}

        {{--galerija START::--}}
        <div class="content content-full" id="galerija">
            <div class="container">
                {!! $galerijaNaslov !!}
                {!! $galerijaTekst !!}
            </div>
        </div>
        <div class="gap gap-100"></div>
        {{--galerija END::--}}

        {{--kontakt START::--}}
        <div class="content" id="kontakt">
            <div class="container">
                {!! $kontaktNaslov !!}
                {!! $gMapa !!}
                {!! $kontaktTekst !!}
                <button class="btn btn-success" data-toggle="modal" data-target="#posaljiMail">Kontaktirajte nas putem email-a</button>
            </div>
        </div>
        <div class="gap gap-50"></div>
        {{--kontakt END::--}}

        {{--footer START::--}}
        <div class="content" id="done" style="height: 200px;">
            <div class="container">
                <div class="col-sm-3 thumbnail">
                    <img src="slike/banner/web-design-develop-dusan-perisic.jpg" alt="...">
                    <div class="caption">
                        <h3>Web develop & design</h3>
                        <p><a href="http://dusanperisic.com" class="btn btn-primary" role="button">Poseti stranicu</a></p>
                    </div>
                </div>
            </div>
        </div>
        {{--footer END::--}}

    </div>

    {{--MODAL:: posalji mail START::--}}
    <div class="modal fade" id="posaljiMail">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    Kontaktirajte nas putem email-a
                </div>
                <div class="modal-body">
                    {!! Form::open() !!}
                        {!! Form::text('ime', null, ['class'=>'form-control', 'placeholder'=>'Ime i Prezime']) !!}
                        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail']) !!}
                        {!! Form::text('telefon', null, ['class'=>'form-control', 'placeholder'=>'Telefon']) !!}
                        {!! Form::textarea('poruka', null, ['class'=>'form-control', 'placeholder'=>'Poruka...']) !!}
                    </div>
                <div class="modal-footer">
                        {!! Form::submit('Pošalji', ['class'=>'btn btn-success']) !!}
                        {!! Form::reset('Obriši sve', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{--MODAL:: posalji mail END::--}}
@stop