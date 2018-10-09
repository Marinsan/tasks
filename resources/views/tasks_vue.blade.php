@extends('layout.header')

@section('head-title')
    Tasques Vue
@endsection

@section('content')

<tasks :tasks="{{ $tasks }}"></tasks>

@endsection