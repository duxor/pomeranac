<!DOCTYPE html>
<html lang="sr" class="no-skrollr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>@yield('title')</title>
    <link href="{{ URL::asset('css/templejt.css') }}" rel="stylesheet" >
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/parallax.css') }}" rel="stylesheet">
    <style>@yield('style')</style>
</head>

<body>

<div class="container">
    @yield('content')
</div>

@yield('body')
<script type="text/javascript" src="{{ URL::asset('js/skrollr.min.js') }}"></script>
<script type="text/javascript">
    skrollr.init({
        smoothScrolling: false,
        mobileDeceleration: 0.004
    });
</script>
<script src="{{ URL::asset('js/jquery-3.0.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>