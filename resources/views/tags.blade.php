@extends('layout.header')

@section('head-title')
    Tags
@endsection

@section('content')
    <v-container fluid>
        <v-layout>
            <v-flex>
                <tags :tags="{{ $tags }}" ></tags>
            </v-flex>
        </v-layout>
    </v-container>

@endsection