@extends('layout.header')

@section('content')
    <users-list :users="{{ $users }}"></users-list>
@endsection