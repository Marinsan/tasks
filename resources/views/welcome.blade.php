@extends('layout.landing')

@section('title')
   Tasks
@endsection

@section('content')

    <v-app light>
        <snackbar></snackbar>
        <share-fab></share-fab>

        <v-toolbar class="white">
            <v-toolbar-title class="hidden-xs-only"> Cristian Marin Tejeda</v-toolbar-title>
            <v-toolbar-title class="hidden-sm-only hidden-lg-only hidden-xl-only hidden-md-only"> Cristian</v-toolbar-title>
            <v-spacer></v-spacer>
            @if (Route::has('login'))
                
                    @auth
                        <v-btn flat href="{{ url('/home') }}">Home</v-btn>
                    @else
                        <v-btn flat href="{{ route('login') }}">Login</v-btn>
                        <v-btn flat href="{{ route('register') }}">Register</v-btn>
                    @endauth

            @endif
        </v-toolbar>
        <v-content>
            <section>
                <v-parallax src="img/background_parallax.jpg" height="600">
                    <v-layout
                            column
                            align-center
                            justify-center
                            class="white--text"
                    >
                        <img src="img/logo.svg" height="180">
                        <p></p>
                        <h1 class="mb-2 display-1 text-xs-center font-weight-black" id="fgoogle" style="text-shadow: black 0.1em 0.1em 0.1em">Aplicació Tasques</h1>
                        <div class="subheading mb-3 text-xs-center font-weight-bold" id="fgoogle" style="text-shadow: black 0.1em 0.1em 0.1em">Powered by Marinsan</div>
                        <div>
                        <v-btn
                                class="primary lighten-2 mt-5"
                                dark
                                large
                                href="/home"
                        >
                            Get Started
                        </v-btn>
                        <v-btn depressed
                        class="dark mt-5"
                        target="_blank"
                        large
                        href="https://github.com/Marinsan/tasks"
                        ><img src="img/github.png" alt="Github" height="25" class="mr-3">
                        Github
                        </v-btn>
                        </div>
                    </v-layout>
                </v-parallax>
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
                            <h2 class="headline font-weight-medium" id="fgoogle">Una de les millors aplicacions de tasques!</h2>
                            <span class="subheading" id="fgoogle">
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
                                            <v-icon x-large class="blue--text text--lighten-2">color_lens</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center" id="fgoogle">Material Design</div>
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
                                            <v-icon x-large class="blue--text text--lighten-2">flash_on</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline" id="fgoogle">Optimitzada</div>
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
                                            <v-icon x-large class="blue--text text--lighten-2">devices_other</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center" id="fgoogle">Multiplataforma</div>
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
                <v-parallax src="img/oficina.png" height="380">
                    <v-layout column align-center justify-center>
                        <div class="headline white--text mb-3 text-xs-center" id="fgoogle">Aportant cada dia un granet de sorra</div>
                        <em id="fgoogle">Per al final contemplar la muntanya</em>
                        <v-btn
                                class="primary mt-5"
                                dark
                                large
                                href="/home"
                        >
                            Get Started
                        </v-btn>
                    </v-layout>
                </v-parallax>
            </section>

            <section>
                <v-container grid-list-xl>
                    <v-layout row wrap justify-center class="my-5">
                        <v-flex xs12 sm4>
                            <v-card class="elevation-0 transparent">
                                <v-card-title primary-title class="layout justify-center">
                                    <div class="headline" id="fgoogle">Informació</div>
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
                                    <div class="headline" id="fgoogle">Contacte</div>
                                </v-card-title>
                                <v-card-text>
                                    Si tens qualsevol dubte sobre l'aplicació, contacta amb mi, ja sigui per telèfon o correu!
                                </v-card-text>
                                <v-list class="transparent">
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text text--lighten-2">phone</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title>777-867-5309</v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text text--lighten-2">place</v-icon>
                                        </v-list-tile-action>
                                        <v-list-tile-content>
                                            <v-list-tile-title onclick="window.location.href='https://www.google.com/maps/place/@40.8146461,0.5142454,18z/data=!4m5!3m4!1s0x12a0e4bd4079a9d1:0x253c0ed9489c50f8!8m2!3d40.8147618!4d0.5152698'">
                                                Tortosa, ES
                                            </v-list-tile-title>
                                        </v-list-tile-content>
                                    </v-list-tile>
                                    <v-list-tile>
                                        <v-list-tile-action>
                                            <v-icon class="blue--text text--lighten-2">email</v-icon>
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



                <v-footer
                        height="auto"
                >
                    <v-flex>
                    <v-card
                            flat
                            tile
                            class="primary white--text text-xs-center"
                    >

                        <v-container grid-list-md text-xs-center>
                            <v-layout row wrap>
                                <v-flex>
                                    <v-card-title class="justify-center headline" id="fgoogle">Vols rebre noticies sobre la nostra aplicació? Subscriute!</v-card-title>

                                    <v-layout class="justify-center">

                                            <v-text-field
                                                    class="rounded"
                                                    label="Introdueix el teu correu electronic"
                                                    solo-inverted
                                                    xs12
                                                    md12
                                                    xl12
                                            ></v-text-field>

                                            <v-flex xs12 md6>
                                            <v-btn dark color="accent">Subscriute 😍 </v-btn>
                                            </v-flex>

                                    </v-layout>
                                </v-flex>



                                <v-flex xs12 sm4>
                                    <h2 class="font-weight-medium" id="fgoogle">Marinsan</h2>
                                    <p class="text-xs-left">Nou de cada deu dentistes recomanen Tasks by Marinsan sobre altres
                                        aplicacions de la competència. Registrat i comprova-ho per tu mateix!</p>
                                   <div class="text-xs-left">
                                    <a href="https://www.facebook.com">
                                        <img border="0" alt="facebook" src="/img/facebook.svg" style="white" width="30" height="30">
                                    </a>
                                    &nbsp;
                                    <a href="https://www.instagram.com">
                                        <img border="0" alt="instagram" src="/img/instagram.svg" style="white" width="30" height="30">
                                    </a>
                                    &nbsp;
                                    <a href="https://www.twitter.com">
                                        <img border="0" alt="twitter" src="/img/twitter.svg" style="white" width="30" height="30">
                                    </a>
                                    &nbsp;
                                    <a href="https://www.github.com">
                                        <img border="0" alt="github" src="/img/github.svg" style="white" width="30" height="30">
                                    </a>
                                   </div>
                                </v-flex>
                                <v-flex xs12 sm2.5>

                                    <ul style="list-style:none">
                                        <h2>Apren</h2>
                                        <li>
                                            <a href="/browse" class="white--text">Captures</a>
                                        </li>
                                        <li>
                                            <a href="/registre" class="white--text tw-text-transparent-50 hover:tw-text-white">Registre</a>
                                        </li>
                                        <li>
                                            <a href="/login" class="white--text">Login</a>
                                        </li>
                                    </ul>
                                </v-flex>
                                <v-flex xs12 sm2.5>
                                    <h2>Extras</h2>
                                    <a href="/privacy" class="white--text">Privacy</a>
                                    <a href="/terms" class="white--text">Terms</a>
                                </v-flex>
                                <v-flex xs12 sm2.5>
                                    <h2>Extras</h2>
                                    <a href="/privacy" class="white--text">Privacy</a>
                                    <a href="/terms" class="white--text">Terms</a>
                                </v-flex>

                            </v-layout>

                        </v-container>

                        <v-divider></v-divider>

                        <v-card-text class="white--text">
                            <p>&copy; Marinsan 2019. All rights reserved.</p>
                            Designed with heart by Marisnan. Proudly hosted with <a class="white--text" href="https://forge.laravel.com/">Laravel Forge</a> and <a href="https://www.digitalocean.com/" class="white--text">DigitalOcean</a>.
                        </v-card-text>
                    </v-card>
                    </v-flex>
                </v-footer>

        <footer id="myFooter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h2 class="logo"><a href="#"> LOGO </a></h2>
                    </div>
                    <div class="col-sm-2">
                        <h5>Get started</h5>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Sign up</a></li>
                            <li><a href="#">Downloads</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <h5>About us</h5>
                        <ul>
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <h5>Support</h5>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Help desk</a></li>
                            <li><a href="#">Forums</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <div class="social-networks">
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                        </div>
                        <button type="button" class="btn btn-default">Contact us</button>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <p>&copy; Marinsan 2019. All rights reserved.Designed with heart by Marisnan. Proudly hosted with <a class="white--text" href="https://forge.laravel.com/">Laravel Forge</a> and <a href="https://www.digitalocean.com/" class="white--text">DigitalOcean</a></p>
            </div>
        </footer>

        </v-content>
    </v-app>
@endsection