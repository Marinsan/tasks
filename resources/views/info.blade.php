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
                @if (Route::has('login'))

                    @auth
                        <v-btn flat href="{{ url('/home') }}">Home</v-btn>
                    @else
                        <v-btn flat href="/">Welcome</v-btn>
                        <v-btn flat href="{{ route('login') }}">Login</v-btn>
                        <v-btn flat href="{{ route('register') }}">Register</v-btn>
                    @endauth

                @endif
            </v-toolbar>
            </div>
            </nav>

            <section class="hidden-xs-only">

                <div class="wrapper">
                    <div class="product-img">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Welcome</h1>
                            <h2>Pantalla principal de l'aplicacio</h2>
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
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
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
                            <h1>Menu perfil</h1>
                            <h2>Posat una foto on surtis ben guap@!</h2>
                            <p>En aquesta barra lateral podras visualitzar,<br> els teus permisos i rols, tambe el correu <br> i a mes a mes modificar el color de l'app!. </p>
                        </div>
                    </div>
                    <div class="product-img-r">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
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
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
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
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                </div>

                <div class="wrapper">
                    <div class="product-img">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
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


            <section class="hidden-sm-only hidden-lg-only hidden-xl-only hidden-md-only">
                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Welcome</h1>
                            <h2>Pantalla principal de l'aplicacio</h2>
                            <p>En aquesta pantalla estará la welcome page,<br> on podràs veure tota l'informació sobre<br> aquesta i el contacte sobre el seu desenvolupador. </p>
                        </div>
                        <div class="product-price-btn">
                            <form action="/">
                                <button type="submit">Comença</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
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

                </div>

                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
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

                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Menu perfil</h1>
                            <h2>Posat una foto on surtis ben guap@!</h2>
                            <p>En aquesta barra lateral podras visualitzar,<br> els teus permisos i rols, tambe el correu <br> i a mes a mes modificar el color de l'app!. </p>
                        </div>
                    </div>

                </div>

                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Menu navegació</h1>
                            <h2>Navega per l'aplicació</h2>
                            <p>Al menu lateral el qual es de navegacio<br>podras accedir a tots els apartats que oferimm<br> aixi com a les tasques, els tags, al contacte <br>i a l'informacio sobre nosaltres.</p>
                        </div>

                    </div>
                </div>

                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Crea una tasca</h1>
                            <h2>Es hora de crear la primera tasca!</h2>
                            <p>Fixat amb el boto central amb aquest<br> accediras a la creacio de la tasca, aqui<br> podras asignarli un nom, una descripcio,<br> en aquest cas deixarem el camp completada<br> de banda, fet aixo guardarem la tasca.</p>
                        </div>
                    </div>

                </div>

                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Editar una tasca</h1>
                            <h2>Ups me equivocat amb el nom!</h2>
                            <p>No et preocupis, pots editar les tasques<br> en qualsevol moment, tant el nom, com <br>la descripcio, inclus tambe pots eliminar<br> o afegir mes tags!</p>
                        </div>
                    </div>
                </div>

                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
                    </div>
                    <div class="product-info">
                        <div class="product-text">
                            <h1>Eliminar una tasca</h1>
                            <h2>No vols veure certa tasca?</h2>
                            <p>Si es aixi tens un boto a la teva disposicio<br> el qual te forma de paperera aquest et<br> mostrara un formulari d'avis, un cop <br>s'elimine la tasca no es podra recuperar.</p>
                        </div>
                    </div>
                </div>


                <div class="wrapper-r">
                    <div class="product-img-xs">
                        <img src="http://bit.ly/2tMBBTd" height="420" width="327">
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

            </section>

    </template>

</v-app>
<script src="{{mix('js/app.js')}}"></script>

</body>
</html>
