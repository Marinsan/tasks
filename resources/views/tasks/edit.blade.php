@extends('partials.header')

@section('head-title')
    Modificar Tasques
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
                Modifica la tasca
            </v-subheader>

            <v-divider></v-divider>



            <v-list-tile>

                <v-list-tile-avatar>
                    <img src="https://placeimg.com/100/100/any">
                </v-list-tile-avatar>

                <v-list-tile-content>
                    <v-list-tile-title>
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
                           &nbsp;<input type="submit">
                        </form>
                    </v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
            <v-divider></v-divider>
        </v-list>
    </v-card>
@endsection()