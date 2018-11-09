@extends('layout.header')

@section('head-title')
    User Tasks
@endsection

@section('content')
    <tasques :tasks="{{ $tasks }}"></tasques>
@endsection
