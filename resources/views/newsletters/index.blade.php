@extends('layout.header')

@section('content')
    <newsletters :newsletter="{{ $newsletter }}"></newsletters>
@endsection