@extends('partials.header')

@section('head-title')
    Modificar Tasques
@endsection

@section('content')

<h3>Modifica la tasca:</h3>
<form action="{{ route('tasks.update', $tasks) }}" method="post">

    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <textarea name="name">{{ $tasks->name}}</textarea>

    <BR>
    <input type="submit">
</form>
@endsection()