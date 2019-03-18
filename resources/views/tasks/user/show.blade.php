@extends('layout.header')

@section('head-title')
    Show Task
@endsection

@section('content')

    <show-task :task="{{ json_encode($task) }}" :users="{{ $users }}" :tags="{{ $tags }}"></show-task>

@endsection
