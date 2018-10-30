<!doctype html>
<html lang="en">
<head>
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
                app>

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
                        <v-list-group
                                v-else-if="item.children"
                                v-model="item.model"
                                :key="item.text"
                                :prepend-icon="item.model ? item.icon : item['icon-alt']"
                                append-icon=""
                        >
                            <v-list-tile slot="activator" :href="item.url">
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        @{{ item.text }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile
                                    v-for="(child, i) in item.children"
                                    :key="i"
                                    @click=""
                                    :href="child.url"
                            >
                                <v-list-tile-action v-if="child.icon">
                                    <v-icon>@{{ child.icon }}</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        @{{ child.text }}
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list-group>
                        <v-list-tile v-else :key="item.text" @click="" :href="item.url">
                            <v-list-tile-action>
                                <v-icon>@{{ item.icon }}</v-icon>
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

        <v-toolbar color="indigo" dark fixed app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>Laravel</v-toolbar-title>

            <v-spacer></v-spacer>
            <v-avatar title="{{Auth::user()->name}}({{(Auth::user()->email)}})">
                <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" alt="avatar">
            </v-avatar>
            <v-form action="logout" method="POST">
                @csrf
                <v-btn color="primary" type="submit">Logout</v-btn>
            </v-form>



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

    <script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>