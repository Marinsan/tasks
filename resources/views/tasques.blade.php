@extends('layout.header')

@section('head-title')
    Tasques Vue
@endsection

@section('content')
    <v-container fluid>
        <v-layout>
            <v-flex>
                <tasques :tasks="{{ $tasks }}" :users="{{ $users }}"></tasques>
            </v-flex>
        </v-layout>
    </v-container>

@endsection