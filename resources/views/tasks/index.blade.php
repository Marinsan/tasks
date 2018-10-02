@extends('partials.header')

@section('head-title')
    Tasques
@endsection
@section('content')
    <v-card>
        <v-toolbar color="cyan" dark>
            <v-toolbar-side-icon></v-toolbar-side-icon>

            <v-toolbar-title>Tasques</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>search</v-icon>
            </v-btn>
        </v-toolbar>

        <v-list two-line>
            <v-subheader>
                Tasques
            </v-subheader>

            <v-divider></v-divider>

            <?php foreach ($tasks as $task) : ?>

            <v-list-tile>

                <v-list-tile-avatar>
                    <img src="https://placeimg.com/100/100/any">
                </v-list-tile-avatar>

                <v-list-tile-content>
                    <v-list-tile-title>
                        <?= $task->name; ?> <v-btn color="success">Completar</v-btn><v-btn color="info" onclick="window.location='{{ route('tasks.edit', $task) }}'">Modificar</v-btn>
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button>Eliminar</button>
                            </form>
                    </v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
            <?php endforeach;?>

            <v-divider></v-divider>
            <v-list-tile>
                <form action="/tasks" method="POST">
                    @csrf
                    <input name="name" type="text" placeholder="Nova tasca">
                    <button>Afegir</button>
                </form>
            </v-list-tile>
        </v-list>
    </v-card>
@endsection