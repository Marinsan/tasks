<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="https://batdongsanngach.com/wp-content/uploads/2018/01/checklist-icon-350-28.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="/manifest.json">
    <!-- Android -->
    <meta name="theme-color" content="#2BB0ED">
    <!-- IOS -->
    <meta name="apple-mobile-web-app-status-bar-style" content="blue">
    <!-- Carta compartida -->
    <meta property="og:image" content="/img/og-image.jpg">
    <meta property="og:image:width" content="1190">
    <meta property="og:image:height" content="623">
    <meta property="og:description" content="Aplicaci&oacute; de tasques feta per l'alumne de DAM en el curs 2018-2019.">
    <meta property="og:title" content="Tasques - Cristian Marin Tejeda">
    <meta property="og:url" content="https://tasks.marinsan.scool.cat">
    <meta property="og:type" content="website">
    <title>@yield('title')</title>
    <style>
        [v-cloak] {display: none}
    </style>
</head>
<body>
<div id="app" v-cloak>
    @yield('content')
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>