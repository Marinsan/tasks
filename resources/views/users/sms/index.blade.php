@extends('layout.header')

@section('content')
    <v-container grid-list-md text-xs-center>
        <v-layout row wrap>
            <v-flex xs6 offset-xs3>
                <v-card>
                    <v-card-text class="px-0">
                        <verify-mobile-form></verify-mobile-form>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>

@endsection
