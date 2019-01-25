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
            <v-card-title class="primary white--text"><h4>Perfil</h4> <v-spacer></v-spacer><v-btn dark icon flat href="/profile">
                <v-icon>edit</v-icon>
            </v-btn></v-card-title>
            <v-img class="text-xs-center"
                   src="img/background_user.jpeg"
                   aspect-ratio="2.75"
            <!--&gt;<p></p>-->
                <!--<v-avatar>-->
                    <!--&lt;!&ndash;<img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" alt="avatar" style="border-style:solid;border-width:3px;border-color: white;">&ndash;&gt;-->
                <!--</v-avatar><p></p>-->
                <!--<h3 class="white&#45;&#45;text">{{ // Auth::user()->name }}</h3>-->
                <!--<p></p>-->
            <!--</v-img>-->
            <!--<v-layout row wrap-->
                      <!--style="background: url(../img/snackbar.jpg)"-->
            <!--&gt;-->
                <!--<v-card-text class="text-xs-center"-->
                <!--&gt;-->
                    <!--<v-flex xs12-->
                    <!--&gt;-->
                        <!--<h3>Correu</h3>-->
                        <!--<p>{{ // Auth::user()->email }}</p>-->
                        <!--<p></p>-->
                        <!--<h3>Administrador</h3>-->
                        <!--@if(Auth::user()->admin == 1)-->
                        <!--<p>Si</p>-->
                        <!--@else-->
                        <!--<p>No</p>-->
                        <!--@endif-->
                        <!--<p></p>-->
                        <!--<h3>Rols</h3>-->
                        <!--<p> {{ // implode(', ',Auth::user()->map()['roles']) }}</p>-->
                        <!--<p></p>-->
                        <!--<h3>Permisos</h3>-->
                        <!--<p> {{ // implode(', ',Auth::user()->map()['permissions']) }}</p>-->
                        <!--<h3>Colors Tema</h3>-->
                        <!--<color></color>-->
                    <!--</v-flex>-->
                <!--</v-card-text>-->
            <!--</v-layout>-->
        <!--</v-card>-->
        <!--<v-card style="background: url(https://c1.staticflickr.com/9/8722/16473411604_3eb6062d07_b.jpg)">-->
            <!--<v-card-title class="primary white&#45;&#45;text"><h4>Opcions administrador</h4> <v-spacer></v-spacer>-->

                <!--@impersonating-->
                <!--<v-btn title="Abandonar suplantació" href="impersonate/leave" flat class="white&#45;&#45;text" icon><v-icon  >exit_to_app</v-icon></v-btn>-->
                <!--@endImpersonating-->
            <!--</v-card-title>-->

            <!--<v-layout row wrap>-->
                <!--@impersonating-->
                <!--<v-card-text class="text-xs-center">-->

                    <!--<v-flex xs12>-->
                        <!--&lt;!&ndash;<v-avatar title="{{ Auth::user()->impersonatedBy()->name }} ( {{ Auth::user()->email }} )">&ndash;&gt;-->
                            <!--&lt;!&ndash;<img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->impersonatedBy()->email) }}" alt="avatar">&ndash;&gt;-->
                        <!--&lt;!&ndash;</v-avatar>&ndash;&gt;-->
                    <!--</v-flex>-->
                    <!--@endImpersonating-->
                    <!--<v-flex xs12>-->

                        <!--@canImpersonate-->
                        <!--<impersonate label="Entrar com..." url="/api/v1/regular_users"></impersonate>-->
                        <!--@endCanImpersonate-->
                        <!--@impersonating-->
                        <!--<p></p>-->
                        <!--{{ // Auth::user()->impersonatedBy()->name }} està suplantant a {{ Auth::user()->name }}-->
                        <!--@endImpersonating-->

                    <!--</v-flex>-->

                </v-card-text>
            </v-layout>
        </v-card>
    </v-navigation-drawer>
</template>

<script>
export default {
  name: 'NavigationProfile',
  data () {
    return {
      dataDrawer: this.drawer
    }
  },
  props: {
    drawer: {
      Type: Boolean,
      default: false
    },
    users: {
      type: Array,
      required: true
    }
  },
  watch: {
    dataDrawer (drawer) {
      this.$emit('input', drawer)
    },
    drawer (drawer) {
      this.dataDrawer = drawer
    }
  },
  model: {
    prop: 'drawer',
    event: 'input'
  }
}
</script>