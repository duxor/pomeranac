<!--
         _____ _ _ __\/_____ __ _   ___ ___ ___ _ __\/___ _/___
        |_    | | |  ___/   |  \ | |   | __|   | |  ___/ |  __/
         _| | | | |___  | ^ | |  | | ^_| __| ^_| |___  | | |__
        |_____|_,_|_____|_|_|_|__| |_| |___|_|\ _|_____|_|____|

        Hvala što se interesujete za kod :)

        Kontakt za developere: kontakt@dusanperisic.com

-->

<!DOCTYPE html>
<html lang="sr" class="no-skrollr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="google-translate-customization" content="4b4d958b69d4c0b7-2ba8e64cf341c6a0-gd3bc2eb0107eaa06-10">
    <title>@yield('title')</title>

    {!!HTML::style('css/bootstrap.min.css')!!}
    {!!HTML::style('css/templejt.css')!!}
    {!!HTML::style('css/parallax.css')!!}
    {!!HTML::script('js/jquery-3.0.js')!!}
    {!!HTML::script('js/funkcije.js')!!}
    @if(isset($x))
        <script>var mx="{!! $x !!}", my="{!! $y !!}";</script>
        {!! HTML::script('http://maps.googleapis.com/maps/api/js') !!}
        {!! HTML::script('js/gmap1.js') !!}
    @endif
    {!! HTML::style('css/fontello.css') !!}
    {!! HTML::style('css/fontello-ie7.css') !!}
    {!!HTML::style('css/animation.css')!!}
</head>

<body>
    {{--navigacija START::--}}
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-btn" href="/">
                    <img src="/slike/logo.png" style="margin-top:-30px">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navDux">
                <ul class="nav navbar-nav navbar-right">
                    <li class="navbar-btn" title="Upoznajte naš tim" data-placement="bottom"><a href="/#o-nama" class="scroll-link" data-id="o-nama"><span class="glyphicon glyphicon-user"></span> {!! $meni[0]['naslov'] !!}</a></li>
                    <li class="navbar-btn" title="Pročitajte odakle potiče rasa Pomeranac" data-placement="bottom"><a href="/#rasa-pomeranac" class="scroll-link" data-id="rasa-pomeranac"><i class="icon-guidedog" style="font-size: 20px"></i> {!! $meni[1]['naslov'] !!}</a></li>
                    <li class="navbar-btn" title="Upoznajte našeg Boa" data-placement="bottom"><a href="/#pas-boo" class="scroll-link" data-id="pas-boo"><i class="icon-guidedog" style="font-size: 20px"></i> {!! $meni[2]['naslov'] !!}</a></li>
                    <li class="navbar-btn" title="Pogledajte fotografije i video" data-placement="bottom"><a href="/#galerija" class="scroll-link" data-id="galerija"><span class="glyphicon glyphicon-picture"></span> {!! $meni[3]['naslov'] !!}</a></li>
                    <li class="navbar-btn" title="Kontaktirajte nas i obezbedite najlepšeg kućnog ljubimca" data-placement="bottom"><a href="/#kontakt" class="scroll-link" data-id="kontakt"><span class="glyphicon glyphicon-earphone"></span> {!! $meni[4]['naslov'] !!}</a></li>
                    <li class="navbar-btn btn btn-default">@include('dodaci.dugme-prevodioca')</li><script>$(document).ready(function(){$('.navbar-btn').tooltip()})</script>
                </ul>
            </div>
        </div>
    </nav>
    {{--navigacija END::--}}
    <div id="container" class="container">
        @yield('content')
    </div>

    @yield('body')

    {!! HTML::script('js/skrollr.min.js') !!}
    <script type="text/javascript">
        skrollr.init({
            smoothScrolling: false,
            mobileDeceleration: 0.004
        });
        $(document).ready(function(){$('._tooltip').tooltip()});
    </script>
    {!! HTML::script('js/bootstrap.min.js') !!}

    <div class="footer">
        <div class="container">
            <div class="col-sm-10">
                <a href="http://dusanperisic.com" target="_blank" class="btn btn-lg btn-primary _tooltip" title="Autor aplikacije"><span class="glyphicon glyphicon-briefcase"></span> <b><i>dusanperisic.com</i></b></a>
            </div>
            <div class="col-sm-2">
                <a href="/administracija" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-cog"></span> Administracija</a>
            </div>
        </div>
    </div>
    {!!Form::hidden('_token',csrf_token(),['id'=>'_token'])!!}
</body>
</html>