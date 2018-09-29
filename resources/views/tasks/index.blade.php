@extends('partials.header')

@section('head-title')
    Tasques
@endsection
@section('content')
    <h1>Tasques</h1>
    <ul>
    @foreach ($tasks as $task)
        <li>{{ $task->name }} <button type="submit" >Completar</button><button onclick="window.location='{{ route('tasks.edit', $task) }}'" name="edit">Modificar</button>
            <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <button>Eliminar</button>
            </form>
        </li>
    @endforeach
    </ul>
    <form action="/tasks" method="POST">
        @csrf
        <input name="name" type="text" placeholder="Nova tasca">
        <button>Afegir</button>
    </form>
@endsection
