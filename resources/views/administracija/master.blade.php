<!--
         _____ _ _ __\/_____ __ _   ___ ___ ___ _ __\/___ _/___
        |_    | | |  ___/   |  \ | |   | __|   | |  ___/ |  __/
         _| | | | |___  | ^ | |  | | ^_| __| ^_| |___  | | |__
        |_____|_,_|_____|_|_|_|__| |_| |___|_|\ _|_____|_|____|

        Hvala što se interesujete za kod :)

        Kontakt za developere: kontakt@dusanperisic.com

-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Administracija</title>
    {!!HTML::style('css/templejt.css')!!}
    {!!HTML::style('css/bootstrap.min.css')!!}
    {!!HTML::style('css/parallax.css')!!}
    {!!HTML::style('css/dropzone.css')!!}
        <style>
        body {
          padding-top: 60px;
        }
        </style>
    {!!HTML::style('css/fontello.css')!!}
    {!!HTML::style('css/animation.css')!!}
    {!!HTML::script('js/jquery-3.0.js')!!}
    {!!HTML::script('js/funkcije.js')!!}
    {!!HTML::script('tinymce/tinymce.min.js')!!}
    {!!HTML::script('tinymce/jquery.tinymce.min.js')!!}
</head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/administracija/"><span class="glyphicon glyphicon-home"></span> Pomeranac</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                @if(\App\Security::autentifikacijaTest(4,'min'))
                  <ul class="nav navbar-nav navbar-right">
					<li><a href="/admin/sadrzaji"><span class="glyphicon glyphicon-off"></span> Sadržaji</a></li>
                      <li class="dropdown @yield('tekstovi')">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-text-size"></span>ekstovi <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li class="@yield('pocetna')"><a href="/administracija/sadrzaj/pocetna"><span class="glyphicon glyphicon-home"></span> Početna</a></li>
                              <li class="@yield('o-nama')"><a href="/administracija/sadrzaj/o-nama"><span class="glyphicon glyphicon-user"></span> O nama</a></li>
                              <li class="@yield('o-rasi')"><a href="/administracija/sadrzaj/o-rasi"><i class="icon-guidedog"></i> O rasi</a></li>
                              <li class="@yield('o-psu')"><a href="/administracija/sadrzaj/o-psu"><i class="icon-guidedog"></i> O psu</a></li>
                              <li class="@yield('kontakt')"><a href="/administracija/sadrzaj/kontakt"><span class="glyphicon glyphicon-earphone"></span> Kontakt</a></li>
                          </ul>
                      </li>
                      <li class="@yield('galerija')"><a href="/administracija/galerije"><span class="glyphicon glyphicon-picture"></span> Galerije</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-stats"></span> Analitika</a></li>
                      <li><a href="/logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                  </ul>
                @endif
            </div>
          </div>
        </nav>
        
        <div class="container">
            @yield('content')
        </div>
        @yield('body')
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/funkcije.js') }}"></script>
    </body>
</html>
