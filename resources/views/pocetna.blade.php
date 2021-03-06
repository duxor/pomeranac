@extends('master')
@section('title') Pomeranac @endsection
@section('body')
<script>
    window.onload = function(){
        fullScreen.showModal(); 
        navigare.start()
    }
</script>
{{-- pocetna --}}
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#pocetna + .gap"
            data-bottom-top="transform:translate3d(0px, 150%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url({!! $pozadina[1] !!})"
                data-anchor-target="#pocetna + .gap"
                data-bottom-top="transform: translate3d(0px, 50%, 0px);"
                data-top-bottom="transform: translate3d(0px, 30%, 0px);"
                ></div>
    </div>
{{-- o nama --}}
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#o-nama + .gap"
            data-bottom-top="transform:translate3d(0px, 190%, 0px)"
            data-top-bottom="transform:translate3d(0px, 40%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url({!! $pozadina[2] !!})"
                data-anchor-target="#o-nama + .gap"
                data-bottom-top="transform: translate3d(0px, -80%, 0px);"
                data-top-bottom="transform: translate3d(0px, 80%, 0px);"
                ></div>
    </div>
{{-- rasa pomeranac --}}
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#rasa-pomeranac + .gap"
            data-bottom-top="transform:translate3d(0px, 150%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-100"
                style="background-image:url({!! $pozadina[3] !!})"
                data-anchor-target="#rasa-pomeranac + .gap"
                data-bottom-top="transform: translate3d(0px, -40%, 0px);"
                data-top-bottom="transform: translate3d(0px, 60%, 0px);"
                ></div>
    </div>
{{-- pas boo --}}
    <div
            class="parallax-image-wrapper parallax-image-wrapper-100"
            data-anchor-target="#pas-boo + .gap"
            data-bottom-top="transform:translate3d(0px, 200%, 0px)"
            data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        <div
                class="parallax-image parallax-image-50"
                style="background-image:url({!! $pozadina[4] !!})"
                data-anchor-target="#pas-boo + .gap"
                data-bottom-top="transform: translate3d(0px, -60%, 0px);"
                data-top-bottom="transform: translate3d(0px, 160%, 0px);"
                ></div>
    </div>
{{-- galerija --}}
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
{{-- kontakt --}}
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

    <div style="position:absolute;margin-top:-70px" id="top"></div>
    <div id="skrollr-body">
        {{--pocetna START::--}}
        <div id="pocetna">
            <div class="container paddingTop">
                <div class="col-sm-5">
                    <div class="jumbotron" style="padding:10px 20px 40px 20px">
                        <h1 class="info scroll-link _tooltip" title="Pročitajte više o Pomerancu" style="font-size:200%;color:#5bc0ee;text-decoration:underline;cursor:pointer" data-id="rasa-pomeranac">{!!$pocetna[0]['naslov']!!}</h1>
                        {!!$pocetna[0]['sadrzaj']!!}
                    </div>
                    <div style="margin-top:-20px">
                        <a href="{{$drustveneMreze[0]['sadrzaj']}}" class="krug krug-fb _tooltip" data-placement="bottom" title="Lajkujte nas na facebooku">f</a>
                        <a href="{{$drustveneMreze[1]['sadrzaj']}}" class="krug krug-primary _tooltip" data-placement="bottom" title="Pratite nas na twitteru">t</a>
                        <a href="{{$drustveneMreze[2]['sadrzaj']}}" class="krug krug-gpp _tooltip" data-placement="bottom" title="Kontaktirajte naš google+">g+</a>
                        <div class="krug krug-mail _tooltip" data-toggle="modal" data-placement="bottom" title="Pošaljite nam email" data-target="#posaljiMail">@</div>
                    </div><br clear="all">
                </div>
                <div class="col-sm-7">
                    <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="slajderFoto" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                {!!$sliderIMGs['indikatori']!!}
                            </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <!--<div class="item active"><img src="/slike/galerije/osnovni-slider/1.jpg" alt="..."></div>
                            <div class="item"><img src="/slike/galerije/osnovni-slider/2.jpg" alt="..."></div> -->
                              {!!$sliderIMGs['foto']!!}
                          </div>

                          <!-- Controls -->
                          <a class="left carousel-control" href="#slajderFoto" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#slajderFoto" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                        
                            <h1>{!!$pocetna[1]['naslov']!!}</h1>
                            {!!$pocetna[1]['sadrzaj']!!}
                        </div></div>
                    
                    
                    
                </div>
                <div id="scrollToTop" style="position:fixed;bottom:20px;right:20px;z-index:999"><div class="scroll-link krug krug-default _tooltip" data-id="top" title="Povratak na početak"><i class="glyphicon glyphicon-chevron-up"></i></div></div>
            </div>
        <div style="position:fixed;bottom:5px;width: 100%;"><div id="scrollSledeci" onclick="navigare.nextPage()" class="krug krug-default _tooltip" title="Sledeća stranica"><i class="glyphicon glyphicon-chevron-down"></i></div></div>
        </div>

        <div class="gap gap-100"></div>
        {{--pocetna END::--}}

        {{--O nama START::--}}
        <div class="content" id="o-nama">
            <div class="container" style="height:100%;overflow:scroll">
                <h1>{!! $oNamaNaslov !!}</h1>
                {!! $oNamaTekst !!}
            </div>
        </div>
        <div class="gap gap-100"></div>
        {{--O nama END::--}}

        {{--Pomeranac START::--}}
        <div class="content content-full" id="rasa-pomeranac">
            <div class="container" style="height:100%;overflow:scroll">
                <h1>{!! $rasaPomeranacNaslov !!}</h1>
                {!! $rasaPomeranacTekst !!}
            </div>
        </div>
        <div class="gap gap-50"></div>
        {{--Pomeranac END::--}}

        {{--Boo START::--}}
        <div class="content" id="pas-boo">
            <div class="container" style="height:100%;overflow:scroll">
                <h1>{!! $pasBooNaslov !!}</h1>
                {!! $pasBooTekst !!}
            </div>
        </div>
        <div class="gap gap-100"></div>
        {{--Boo END::--}}

        {{--galerija START::--}}
        <div class="content content-full" id="galerija"><i class="icon-spin6 animate-spin" style="rgba(0,0,0,0);font-size:1px"></i>
            <div class="container" style="height:100%;overflow:scroll">
                <h1>{!!$galerijaNaslov!!}</h1>
                <div class="col-sm-7">
                    {!!$galerijaTekst!!}
                </div>
                <div class="col-sm-5">
                    @if($galerije)
                        @foreach($galerije as $g)
                        <div class="col-sm-6 galerijaFoto" style="padding:0 1px 1px 0;marginr:0px" onmouseover="duXorFotoEfect.showTitle(this)" onmouseout="duXorFotoEfect.showTitle(this)">
                            <img src="{{$g['foto']}}" style="height:100%;width:100%">
                            <div onclick="duXorModal.show(this)" class="naslov" data-slug="{{$g['slug']}}" onmouseout="duXorFotoEfect.showTitle(this)">
                                <p>{{$g['naslov']}}</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-sm-6 galerijaFoto" style="padding:0 1px 0 0;marginr:0px;">
                            <img src="{{$galerije[0]['foto']}}" style="height:100%;width:100%">
                            <a href="/sve-galerije" class="naslov" style="display:block"><p>Sve galerije</p></a>
                        </div>
                    @else
                        <p style="margin-top:100px">Ni jedna galerija nije unesena.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="gap gap-100"></div>
        {{--galerija END::--}}

        {{--kontakt START::--}}
        <div class="content" id="kontakt">
            <div class="container"  style="padding-top: 40px">
                <div class="col-sm-4">
                    <h1>{!! $kontaktNaslov !!}</h1>
                    {!! $kontaktTekst !!}
                    <p>Kontaktirajte nas putem <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#posaljiMail"><span class="glyphicon glyphicon-envelope"></span> email-a</button></p>
                </div>
                <div class="col-sm-8">
                    <div id='googleMap' style='height:300px;'></div>
                </div>
            </div>
        </div>
        <div class="gap gap-50"></div>
        {{--kontakt END::--}}

        {{--END START::--}}
        <div class="content" id="done" style="height: 1px;"></div>
        {{--END END::--}}

    

    {{--MODAL:: posalji mail START::--}}
    <div class="modal fade" id="posaljiMail">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close _tooltip" data-dismiss="modal" aria-hidden="true" title="Zatvorite formu za slanje" data-placement="bottom">&times;</button>
                    <h2>Kontaktirajte nas putem email-a</h2>
                </div>
                <div class="modal-body">
                    <div id="poruka" style="display: none"></div>
                    <div id="wait" style="display:none"><center><i class='icon-spin6 animate-spin' style="font-size: 350%"></i></center></div>
                    {!! Form::open(['class'=>'form-horizontal','id'=>'kontaktForma']) !!}
                    <div id="dk_ime" class="form-group has-feedback">
                        {!! Form::label('lime','Ime',['class'=>'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('k_ime', null, ['class'=>'form-control', 'placeholder'=>'Ime i Prezime', 'id'=>'k_ime']) !!}
                            <span id="sk_ime" class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>

                    <div id="dk_email" class="form-group has-feedback">
                        {!! Form::label('lemail','Email',['class'=>'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::email('k_email', null, ['class'=>'form-control', 'placeholder'=>'Email','id'=>'k_email']) !!}
                            <span id="sk_email" class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('ltelefon','Telefon',['class'=>'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('telefon', null, ['class'=>'form-control', 'placeholder'=>'Telefon']) !!}
                        </div>
                    </div>

                    <div id="dk_poruka" class="form-group has-feedback">
                        {!! Form::label('lporuka','Poruka',['class'=>'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('k_poruka', null, ['class'=>'form-control', 'placeholder'=>'Poruka','id'=>'k_poruka']) !!}
                            <span id="sk_poruka" class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('<span class="glyphicon glyphicon-envelope"></span> Pošalji', ['class'=>'btn btn-lg btn-primary _tooltip', 'onClick'=>'posaljiEmailKontakt()','title'=>'Kliknite za slanje poruke']) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-trash"></span> Obriši sve', ['class'=>'btn btn-lg btn-danger _tooltip','type'=>'reset','title'=>'Obrišite kompletan unos']) !!}
                    {!! Form::close() !!}
                    <script>
                        function posaljiEmailKontakt(){
                            if(!SubmitForm.check('kontaktForma')){ alert('Popunite sve podatke i pokušajte ponovo.'); return; }
                            Komunikacija.posalji('/posalji-mail','kontaktForma','poruka','wait','kontaktForma');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    {{--MODAL:: posalji mail END::--}}
@stop