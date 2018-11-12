@extends('layout.login')
@section('title')
    Register User
@endsection
@section('content')
    <v-content>
        <v-container fluid fill-height>
            <v-layout align-center justify-center>
                <v-flex xs12 sm8 md4>
                    <v-card class="elevation-12">
                        <register-form email="{{old('email')}}" csrf-token="{{csrf_token()}}"></register-form>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </v-content>
@endsection