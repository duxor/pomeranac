<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="stilovi/templejt.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container">
    @yield('body')
</div>

<script src="js/jquery-1.4.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>