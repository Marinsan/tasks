@extends('partials.header')

@section('head-title')
    Modificar Tasques
@endsection

@section('content')

<h3>Modifica la tasca:</h3>
<form action="{{ route('tasks.update', $tasks) }}" method="post">

    {{ csrf_field() }}

    {{ method_field('PUT') }}

    Name: <input name="name" type="text" value="{{$tasks->name}}"> &nbsp;
    Completed:
    @if ( $tasks->completed )
        <input name="completed" type="checkbox" checked>
    @else
        <input name="completed" type="checkbox">
    @endif
    <BR>
    <hr>
    <input type="submit">
</form>
@endsection()