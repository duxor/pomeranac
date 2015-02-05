<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>@yield('naslov')</title>
		<!-- CSS ide ovde -->
        {{ HTML::style('css/templejt.css') }}
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/parallax.css') }}
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
              <a class="navbar-brand" href="#">Pomeranac</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">O nama</a></li>
                <li><a href="#about">O rasi</a></li>
                <li><a href="#contact">O psu</a></li>
                <li><a href="#contact">Galerija</a></li>
                <li><a href="#contact">Kontakt</a></li>
                <li><a href="#contact">Analitika</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        
        <div class="container">
            <!-- sadrzaj -->
            @yield('sadrzaj')
        </div>
        
        <!-- Ovde idu skriptovi -->
        {{ HTML::script('js/jquery-3.0.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/funkcije.js') }}
        <!-- Ovde idu dodatni skriptovi, namenski za jedan view -->
        @yield('dodatni-skript')
    
    </body>
</html>
