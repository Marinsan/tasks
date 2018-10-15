<!doctype html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('head-title')</title>
</head>
<body>
    <v-app id="app">
        <v-navigation-drawer
                v-model="drawer"
                fixed
                app
        >
            <v-list dense>
                <v-list-tile href="/tasks_vue">
                    <v-list-tile-action>
                        <v-icon>accessibility</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Tasques Vue</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile href="/tasks">
                    <v-list-tile-action>
                        <v-icon>assignment</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Tasques</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile href="/contact">
                    <v-list-tile-action>
                        <v-icon>book</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Contacte</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list-tile href="/about">
                    <v-list-tile-action>
                        <v-icon>accessibility</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>Sobre nosaltres</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

            </v-list>
        </v-navigation-drawer>
        <v-toolbar color="indigo" dark fixed app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>Laravel</v-toolbar-title>
        </v-toolbar>
        <v-content>
            <v-container fluid fill-height>
                <v-layout
                        justify-center

                >
                    <v-flex text-xs-center>
@yield('content')

                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>

        <v-footer
                color="indigo"
                app
                height="auto"
        >
                <v-card-text class="white--text text-xs-center">
                    Created by Cristian Marin, &copy;2018 — <strong>All rights reserved</strong>
                </v-card-text>
            </v-card>
        </v-footer>
    </v-app>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
