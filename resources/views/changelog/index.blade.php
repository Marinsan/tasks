@extends('layout.header')

@section('content')
    <changelog :logs="{{ $logs }}" :users="{{ $users }}"></changelog>
@endsection
