<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>@yield('title')</title>
        <link href="{{ URL::asset('css/templejt.css') }}" rel="stylesheet" >
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/parallax.css') }}" rel="stylesheet">
        <style>
        body {
          padding-top: 60px;
        }
        @media (max-width: 979px) {
          body {
            padding-top: 0px;
          }
        }
        </style>
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
              <a class="navbar-brand" href="./">Pomeranac</a>
            </div><?php use App\Security; $sec = new Security(); if(!$sec->autentifikacijaTest())echo'<!--' ?>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="/administracija/sadrzaj/o-nama">O nama</a></li>
                <li><a href="/administracija/sadrzaj/o-rasi">O rasi</a></li>
                <li><a href="/administracija/sadrzaj/o-psu">O psu</a></li>
                <li><a href="/administracija/galerija-fotografija">Galerija</a></li>
                <li><a href="/administracija/#">Kontakt</a></li>
                <li><a href="/administracija/#contact">Analitika</a></li>
              </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/administracija/logout">Logout</a></li>
                </ul>
            </div><?php if(!$sec->autentifikacijaTest()) echo'-->';?>
          </div>
        </nav>
        
        <div class="container">
            <!-- sadrzaj -->
            @yield('content')
        </div>
        
        <!-- Ovde idu skriptovi -->
        <script src="{{ URL::asset('js/jquery-3.0.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/funkcije.js') }}"></script>
        <script src="{{ URL::asset('tinymce/tinymce.min.js') }}"></script>
        <!-- JavaScript fje -->
            @yield('javascript')
    </body>
</html>
