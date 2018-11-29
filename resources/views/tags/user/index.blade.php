@extends('layout.header')

@section('head-title')
    User Tags
@endsection

@section('content')
    <tags :tags="{{ $tags }}" :users="{{ $users }}"></tags>
@endsection
