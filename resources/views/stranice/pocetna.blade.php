@extends('master')

@section('title')
    Pomeranac
    @stop

@section('body')
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#pocetna + .gap"
            data-bottom-top="transform:translate3d(0px, 200%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url(slike/9.jpg)"
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
                style="background-image:url(slike/8.jpg)"
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
                style="background-image:url(slike/3.jpg)"
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
                style="background-image:url(slike/4.jpg)"
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
                style="background-image:url(slike/11.jpg)"
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
                style="background-image:url(slike/10.jpg)"
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
                        <li><a href="#pocetna" class="scroll-link" data-id="pocetna">Početna</a></li>
                        <li><a href="#" class="scroll-link" data-id="o-nama">O nama</a></li>
                        <li><a href="#" class="scroll-link" data-id="rasa-pomeranac">Rasa Pomeranac</a></li>
                        <li><a href="#" class="scroll-link" data-id="pas-boo">Pas Boo</a></li>
                        <li><a href="#" class="scroll-link" data-id="galerija">Galerija</a></li>
                        <li><a href="#" class="scroll-link" data-id="kontakt">Kontakt</a></li>

                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
{{--navigacija END::--}}
        <div class="header" id="pocetna">
        </div>

        <div class="gap gap-100">
            <div class="okvir">
                <h1>Početna</h1>
                <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
                <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
                <a href="#" class="scroll-link btn btn-info" data-id="kontakt">Kontaktirajte nas</a>
            </div>
        </div>
        <div class="content" id="o-nama">
            <div class="container">
                <h1>O nama</h1>
                <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst </p>

                <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
                <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
                <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
                <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
            </div>
        </div>
        <div class="gap gap-100"></div>
        <div class="content content-full" id="rasa-pomeranac">
            <div class="container">
                <h1>Rasa Pomeranac</h1>
            </div>
        </div>
        <div class="gap gap-50"></div>
        <div class="content" id="pas-boo">
            <div class="container">
                <h1>Pas Boo</h1>
                <p>poslednji red tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
            </div>
        </div>
        <div class="gap gap-100"></div>
        <div class="content content-full" id="galerija">
            <div class="container">
                <h1>Galerija</h1>
                <p>poslednji red tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>

            </div>
        </div>
        <div class="gap gap-100"></div>
        <div class="content" id="kontakt">
            <div class="container">
                <h1>Kontakt</h1>
                <p>poslednji red tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
            </div>
        </div>

        <div class="gap gap-50"></div>
        <div class="content" id="done" style="height: 200px;">
            <p class="container">
                <a href="http://dusanperisic.com">web developer & dizajner</a>
            </p>
        </div>

    </div>
@stop