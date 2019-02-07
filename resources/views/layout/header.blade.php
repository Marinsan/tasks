<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="{{ logged_user() }}">
    <meta name="git" content="{{ git() }}">
    <!-- Android -->
    <meta name="theme-color" content="#2BB0ED">
    <!-- IOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blue">
    <link rel="manifest" href="/manifest.json">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <title>@yield('title','Tasques')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts de google -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Carta compartida -->
    <meta property="og:image" content="https://tasks.marinsan.scool.cat/img/og-image.jpg">
    <meta property="og:image:width" content="1190">
    <meta property="og:image:height" content="623">
    <meta property="og:description" content="Aplicaci&oacute; de tasques feta per l'alumne de DAM en el curs 2018-2019.">
    <meta property="og:title" content="Tasques - Cristian Marin Tejeda">
    <meta property="og:url" content="https://tasks.marinsan.scool.cat">
    <meta property="og:type" content="website">
    <style>
        [v-cloak] {display: none}
    </style>
</head>
<body>
<v-app id="app" v-cloak>

    <snackbar></snackbar>

    <service-worker></service-worker>

    <navigation-menu v-model="drawer"></navigation-menu>

    {{--TODO--}}
    {{--<navigation-profile :users="{{ $users }}" v-model="drawer"></navigation-profile>--}}
    {{--<!--<toolbar :users="{{ $users }}" v-model="toolbar"></toolbar>-->--}}


    <v-navigation-drawer
            style="background: url(../img/snackbar.jpg)"
            v-model="drawerRight"
            fixed
            right
            clipped
            app
    >
        <v-card>
            <v-card-title class="primary white--text"><h4>Perfil</h4> <v-spacer></v-spacer><v-btn dark icon flat href="/profile">
                    <v-icon>edit</v-icon>
                </v-btn></v-card-title>
            <v-img class="text-xs-center"
                   src="img/background_user.jpeg"
                   aspect-ratio="2.75"
            ><p></p>
                <v-avatar>
                    <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" alt="avatar" style="border-style:solid;border-width:3px;border-color: white;">
                </v-avatar><p></p>
                <h3 class="white--text">{{ Auth::user()->name }}</h3>
                <p></p>
            </v-img>
            <v-layout row wrap
                      style="background: url(../img/snackbar.jpg)"
            >
                <v-card-text class="text-xs-center"
                >
                    <v-flex xs12
                    >
                        <h3>Correu</h3>
                        <p>{{ Auth::user()->email }}</p>
                        <p></p>
                        <h3>Administrador</h3>
                        @if(Auth::user()->admin == 1)
                            <p>Si</p>
                        @else
                            <p>No</p>
                        @endif
                        <p></p>
                        <h3>Rols</h3>
                        <p> {{ implode(', ',Auth::user()->map()['roles']) }}</p>
                        <p></p>
                        <h3>Permisos</h3>
                        <p> {{ implode(', ',Auth::user()->map()['permissions']) }}</p>
                        <h3>Colors Tema</h3>
                        <color></color>
                    </v-flex>
                </v-card-text>
            </v-layout>
        </v-card>
        <v-card style="background: url(https://c1.staticflickr.com/9/8722/16473411604_3eb6062d07_b.jpg)">
            <v-card-title class="primary white--text"><h4>Opcions administrador</h4> <v-spacer></v-spacer>

                @impersonating
                <v-btn title="Abandonar suplantació" href="impersonate/leave" flat class="white--text" icon><v-icon  >exit_to_app</v-icon></v-btn>
                @endImpersonating
            </v-card-title>

            <v-layout row wrap>
                @impersonating
                <v-card-text class="text-xs-center">

                    <v-flex xs12>
                        <v-avatar title="{{ Auth::user()->impersonatedBy()->name }} ( {{ Auth::user()->email }} )">
                            <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->impersonatedBy()->email) }}" alt="avatar">
                        </v-avatar>
                    </v-flex>
                    @endImpersonating
                    <v-flex xs12>

                        @canImpersonate
                        <impersonate label="Entrar com..." url="/api/v1/regular_users"></impersonate>
                        @endCanImpersonate
                        @impersonating
                        <p></p>
                        {{ Auth::user()->impersonatedBy()->name }} està suplantant a {{ Auth::user()->name }}
                        @endImpersonating

                    </v-flex>

                </v-card-text>
            </v-layout>
        </v-card>
    </v-navigation-drawer>

    <v-toolbar
            color="primary"
            dark
            app
            clipped-left
            clipped-right
            fixed>
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <v-toolbar-title>Tasks</v-toolbar-title>
        &nbsp;
        <v-tooltip bottom >
            <span class="hidden-xs-only" slot="activator" v-role="'SuperAdmin'"><git-info></git-info> </span>
            <span><strong>Github Info</strong></span>
        </v-tooltip>
        <v-spacer></v-spacer>

        <notifications-widget></notifications-widget>
        &nbsp;
        <v-tooltip bottom >
            <v-avatar slot="activator" @click.stop="drawerRight = !drawerRight">
                <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" alt="avatar">
            </v-avatar>
            <span>
                <strong>{{ Auth::user()->name }}</strong>
                <br>
                {{ Auth::user()->email }}
            </span>
        </v-tooltip>

        <v-form class="hidden-xs-only" action="logout" method="POST">
            @csrf
            <v-btn color="error" type="submit">Logout</v-btn>
        </v-form>
        <v-form class="hidden-md-only hidden-lg-only hidden-sm-only hidden-xl-only" action="logout" method="POST">
            @csrf
            <v-btn type="submit" icon><v-icon>exit_to_app</v-icon></v-btn>
        </v-form>
    </v-toolbar>



    <v-content style="background: url(/img/background.jpg);">

        @yield('content')

    </v-content>

    <v-footer
            color="primary"
            app
            height="auto"
    >
        <v-card-text class="white--text text-xs-center hidden-xs-only">
            Created by Cristian Marin, &copy;2018 — <strong>All rights reserved</strong>
        </v-card-text>
        <v-card-text class="white--text text-xs-center hidden-md-only hidden-xl-only hidden-lg-only hidden-sm-only">
            Cristian Marin - &copy;2018
        </v-card-text>
        </v-card>
    </v-footer>
</v-app>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>