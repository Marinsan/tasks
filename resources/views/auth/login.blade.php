@extends('layout.login')
@section('title')
    Login
@endsection

@section('content')

    <v-content style="background: url(/img/background.jpg);">
                <v-container fluid fill-height>
                    <v-layout align-center justify-center>
                        <v-flex xs12 sm8 md4>
                            <v-card class="elevation-12">

                                <login-form email="{{ old ('email') }}" csrf-token="{{ csrf_token() }}"></login-form>

                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
    </v-content>
@endsection