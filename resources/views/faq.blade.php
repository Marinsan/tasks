<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="https://batdongsanngach.com/wp-content/uploads/2018/01/checklist-icon-350-28.png"/>
    <link rel="manifest" href="/manifest.json">
    <!-- Android -->
    <meta name="theme-color" content="#2BB0ED">
    <!-- IOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blue">
    <style>
        [v-cloak] {display: none}
    </style>
    <title>FAQ</title>
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
            <portal-target name="nav-after"></portal-target>
          <section>
              <h3 class="text-xs-center mt-5 title" >Tens dubtes? Aqui els podras resoldre!</h3>
              <header class="text-xs-center mt-1 font-italic subheading">No hi ha presa, prenteu en calma</header>

              <v-expansion-panel class="mt-3">
                  <v-expansion-panel-content>
                      <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                      <div slot="header">Login & Register</div>
                      <v-card>
                          <v-card-text class="grey lighten-3">
                              Per poder-te logar, pots fer-ho de diverses maneres, a través de la pàgina principal a dalt a la dreta o simplement fent click a aquest enllaç <a href="/login">Login</a>, per al registre també podràs accedir des de la principal al costat del login o a través d'aquest enllaç <a href="/register">Register</a>.                          </v-card-text>
                      </v-card>
                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Puc registrarme amb facebook?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Si pots registrar-te amb facebook, però hauràs d'anar a l'apartat de login, des d'allí podràs connectar a través del teu compte de facebook.     </v-card-text>                     </v-expansion-panel-content>
                      </v-expansion-panel>
                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Puc registrarme amb Github?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Si pots registrar-te amb github, però hauràs d'anar a l'apartat de login, des d'allí podràs connectar a través del teu compte de github.              </v-card-text>            </v-expansion-panel-content>
                      </v-expansion-panel>
                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">No recordo o he perdut la contrasenya.</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      No et preocupis, si has perdut o no recordes la contrasenya podràs recuperar-la a través del link que hi ha a la pàgina del login, si no també pots accedir des <a href="/password/reset">d'aquí</a>, un cop estiguis dins et demanarà el correu per poder enviar-te el link per poder generar la nova contrasenya.
                                  </v-card-text>
                          </v-expansion-panel-content>
                      </v-expansion-panel>
                  </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel class="mt-2">
                  <v-expansion-panel-content>
                      <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                      <div slot="header">Tasques</div>
                      <v-card>
                          <v-card-text class="grey lighten-3">
                              Un cop registrat, per poder crear una tasca ens dirigirem al botó principal de la pantalla. Aquesta tasca podràs assignar un nom, una descripció, poder establir si és completada o no.    </v-card-text>
                      </v-card>
                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Com puc crear una tasca?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Per crear una tasca, si és la primera vegada tindràs dues opcions, la primera un botó central pel qual crearàs la tasca o també tens la possibilitat de crear una tasca mitjançant el botó de baix a la dreta, els dos botons et portaran al mateix formulari de creació, a continuació adjunto dues captures dels botons descrits anteriorment.

                                      <p class="font-weight-bold mt-3 title text-xs-center">Boto principal</p>
                                      <v-img class="mt-1" src="/img/faq/tasques/faq_boto_tasca.png" aspect-ratio="2.75"></v-img>

                                      <p class="font-weight-bold mt-3 title text-xs-center">Boto secundari</p>
                                      <v-img class="mt-1" src="/img/faq/tasques/faq_boto_tasca2.png" aspect-ratio="2.75"></v-img>
                                  </v-card-text>
                              </v-card>
                          </v-expansion-panel-content>
                      </v-expansion-panel>
                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Puc editar una tasca?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Per editar una tasca hauràs de desplegar el panell mitjançant el següent botó, aquest panell conte els botons de visualitzar, editar i eliminar. Ens interessa el central, ja que és aquest el que té la funció d'editar, fareu clic i s'obrirà el formulari d'edició.                                  </v-card-text>
                              </v-card>
                          </v-expansion-panel-content>
                      </v-expansion-panel>

              <v-expansion-panel>
                  <v-expansion-panel-content>
                      <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                      <div slot="header">Puc eliminar una tasca?</div>
                      <v-card>
                          <v-card-text class="grey lighten-3">
                              Per eliminar una tasca hauràs de desplegar el panell mitjançant el següent botó, aquest panell conte els botons de visualitzar, editar i eliminar. Ens interessa el de la dreta amb la icona de la paperera, ja que és aquest el que té la funció d'esborrar, fareu clic i s'obrirà el formulari d'eliminació.                          </v-card-text>
                      </v-card>
                  </v-expansion-panel-content>
              </v-expansion-panel>
                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Puc visualitzar una tasca?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Per visualitzar una tasca hauràs de desplegar el panell mitjançant el següent botó, aquest panell conte els botons de visualitzar, editar i eliminar. Ens interessa el de l'esquerra amb la icona de l'ull, ja que és aquest el que té la funció de visualitzar, fareu clic i s'obrirà una finestra amb les dades de la tasca.                              </v-card>
                          </v-expansion-panel-content>
                      </v-expansion-panel>

              </v-expansion-panel>
              </v-expansion-panel>
                  </v-expansion-panel-content>




              <v-expansion-panel class="mt-2">
                  <v-expansion-panel-content>
                      <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                      <div slot="header">Perfil</div>
                      <v-card>
                          <v-card-text class="grey lighten-3">
                              En aquest apartat podràs resoldre els dubtes que tinguis sobre el perfil, així com modificar les dades, canviar la foto de perfil, l'avatar, etc.                      </v-card>
                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Com puc canviar les dades del meu perfil?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Per poder modificar-les, hauràs d'obrir el menú d'administració el qual s'obri fent clic sobre la imatge del teu usar dalt a la dreta, un cop el tinguis a vistes et fixaràs amb el títol Perfil, veuràs que a la dreta seva hi ha una icona d'un llapis, faràs clic sobre ella i aquesta et redirigirà a la pàgina correcta.                              </v-card>
                          </v-expansion-panel-content>

                      </v-expansion-panel>
                      <v-expansion-panel>
                      <v-expansion-panel-content>
                      <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                      <div slot="header">Com puc canviar la foto de perfil?</div>
                      <v-card>
                          <v-card-text class="grey lighten-3">
                              Un cop estiguis a la pàgina del teu perfil, per canviar la foto tindràs que fer clic sobre el botó de upload photo, aquesta et permetre pujar una foto que tinguis pel teu ordinador, mòbil, tauleta...
                      </v-expansion-panel-content>
                      </v-expansion-panel>

                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Com puc canviar l'avatar?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Un cop estiguis a la pàgina del teu perfil, per canviar l'avatar hauràs de fer clic sobre el botó de upload avatar, aquesta et permetre pujar un avatar que tinguis pel teu ordinador, mòbil, tauleta...
                                  </v-card-text>
                          </v-expansion-panel-content>
                      </v-expansion-panel>

                  </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel class="mt-2">
                  <v-expansion-panel-content>
                      <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                      <div slot="header">Estils</div>
                      <v-card>
                          <v-card-text class="grey lighten-3">
                              En l'apartat d'estils podràs modificar el color de l'aplicació.
                          </v-card-text>
                      </v-card>

                      <v-expansion-panel>
                          <v-expansion-panel-content>
                              <v-icon slot="actions" color="primary">$vuetify.icons.expand</v-icon>
                              <div slot="header">Com puc canviar el color de l'app?</div>
                              <v-card>
                                  <v-card-text class="grey lighten-3">
                                      Per canviar el color i posar un acord als teus gustos, hauràs d'obrir el menú d'administració, i un cop allí veuràs dos requadres els quals el primer modificar el color primari de l'aplicació i el segon el secundari.
                                  </v-card-text>
                          </v-expansion-panel-content>
                      </v-expansion-panel>

                  </v-expansion-panel-content>
              </v-expansion-panel>

              <h4 class="text-xs-center mt-5">Per qualsevol altre dubte, podeu contactar envia'n un correu a <a style="color:grey">cristianmarin@iesebre.com</a> és respondrà el més aviat possible. Gràcies!</h4>

        </section>
    </template>

</v-app>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
