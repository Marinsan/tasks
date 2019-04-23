@extends('layout.chat')

@section('content')
    <chat :channels="{{ $channels }}"></chat>
@endsection
