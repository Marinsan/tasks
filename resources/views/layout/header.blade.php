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
    <meta name="theme-color" content="#2F3BA2"/>
    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" type="image/png" href="https://batdongsanngach.com/wp-content/uploads/2018/01/checklist-icon-350-28.png"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <title>@yield('title','Tasks')</title>
    <style>
        [v-cloak] {display: none}
    </style>
</head>
<body>
<v-app id="app" v-cloak>

    <snackbar></snackbar>
    <v-navigation-drawer
            style="background: url(../img/snackbar.jpg)"
            v-model="drawer"
            fixed
            app
            clipped
    >
        <v-list dense>
            <template v-for="item in items">
                <v-layout
                        v-if="item.heading"
                        :key="item.heading"
                        row
                        align-center

                >
                    <v-flex xs6>
                        <v-subheader v-if="item.heading">
                            @{{ item.heading }}
                        </v-subheader>
                    </v-flex>
                    <v-flex xs6 class="text-xs-center">
                        <a href="#!" class="body-2 black--text">EDIT</a>
                    </v-flex>
                </v-layout>
                <v-list-group class="white--text"
                        v-else-if="item.children"
                        v-model="item.model"
                        :key="item.text"
                        :prepend-icon="item.model ? item.icon : item['icon-alt']"
                        append-icon=""
                >
                    <v-list-tile slot="activator" :href="item.url">
                        <v-list-tile-content>
                            <v-list-tile-title class="white--text">
                                @{{ item.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile

                            v-for="(child, i) in item.children"
                            :key="i"
                            :href="child.url"
                    >
                        <v-list-tile-action color="white" v-if="child.icon">
                            <v-icon color="white">@{{ child.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                @{{ child.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-group>
                <v-list-tile class="white--text" v-else :key="item.text" :href="item.url">
                    <v-list-tile-action>
                        <v-icon color="white">@{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            @{{ item.text }}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </template>
        </v-list>
    </v-navigation-drawer>
    <v-navigation-drawer
            style="background: url(../img/snackbar.jpg)"
            v-model="drawerRight"
            fixed
            right
            clipped
            app
    >
        <v-card>
            <v-card-title class="primary white--text"><h4>Perfil</h4></v-card-title>
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
                    <v-flex xs12>
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
        <v-spacer></v-spacer>

        <v-tooltip bottom >
        <span slot="activator" v-role="'SuperAdmin'"><git-info></git-info> </span>
            <span><strong>Github Info</strong></span>
        </v-tooltip>
        <v-spacer></v-spacer>

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

        <v-form action="logout" method="POST">
            @csrf
            <v-btn color="error" type="submit">Logout</v-btn>
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
        <v-card-text class="white--text text-xs-center">
            Created by Cristian Marin, &copy;2018 — <strong>All rights reserved</strong>
        </v-card-text>
        </v-card>
    </v-footer>
</v-app>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>