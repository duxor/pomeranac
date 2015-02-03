@extends('master')

@section('title')
    Pomeranac
    @stop

@section('body')
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#dragons + .gap"
            data-bottom-top="transform:translate3d(0px, 200%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url(slike/9.jpg)"
                data-anchor-target="#dragons + .gap"
                data-bottom-top="transform: translate3d(0px, -80%, 0px);"
                data-top-bottom="transform: translate3d(0px, 80%, 0px);"
                ></div>
    </div>

    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#bacons + .gap"
            data-bottom-top="transform:translate3d(0px, 200%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url(slike/8.jpg)"
                data-anchor-target="#bacons + .gap"
                data-bottom-top="transform: translate3d(0px, -80%, 0px);"
                data-top-bottom="transform: translate3d(0px, 80%, 0px);"
                ></div>
    </div>

    <div
            class="parallax-image-wrapper parallax-image-wrapper-50"
            data-anchor-target="#kittens + .gap"
            data-bottom-top="transform:translate3d(0px, 300%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-50"
                style="background-image:url(slike/3.jpg)"
                data-anchor-target="#kittens + .gap"
                data-bottom-top="transform: translate3d(0px, -60%, 0px);"
                data-top-bottom="transform: translate3d(0px, 60%, 0px);"
                ></div>
    </div>

    <div id="skrollr-body">
        {{--navigacija#################################################################################################--}}
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
                        <li @yield('pocetna')><a href="/">Početna</a></li>
                        <li @yield('o-nama')><a href="/">O nama</a></li>
                        <li @yield('o-rasi')><a href="/">Rasa Pomeranac</a></li>
                        <li @yield('o-psu')><a href="/">Pas Boo</a></li>
                        <li @yield('galerija')><a href="/">Galerija</a></li>
                        <li @yield('kontakt')><a href="/">Kontakt</a></li>

                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        {{--navigacija#################################################################################################--}}
        <div class="header" id="dragons">
        </div>

        <div class="gap gap-100" style="background-image:url(slike/9.jpg);"></div>
        <div class="content" id="bacons">
            <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst </p>

            <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>
            <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>

        </div>
        <div class="gap gap-100" style="background-image:url(slike/8.jpg);"></div>
        <div class="content content-full" id="kittens">
            Here be kittens
        </div>
        <div class="gap gap-50" style="background-image:url(slike/3.jpg);"></div>
        <div class="content" id="done">
            <p>tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst tekst</p>

        </div>
    </div>
@stop