<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>Teste Listra</title>
    <link href="//fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="//pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body><div id="app"></div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body></html>