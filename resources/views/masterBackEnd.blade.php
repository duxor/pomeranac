<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>@yield('title')</title>
        <link href="{{ URL::asset('css/templejt.css') }}" rel="stylesheet" >
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/parallax.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/dropzone.css') }}" rel="stylesheet">
        <style>
        body {
          padding-top: 60px;
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
              <a class="navbar-brand" href="/administracija/">Pomeranac</a>
              <?php
              $active = array("","","","","","","");
              switch ($_SERVER["REQUEST_URI"])
              {
               case '/administracija/sadrzaj/o-nama' : $active[0] = "active"; break;
               case '/administracija/sadrzaj/o-rasi' : $active[1] = "active"; break;
               case '/administracija/sadrzaj/o-psu' : $active[2] = "active"; break;
               case '/administracija/galerija-fotografija' : $active[3] = "active"; break;
               case '/administracija/kontakt' : $active[4] = "active"; break;
               case '/administracija/analitika' : $active[5] = "active"; break;
              }
              ?>
            </div><?php use App\Security; $sec = new Security(); if($sec->autentifikacijaTest()) echo'
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class = "' . $active[0] . '"><a href="/administracija/sadrzaj/o-nama">O nama</a></li>
                <li class = "' . $active[1] . '"><a href="/administracija/sadrzaj/o-rasi">O rasi</a></li>
                <li class = "' . $active[2] . '"><a href="/administracija/sadrzaj/o-psu">O psu</a></li>
                <li class = "' . $active[3] . '"><a href="/administracija/galerija-fotografija">Galerija</a></li>
                <li class = "' . $active[4] . '"><a href="/administracija/kontakt">Kontakt</a></li>
                <li class = "' . $active[5] . '"><a href="/administracija/analitika">Analitika</a></li>
              </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/administracija/logout">Logout</a></li>
                </ul>
            </div> '; ?>
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
        <script src="{{ URL::asset('js/dropzone.js') }}"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <!-- JavaScript fje -->
            @yield('javascript')
    </body>
</html>
