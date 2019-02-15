<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="https://batdongsanngach.com/wp-content/uploads/2018/01/checklist-icon-350-28.png"/>
    <link rel="manifest" href="/manifest.json">
    <!-- Android -->
    <meta name="theme-color" content="#2BB0ED">
    <!-- IOS -->
    <link rel="stylesheet" href="css/captures.css">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blue">
    <style>
        [v-cloak] {display: none}
    </style>
    <title>Info</title>
</head>
<body>
<v-app id="app" v-cloak>

    <template>
        <section>
            <v-toolbar class="white">
                <v-toolbar-title class="hidden-xs-only"> Cristian Marin Tejeda</v-toolbar-title>
                <v-toolbar-title class="hidden-sm-only hidden-lg-only hidden-xl-only hidden-md-only"> Cristian</v-toolbar-title>
                <v-spacer></v-spacer>
                <div class="hidden-xs-only">
                @if (Route::has('login'))

                    @auth
                        <v-btn flat href="{{ url('/home') }}">Home</v-btn>
                    @else
                        <v-btn flat href="/">Welcome</v-btn>
                        <v-btn flat href="{{ route('login') }}">Login</v-btn>
                        <v-btn flat href="{{ route('register') }}">Register</v-btn>
                    @endauth

                @endif
                </div>
                <div class="hidden-sm-only hidden-lg-only hidden-xl-only hidden-md-only">
                    <v-menu offset-y>
                    <v-btn icon slot="activator"><v-icon>more_vert</v-icon></v-btn>
                        <v-list>
                            <v-list-tile  href="/">
                                <v-list-tile-title>Welcome</v-list-tile-title>
                            </v-list-tile>
                            <v-list-tile  href="{{ route('login') }}">
                                <v-list-tile-title>Login</v-list-tile-title>

                            </v-list-tile>
                            <v-list-tile href="{{ route('register') }}">
                                <v-list-tile-title class="btn">Register</v-list-tile-title>

                            </v-list-tile>
                        </v-list>
                    </v-menu>
                </div>
            </v-toolbar>
            </div>
            </nav>

            <section class="hidden-xs-only">

                <div class="wrapper">
                    <div class="product-img">
                        <img src="/img/faq/home.png" height="420" width="250">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Welcome</h1>
                            <h2>Pantalla principal de l'aplicació</h2>
                            <p>En aquesta pantalla estará la welcome page,<br> on podràs veure tota l'informació sobre<br> aquesta i el contacte sobre el seu desenvolupador. </p>
                        </div>
                        <div class="product-price-btn">
                            <form action="/">
                                <button type="submit">Comença</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Registre</h1>
                            <h2>Encara no tens compte? A que esperes!?</h2>
                            <p>En aquesta pantalla et podras registrar,<br> ho pots fer amb el teu correu o tambe <br> amb un compte de github o facebook. </p>
                        </div>
                        <div class="product-price-btn">
                            <form action="/registre">
                                <button type="submit">Registrat</button>
                            </form>
                        </div>
                    </div>
                    <div class="product-img-r">
                        <img src="/img/faq/register.png" height="420" width="250">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="/img/faq/tasques.png" height="420" width="250">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Home</h1>
                            <h2>Aquesta es la Home de l'app</h2>
                            <p>A la home trobaras les tasques, les quals <br>podras administrar molt facilment com<br> pots veure es ostren en cartes, les quals <br>mostren l'usuari asignat i els botons d'accions.</p>
                        </div>
                        <div class="product-price-btn">
                            <form action="/home">
                                <button type="submit">Comença</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Menu administració</h1>
                            <h2>Posat una foto on surtis ben guap@!</h2>
                            <p>En aquesta barra lateral podras visualitzar,<br> els teus permisos i rols, tambe el correu <br> i a mes a mes modificar el color de l'app!. </p>
                        </div>
                    </div>
                    <div class="product-img-r">
                        <img src="/img/faq/menuadmin.png" height="420" width="250">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="/img/faq/menunav.png" height="420" width="250">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Menu navegació</h1>
                            <h2>Navega per l'aplicació</h2>
                            <p>Al menu lateral el qual es de navegacio<br>podras accedir a tots els apartats que oferimm<br> aixi com a les tasques, els tags, al contacte <br>i a l'informacio sobre nosaltres.</p>
                        </div>

                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Crea una tasca</h1>
                            <h2>Es hora de crear la primera tasca!</h2>
                            <p>Fixat amb el boto central amb aquest<br> accediras a la creacio de la tasca, aqui<br> podras asignarli un nom, una descripcio,<br> en aquest cas deixarem el camp completada<br> de banda, fet aixo guardarem la tasca.</p>
                        </div>
                    </div>
                    <div class="product-img-r">
                        <img src="/img/faq/ctasca.png" height="420" width="250">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="/img/faq/etasca.png" height="420" width="250">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Editar una tasca</h1>
                            <h2>Ups me equivocat amb el nom!</h2>
                            <p>No et preocupis, pots editar les tasques<br> en qualsevol moment, tant el nom, com <br>la descripcio, inclus tambe pots eliminar<br> o afegir mes tags!</p>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Eliminar una tasca</h1>
                            <h2>No vols veure certa tasca?</h2>
                            <p>Si es aixi tens un boto a la teva disposicio<br> el qual te forma de paperera aquest et<br> mostrara un formulari d'avis, un cop <br>s'elimine la tasca no es podra recuperar.</p>
                        </div>
                    </div>
                    <div class="product-img-r">
                        <img src="/img/faq/eltasca.png" height="420" width="250">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="/img/faq/perfil.png" height="420" width="250">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Editar el Perfil</h1>
                            <h2>Posat una foto que surtis ben guap@!</h2>
                            <p>Al menu d'administracio, feu clic a l'icona <br>en forma de llapis al fer clic et portara a<br> l'apartat per modificar-lo, un cop alli ja<br> podras modificar les teves dades i tambe<br> la foto de perfil.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Versio mobile -->
            <section class="hidden-sm-only hidden-lg-only hidden-xl-only hidden-md-only">
                <v-layout row align-start justify-center row fill-height >
                    <v-flex xs8 sm6>

                        <v-card class="mb-5 mt-3 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Welcome</div>
                                    <p class="grey--text font-italic">Welcome page de l'aplicacio</p>
                                </div>
                            </v-card-title>

                            <v-card-actions>

                                <v-spacer></v-spacer>
                                <v-btn round color="#9cebd5" dark>Comença</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                En aquesta pantalla estará la welcome page, on podràs veure tota l'informació sobre aquesta i el contacte sobre el seu desenvolupador.
                                            </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>



                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Registre</div>
                                    <p class="grey--text font-italic">Encara no tens compte? A que esperes!?</p>
                                </div>
                            </v-card-title>

                            <v-card-actions>

                                <v-spacer></v-spacer>
                                <v-btn round color="#9cebd5" dark>Registrat</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                En aquesta pantalla et podras registrar,
                                                ho pots fer amb el teu correu o tambe
                                                amb un compte de github o facebook.                                            </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>

                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Home</div>
                                    <p class="grey--text font-italic">Home de l'aplicació</p>
                                </div>
                            </v-card-title>

                            <v-card-actions>

                                <v-spacer></v-spacer>
                                <v-btn round color="#9cebd5" dark>Comença</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                A la home trobaras les tasques, les quals
                                                podras administrar molt facilment com
                                                pots veure es ostren en cartes, les quals
                                                mostren l'usuari asignat i els botons d'accions.                                            </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>



                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Menu perfil</div>
                                    <p class="grey--text font-italic">Vista rapida al teu perfil!</p>
                                </div>
                            </v-card-title>

                            <v-card-actions>
                            </v-card-actions>
                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                En aquesta barra lateral podras visualitzar,
                                                els teus permisos i rols, tambe el correu
                                                i a mes a mes modificar el color de l'app!.                                            </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>



                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Menu navegació</div>
                                    <p class="grey--text font-italic">Navega per l'aplicació</p>
                                </div>
                            </v-card-title>

                            <v-card-actions>

                                <v-spacer></v-spacer>

                                <v-spacer></v-spacer>
                            </v-card-actions>
                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                Al menu lateral el qual es de navegacio
                                                podras accedir a tots els apartats que oferimm
                                                aixi com a les tasques, els tags, al contacte
                                                i a l'informacio sobre nosaltres.                                            </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>



                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Crea una tasca
                                    </div>
                                    <p class="grey--text font-italic">Es hora de crearr la primera tasca!</p>
                                </div>
                            </v-card-title>

                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                Fixat amb el boto central amb aquest
                                                accediras a la creacio de la tasca, aqui
                                                podras asignarli un nom, una descripcio,
                                                en aquest cas deixarem el camp completada
                                                de banda, fet aixo guardarem la tasca.                                            </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>
                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Editar una tasca

                                    </div>
                                    <p class="grey--text font-italic">Ups t'has equivocat amb el nom?!</p>
                                </div>
                            </v-card-title>

                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                No et preocupis, pots editar les tasques
                                                en qualsevol moment, tant el nom, com
                                                la descripcio, inclus tambe pots eliminar
                                                o afegir mes tags!                                         </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>
                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Eliminar una tasca
                                    </div>
                                    <p class="grey--text font-italic">No vols veure certa tasca?</p>
                                </div>
                            </v-card-title>

                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                Si es aixi tens un boto a la teva disposicio
                                                el qual te forma de paperera aquest et
                                                mostrara un formulari d'avis, un cop
                                                s'elimine la tasca no es podra recuperar.                                 </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>
                        </v-card>

                        <v-card class="mb-5 elevation-4">
                            <v-img
                                    src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                            >
                            </v-img>

                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">Editar el Perfil

                                    </div>
                                    <p class="grey--text font-italic">Posat una foto que surtis ben guap@!</p>
                                </div>
                            </v-card-title>

                            <v-fab-transition>
                                <v-expansion-panel>
                                    <v-expansion-panel-content>
                                        <div slot="header"></div>
                                        <v-card>
                                            <v-card-text>
                                                Al menu d'administracio, feu clic a l'icona
                                                en forma de llapis al fer clic et portara a
                                                l'apartat per modificar-lo, un cop alli ja
                                                podras modificar les teves dades i tambe
                                                la foto de perfil.                                           </v-card-text>
                                        </v-card>
                                    </v-expansion-panel-content>
                                </v-expansion-panel>
                        </v-card>


                    </v-flex>
                </v-layout>
            </section>

            </section>

    </template>

</v-app>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
<script>
  import VTextarea from "vuetify/src/components/VTextarea/VTextarea"
  export default {
    components: {VTextarea}
  }
</script>