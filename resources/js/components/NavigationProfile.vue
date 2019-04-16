<template>
    <v-navigation-drawer
            style="background: url(../img/snackbar.jpg)"
            v-model="dataDrawer"
            fixed
            right
            clipped
            app
    >
        <v-card>
            <v-card-title class="primary white--text"><h4>Perfil</h4> <v-spacer></v-spacer>
                <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                <v-btn dark icon flat v-on="on" href="/profile">
                <v-icon>edit</v-icon>
            </v-btn>
                    </template>
                    <span>Editar Perfil</span>
                </v-tooltip>
            </v-card-title>
            <v-img class="text-xs-center"
                   src="img/background_user.jpeg"
                   aspect-ratio="2.75"
            ><p></p>
                <v-flex>

                 <div class="text-xs-center">
                <v-avatar class="mb-2">
                    <img :src="user.gravatar">
                </v-avatar>
                     <v-chip
                             v-if="user.admin"
                             v-model="chip3"
                             color="yellow"
                             outline
                     >Admin</v-chip>
                 </div>

                <h3 class="white--text mt-2 mb-2">{{user.name }}</h3>
                </v-flex>
            </v-img>
            <v-layout row wrap
                      style="background: url(../img/snackbar.jpg)"
            >
                <v-card-text class="text-xs-center"
                >
                    <v-flex xs12
                    >
                        <v-tooltip bottom>
                            <template v-slot:activator="{ on }">
                        <v-chip v-on="on" color="primary" text-color="white">
                            <v-avatar>
                                <v-icon>email</v-icon>
                            </v-avatar>
                            {{ user.email}}
                        </v-chip>
                            </template>
                            <span>Correu</span>
                        </v-tooltip>

                        <v-flex v-if="user.admin">
                            <v-menu
                                    bottom
                                    origin="center center"
                                    transition="scale-transition"

                            >
                                <template v-slot:activator="{ on }">
                                    <v-btn
                                            color="secondary"
                                            dark
                                            v-on="on"
                                            outline
                                    >
                                        Rols & Permisos
                                    </v-btn>
                                </template>

                                <v-list>
                                    <v-list-tile                                    >
                                        <v-list-tile-title class="text-xs-center">Tots</v-list-tile-title>
                                    </v-list-tile>
                                </v-list>
                            </v-menu>
                        </v-flex>

                        <v-flex v-else>

                            <v-layout row justify-center>
                                <v-dialog v-model="dialog" scrollable max-width="300px">
                                    <template v-slot:activator="{ on }">

                                        <v-btn color="secondary" dark v-on="on" outline> Rols & Permisos</v-btn>
                                    </template>
                                    <v-card>
                                        <v-card-title class="headline">Rols i Permisos</v-card-title>
                                        <v-divider></v-divider>
                                        <v-card-text style="height: 300px;">
                                            <v-list>
                                                <v-list-group v-ripple no-action>
                                                    <v-list-tile slot="activator">
                                                        <v-list-tile-content>Rols</v-list-tile-content>
                                                    </v-list-tile>

                                                    <v-list-tile v-for="rol in user.roles" :key="rol">
                                                        <v-list-tile-content>
                                                            <v-list-tile-title>{{ rol }}</v-list-tile-title>
                                                        </v-list-tile-content>
                                                    </v-list-tile>
                                                </v-list-group>
                                                <v-list-group v-ripple no-action>
                                                    <v-list-tile slot="activator">
                                                        <v-list-tile-content>Permisos</v-list-tile-content>
                                                    </v-list-tile>

                                                    <v-list-tile v-for="permis in user.permissions" :key="permis">
                                                        <v-list-tile-content>
                                                            <v-list-tile-title>{{ permis }}</v-list-tile-title>
                                                        </v-list-tile-content>
                                                    </v-list-tile>
                                                </v-list-group>
                                            </v-list>
                                        </v-card-text>
                                        <v-divider></v-divider>
                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn color="blue darken-1" flat @click="dialog = false">Sortir</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>
                            </v-layout>
                        </v-flex>

                        <h3>Colors Tema</h3>
                        <color></color>
                        </v-flex>
                    <push-notifications-button></push-notifications-button>
                </v-card-text>
            </v-layout>
        </v-card>

        <v-flex class="subheading">
            <v-card-title class="primary white--text">Opcions administrador<v-spacer></v-spacer>

                <v-flex v-if="isImpersonating">

                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                <v-btn href="impersonate/leave" flat class="white--text" v-on="on" icon>
                    <v-icon>exit_to_app</v-icon>
                </v-btn>
                        </template>
                        <span>Abandonar la suplantació</span>
                    </v-tooltip>

                </v-flex>
            </v-card-title>

            <v-flex v-if="canImpersonate" class="ml-2 mr-2">
                <impersonate label="Entrar com..." url="/api/v1/regular_users"></impersonate>
            </v-flex>

            <v-flex v-if="isImpersonating">
            <v-layout row wrap>
                <v-card-text class="text-xs-center subheading">
                    <v-flex>
                        <v-avatar :title="impersonatedBy.name +' '+'( '+impersonatedBy.email+' )'">
                            <img :src="gravatar" alt="avatar">
                        </v-avatar>
                    </v-flex>
                    <v-flex class="mt-2 ml-1 mr-1">

                        {{ impersonatedBy.name }} està suplantant a {{ user.name }}
                    </v-flex>
                </v-card-text>
            </v-layout>
            </v-flex>

        </v-flex>

    </v-navigation-drawer>
</template>

<script>
export default {
  name: 'NavigationProfile',
  data () {
    return {
      chip3: true,
      dataDrawer: this.drawerRight,
      dialog: false
    }
  },
  props: {
    drawerRight: {
      Type: Boolean,
      default: null
    },
    csrfToken: {
      Type: String
    }
  },
  watch: {
    dataDrawer (newval) {
      this.$emit('input', newval)
    },
    drawerRight (newval) {
      this.dataDrawer = newval
    }
  },
  model: {
    prop: 'drawerRight',
    event: 'input'
  },
  computed: {
    isImpersonating: function () {
      return !!window.impersonatedBy
    },
    canImpersonate: function () {
      return window.laravel_user.admin || false
    },
    gravatar: function () {
      return (
        'https://www.gravatar.com/avatar/' +
          window.md5(
            window.impersonatedBy
              ? window.impersonatedBy.email
              : 'google@gmail.com'
          )
      )
    },
    user: function () {
      return window.laravel_user
    },
    impersonatedBy: function () {
      return window.impersonatedBy || undefined
    }
  }
}
</script>
