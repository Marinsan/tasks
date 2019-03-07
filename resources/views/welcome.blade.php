@extends('layout.landing')

@section('title')
   Tasks
@endsection

@section('content')

    <v-app light>

        <snackbar></snackbar>
        <share-fab></share-fab>
        <service-worker></service-worker>

        <v-toolbar class="white">
            <v-toolbar-title v-if="$vuetify.breakpoint.mdAndUp"> Cristian Marin Tejeda</v-toolbar-title>
            <v-toolbar-title v-if="$vuetify.breakpoint.mdAndDown"> Cristian</v-toolbar-title>
            <v-spacer></v-spacer>
            @if (Route::has('login'))
                
                    @auth
                        <v-btn flat href="{{ url('/home') }}">Home</v-btn>
                    @else
                        <v-btn v-if="$vuetify.breakpoint.mdAndUp" flat href="{{ route('login') }}">Login</v-btn>
                        <v-btn flat href="{{ route('register') }}">Register</v-btn>
                    @endauth

            @endif
        </v-toolbar>
        <v-content>
            <section>
                <v-parallax-webp src="img/background_parallax.webp" height="600" alt="Tasques Marinsan 2018-2019" alt-format="jpg">
                    <v-layout
                            column

                            justify-center
                            class="white--text text-xs-center"
                    >
                        <img src="img/logo.svg" height="180" alt="Tasques Marinsan">
                        <p></p>
                        <h1 class="mb-2 display-1 text-xs-center font-weight-black" id="fgoogle" style="text-shadow: black 0.1em 0.1em 0.1em">Aplicació Tasques</h1>
                        <div class="subheading mb-3 text-xs-center font-weight-bold" style="text-shadow: black 0.1em 0.1em 0.1em">Powered by Marinsan</div>
                        <div>
                        <v-btn
                                class="primary mt-5"
                                dark
                                large
                                href="/home"


                        >
                            Get Started
                        </v-btn>
                        <v-btn depressed
                        class="dark mt-5"
                        target="_blank"
                        rel="noreferrer"
                        large
                        href="https://github.com/Marinsan/tasks"
                        ><img src="img/github.png" alt="Github" height="25" class="mr-3">
                        Github
                        </v-btn>
                        </div>
                    </v-layout>
                </v-parallax-webp>
            </section>

            <section>
                <v-layout
                        column
                        wrap
                        class="my-5"
                        align-center
                >
                    <v-flex xs12 sm4 class="my-3">
                        <div class="text-xs-center">
                            <h2 class="headline font-weight-medium">Una de les millors aplicacions de tasques!</h2>
                            <span class="subheading">
                Per no tirar-me floretes i dir que és la millor...
              </span>
                        </div>
                    </v-flex>
                    <v-flex xs12>
                        <v-container grid-list-xl>
                            <v-layout row wrap align-center>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="blue--text" color="primary">color_lens</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center">Material Design</div>
                                        </v-card-title>
                                        <v-card-text>
                                            Gràcies al fet que l'aplicació esta feta amb material desing gaudiràs d'una experiència única!
                                            Menús molt intuïtius, en pocs segons et pots fer amb el control de tot! És molt facil d'utilitzar!
                                            A què esperes a registrar-te?
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="blue--text" color="primary">flash_on</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline">Optimitzada</div>
                                        </v-card-title>
                                        <v-card-text>
                                            Aquesta aplicació està mimada fins al punt en el qual en qualsevol dispositiu notaràs la seva fluïdesa!
                                            Està optimitzada per millorar el seu rendiment i així no fer esperar als nostres usuaris!
                                            Crea tasques a la velocitat de la llum!
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="blue--text" color="primary">devices_other</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center" >Multiplataforma</div>
                                        </v-card-title>
                                        <v-card-text>
                                            Gaudeix de crear tasques en qualsevol dispositiu, ja que aquesta aplicació és multiplataforma!
                                            Crear la llista de la compra a casa tranquil·lament a casa en l'ordinador i segueix-la en el teu mòbil
                                            un cop estiguis al super! No teu pensis més, registrat ja!
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </section>

            <section>
                <v-parallax-webp src="img/oficina.webp" height="380" alt="Tasques Marinsan 2018-2019" alt-format="jpg">
                    <v-layout column align-center justify-center>
                        <div class="headline white--text mb-3 text-xs-center" style="text-shadow: black 0.1em 0.1em 0.1em">Aportant cada dia un granet de sorra</div>
                        <em style="text-shadow: black 0.1em 0.1em 0.1em">Per al final contemplar la muntanya</em>
                        <v-btn
                                class="primary mt-5"
                                dark
                                large
                                href="/home"
                        >
                            Get Started
                        </v-btn>
                    </v-layout>
                </v-parallax-webp>
            </section>
            <section>
                <v-container grid-list-xl>
                    <v-layout row wrap justify-center class="my-5">
                        <v-flex xs12 sm4>
                            <v-card class="elevation-0 transparent">
                                <v-card-title primary-title class="layout justify-center">
                                    <div class="headline" >Informació</div>
                                </v-card-title>
                                <v-card-text>
                                    Aquest és un projecte de tasques fet per l'alumne Cristian Marin Tejeda, per al curs de grau
                                    superior DAM 2018-2019 de l'IES de l'Ebre a Tortosa. Està compost per Laravel i Vuetify (i també amb molta il·lusió).
                                </v-card-text>
                            </v-card>
                        </v-flex>
                        <v-flex xs12 sm4 offset-sm1>
                            <v-card class="elevation-0 transparent">
                                <v-card-title primary-title class="layout justify-center">
                                    <div class="headline" >Contacte</div>
                                </v-card-title>
                                <v-card-text>
                                    Si tens qualsevol dubte sobre l'aplicació, contacta amb mi, ja sigui per telèfon o correu!
                                </v-card-text>
                                <v-list class="transparent">
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text" color="primary">phone</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>+34 667797835</v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text" color="primary">place</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title onclick="window.location.href='https://www.google.com/maps/place/@40.8146461,0.5142454,18z/data=!4m5!3m4!1s0x12a0e4bd4079a9d1:0x253c0ed9489c50f8!8m2!3d40.8147618!4d0.5152698'">
                                                Tortosa, ES
                                            </v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text" color="primary">email</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>cristianmarin@iesebre.com</v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>

            </section>

            <section>
                <v-parallax-webp src="/images/background.webp" height="600" alt-format="jpeg">
                    <v-layout column align-center justify-center>
                        <newsletter-subscription-card></newsletter-subscription-card>
                    </v-layout>
                </v-parallax-webp>
            </section>

            <section>
                <v-container grid-list-xl>
                    <v-layout row wrap justify-center class="my-5">
                        <v-flex xs12 sm4>
                            <v-card class="elevation-0 transparent">
                                <v-card-title primary-title class="layout justify-center">
                                    <div class="headline" >Informació</div>
                                </v-card-title>
                                <v-card-text>
                                    Aquest és un projecte de tasques fet per l'alumne Cristian Marin Tejeda, per al curs de grau
                                    superior DAM 2018-2019 de l'IES de l'Ebre a Tortosa. Està compost per Laravel i Vuetify (i també amb molta il·lusió).
                                </v-card-text>
                            </v-card>
                        </v-flex>
                        <v-flex xs12 sm4 offset-sm1>
                            <v-card class="elevation-0 transparent">
                                <v-card-title primary-title class="layout justify-center">
                                    <div class="headline" >Contacte</div>
                                </v-card-title>
                                <v-card-text>
                                    Si tens qualsevol dubte sobre l'aplicació, contacta amb mi, ja sigui per telèfon o correu!
                                </v-card-text>
                                <v-list class="transparent">
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text" color="primary">phone</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>+34 667797835</v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text" color="primary">place</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title onclick="window.location.href='https://www.google.com/maps/place/@40.8146461,0.5142454,18z/data=!4m5!3m4!1s0x12a0e4bd4079a9d1:0x253c0ed9489c50f8!8m2!3d40.8147618!4d0.5152698'">
                                                Tortosa, ES
                                            </v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text" color="primary">email</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>cristianmarin@iesebre.com</v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                </v-list>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>

            </section>
        </v-content>





        <footer class="footer-distributed">
            <div class="footer-right">

                <a rel="noreferrer" href="https://www.facebook.com/mariin6">
                    <img border="0" alt="facebook" src="/img/facebook.svg" style="white" width="30" height="30">
                </a>

                <a rel="noreferrer" href="https://www.instagram.com/marinsan6">
                    <img border="0" alt="instagram" src="/img/instagram.svg" style="white" width="30" height="30">
                </a>

                <a rel="noreferrer" href="https://www.twitter.com/mariinsan">
                    <img border="0" alt="twitter" src="/img/twitter.svg" style="white" width="30" height="30">
                </a>

                <a rel="noreferrer" href="https://www.github.com/marinsan/tasks">
                    <img border="0" alt="github" src="/img/github.svg" style="white" width="30" height="30">
                </a>

            </div>

            <div class="footer-left">
                <p class="footer-links">
                    <a href="/home">Home</a>
                    ·
                    <a href="/privacy">Privacy</a>
                    ·
                    <a href="/terms">Terms</a>
                    ·
                    <a href="/faq">Faq</a>
                    ·
                    <a href="/info">Catch</a>
                </p>
                <p class="black--text">&copy; Marinsan 2019. All rights reserved. Proudly hosted with <a class="white--text" href="https://forge.laravel.com/">Laravel Forge</a> and <a href="https://www.digitalocean.com/" class="white--text">DigitalOcean</a></p>

            </div>

        </footer>

        </v-content>
    </v-app>
@endsection