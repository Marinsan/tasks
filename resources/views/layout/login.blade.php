<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="https://batdongsanngach.com/wp-content/uploads/2018/01/checklist-icon-350-28.png"/>
    <link rel="manifest" href="/manifest.json">
    <!-- Android -->
    <meta name="theme-color" content="#2BB0ED">
    <!-- IOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blue">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da5858">


    <!-- Fonts de google -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <meta name="apple-mobile-web-app-status-bar-style" content="blue">
    <!-- Carta compartida -->
    <meta property="og:image" content="/img/rsz_og-image.jpg">
    <meta property="og:image:width" content="1190">
    <meta property="og:image:height" content="623">
    <meta property="og:description" content="Aplicaci&oacute; de tasques feta per l'alumne de DAM en el curs 2018-2019.">
    <meta property="og:title" content="Tasques - Cristian Marin Tejeda">
    <meta property="og:url" content="https://tasks.marinsan.scool.cat">
    <meta property="og:type" content="website">
    <!-- Twitter -->
    <meta name="twitter:card" content="app">
    <meta name="twitter:site" content="@mariinsan">
    <meta name="twitter:app:name:iphone" content="Tasks Cristian Marin">
    <meta name="twitter:app:id:iphone" content="">
    <meta name="twitter:app:name:ipad" content="Tasks Cristian Marin">
    <meta name="twitter:app:id:ipad" content="">
    <meta name="twitter:app:name:googleplay" content="Tasks Cristian Marin">
    <meta name="twitter:app:id:googleplay" content="">
    <meta name="twitter:app:country" content="ES">
    <style>
        [v-cloak] {display: none}
    </style>
    <title>@yield('title')</title>
</head>
<body>
<v-app id="app" v-cloak>

        @yield('content')

</v-app>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>