@extends('layout.header')

@section('content')
    <chat :channels="{{ $channels }}" :user="{{ $user }}"></chat>
@endsection
