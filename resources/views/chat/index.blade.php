@extends('layout.header')

@section('content')
    <chat :channels="{{ $channels }}"></chat>
@endsection
