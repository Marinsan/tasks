@extends('layout.header')

@section('head-title')
    Sobre Nosaltres
@endsection

@section('content')


    <template>
        <v-parallax
                dark
                src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
        >
            <v-layout
                    align-center
                    column
                    justify-center
            >
                <h1 class="display-2 font-weight-thin mb-3">Marinsan</h1>
                <h4 class="subheading">Estudiar PHP és divertit!</h4>
            </v-layout>
        </v-parallax>

        <v-rating
                v-model="rating"
                background-color="green lighten-3"
                color="green"
                large
        ></v-rating>

        <v-expansion-panel>
            <v-expansion-panel-content
                    v-for="(item,i)"
                    :key="i"
                    expand-icon="mdi-menu-down"
            >
                <div slot="header">About</div>
                <v-card>
                    <v-card-text class="grey lighten-3">Grup d'alumnes de l'institut de l'ebre cursant 2n de DAM. Any 2018-2019.</v-card-text>
                </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>

    </template>


@endsection