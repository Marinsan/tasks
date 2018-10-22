@extends('layout.header')

@section('head-title')
    Tasques
@endsection
@section('content')
    <v-card>
        <v-toolbar color="cyan" dark>
            <v-toolbar-title>Tasques</v-toolbar-title>

            <v-spacer></v-spacer>
        </v-toolbar>

        <v-list >
            <v-divider></v-divider>
            <div class="text-xs-center">
                <v-list-tile>
                    <form action="/tasks" method="POST">
                        @csrf
                        <input name="name" type="text" placeholder="Nova tasca">
                        <v-btn round color="primary" type="submit" dark>Afegir</v-btn>
                    </form>
                </v-list-tile>
            </div>

            <v-divider></v-divider>

            <?php foreach ($tasks as $task) : ?>

            <v-list-tile>

                <v-list-tile-avatar>
                    <img src="https://placeimg.com/100/100/any">
                </v-list-tile-avatar>
                @if($task->completed)
                    <span STYLE="text-decoration: line-through"><?= $task->name; ?></span>
                    <form action="/tasksuncompleted/{{$task->id}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" value="{{ $task->id  }}">
                        <v-btn color="success" type="submit">Descompletar</v-btn>
                    </form>
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <v-btn color="error" type="submit">Eliminar</v-btn>
                            </form>
                @else
                    <?= $task->name; ?>
                        <form action="/taskscompleted/{{$task->id}}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="{{ $task->id  }}">
                                <v-btn color="success" type="submit">Completar</v-btn>
                        </form>
                    <v-btn color="info" onclick="window.location='{{ route('tasks.edit', $task) }}'">Modificar</v-btn>
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <v-btn color="error" type="submit">Eliminar</v-btn>
                    </form>
                @endif
            </v-list-tile>
            <?php endforeach;?>
        </v-list>
    </v-card>
@endsection