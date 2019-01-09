@extends('layout.header')

@section('head-title')
   Contacte
@endsection
@section('content')
    <template>
        <v-layout align-start justify-center row fill-height>
            <v-flex xs5>
                <v-card>
                    <v-img
                            src="https://cdn.vuetifyjs.com/images/lists/ali.png"
                            height="300px"
                    >
                        <v-layout
                                column
                                fill-height
                        >
                            <v-spacer></v-spacer>
                        <v-card-title class="white--text pl-5 pt-5">
                                <div class="display-1 pl-5 pt-5">Marinsan</div>
                            </v-card-title>
                        </v-layout>
                    </v-img>

                    <v-list two-line>
                        <v-list-tile @click="">
                            <v-list-tile-action>
                                <v-icon color="primary">phone</v-icon>
                            </v-list-tile-action>

                            <v-list-tile-content>
                                <v-list-tile-title>(650) 555-1234</v-list-tile-title>
                                <v-list-tile-sub-title>Mobile</v-list-tile-sub-title>
                            </v-list-tile-content>

                            <v-list-tile-action>
                                <v-icon>chat</v-icon>
                            </v-list-tile-action>
                        </v-list-tile>

                        <v-list-tile @click="">
                            <v-list-tile-action></v-list-tile-action>

                            <v-list-tile-content>
                                <v-list-tile-title>(323) 555-6789</v-list-tile-title>
                                <v-list-tile-sub-title>Work</v-list-tile-sub-title>
                            </v-list-tile-content>

                            <v-list-tile-action>
                                <v-icon>chat</v-icon>
                            </v-list-tile-action>
                        </v-list-tile>

                        <v-divider inset></v-divider>

                        <v-list-tile @click="">
                            <v-list-tile-action>
                                <v-icon color="primary">mail</v-icon>
                            </v-list-tile-action>

                            <v-list-tile-content>
                                <v-list-tile-title>marin6@outlook.com</v-list-tile-title>
                                <v-list-tile-sub-title>Personal</v-list-tile-sub-title>
                            </v-list-tile-content>
                        </v-list-tile>

                        <v-list-tile @click="">
                            <v-list-tile-action></v-list-tile-action>

                            <v-list-tile-content>
                                <v-list-tile-title>cristianmarin@iesebre.com</v-list-tile-title>
                                <v-list-tile-sub-title>Work</v-list-tile-sub-title>
                            </v-list-tile-content>
                        </v-list-tile>

                        <v-divider inset></v-divider>

                        <v-list-tile onclick="window.location.href='https://www.google.com/maps/place/@40.8146461,0.5142454,18z/data=!4m5!3m4!1s0x12a0e4bd4079a9d1:0x253c0ed9489c50f8!8m2!3d40.8147618!4d0.5152698'">
                            <v-list-tile-action>
                                <v-icon color="primary">location_on</v-icon>
                            </v-list-tile-action>

                            <v-list-tile-content>
                                <v-list-tile-title>Av. De Cristobal Nº32</v-list-tile-title>
                                <v-list-tile-sub-title>Tortosa, TGN 43500</v-list-tile-sub-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-card>
            </v-flex>
        </v-layout>
    </template>



@endsection