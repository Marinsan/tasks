@extends('layout.login')

@section('title')
    Recuperar contrasenya
@endsection

@section('content')
<v-layout style="background: url(/img/background.jpg);" align-center>
    @if (session('status'))
        <v-snackbar :value="true">
            {{ session('status') }}

        </v-snackbar>
    @endif
    <v-flex xs12 sm4 offset-sm4 class="mt-5">
        <v-card class="elevation-12">
            <v-toolbar dark color="primary">
                <v-toolbar-title>
                    Recuperar la contrasenya
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip left>
                    <v-btn slot="activator" href="/" icon flat ><v-icon>exit_to_app</v-icon></v-btn>
                    <span>Home</span>
                </v-tooltip>
            </v-toolbar>

            <v-form method="POST" action="{{ route('password.email') }}">
                <v-card-text>
                    @csrf
                    <v-text-field
                            prepend-icon="person"
                            label="Correu electronic"
                            name="email"
                            type="email"
                    ></v-text-field>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn href="/login" flat dark color="primary" type="submit">
                            Cancel·lar
                        </v-btn>
                        <v-btn flat dark color="primary" type="submit">
                            Enviar &nbsp<v-icon>send</v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-card-text>
            </v-form>
        </v-card>
    </v-flex>
</v-layout>

@endsection