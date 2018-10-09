@extends('layout.header')

@section('head-title')
    Persones
@endsection
@section('content')
    <template>
    <v-container fluid class="pa-0">
        <v-layout row wrap align-center>
            <v-flex xs12 sm6>
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
                        <v-flex xs12 sm6>
                        <?= $task->name; ?> <button type="submit" >Completar</button>&nbsp;&nbsp;<button onclick="window.location='{{ route('tasks.edit', $task) }}'" name="edit">Modificar</button>

                        <form action="/tasks/{{ $task->id }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button>Eliminar</button>
                        </form>
                        </v-flex>
                    </v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
            <?php endforeach;?>

            <v-divider></v-divider>
            <v-list-tile>
                <form action="/tasks" method="POST">
                    @csrf
                    <input name="name" type="text" placeholder="Nova tasca" required>&nbsp;<button>Afegir</button>
                </form>
            </v-list-tile>

    </v-card>
            </v-flex>
        </v-layout>
    </v-container>
        <div class="text-xs-center">
            <v-btn outline color="indigo">Outline Button</v-btn>
            <v-btn outline fab color="teal">
                <v-icon>list</v-icon>
            </v-btn>
            <v-btn outline large fab color="indigo">
                <v-icon>edit</v-icon>
            </v-btn>
        </div>
        </v-list>
    </template>
@endsection