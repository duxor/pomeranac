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
    {!!HTML::style('css/gmaps-picker.css')!!}
        <style>
        body {
          padding-top: 60px;
        }
        </style>
    {!!HTML::script('http://maps.googleapis.com/maps/api/js?sensor=false')!!}
    {!!HTML::script('js/gmaps-picker.js')!!}
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
              <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span> Pomeranac</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                @if(\App\Security::autentifikacijaTest(4,'min'))
                  <ul class="nav navbar-nav navbar-right">



                      <li><a class="navbar-brand" href="/administracija"><span class="glyphicon glyphicon-home"></span></a></li>

                      <li class="dropdown @yield('tekstovi')"><a href="/admin/sadrzaji" ><span class="glyphicon glyphicon-text-size"></span>ekstovi</a>
                      </li>
                      <li class="@yield('galerija')"><a href="/administracija/galerije"><span class="glyphicon glyphicon-picture"></span> Galerije</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-stats"></span> Analitika</a></li>
                      <li class="@yield('kontakt')"><a href="/administracija/kontakt"><span class="glyphicon glyphicon-earphone"></span> Kontakt</a></li>
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
