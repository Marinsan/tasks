@extends('layout.header')

@section('head-title')
    Tasques Vue
@endsection

@section('content')
    <v-container fluid>
        <v-layout>
            <v-flex>
                <tasques :tasks="{{ $tasks }}" :tags="{{ $tags }}" :users="{{ $users }}" uri="{{ $uri }}"></tasques>
            </v-flex>
        </v-layout>
    </v-container>

@endsection