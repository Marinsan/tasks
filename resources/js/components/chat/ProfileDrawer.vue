<template>
    <v-navigation-drawer
            v-model="dataDrawer"
            absolute
            width="350"
    >
        <v-layout row wrap>
            <v-flex xs12>
                <v-card>
                    <v-card-title class="teal lighten-2 white--text">
                        <v-btn flat icon color="white" @click.stop.prevent="dataDrawer =! dataDrawer">
                            <v-icon>arrow_back</v-icon>
                        </v-btn>
                        <h4>Perfil</h4>
                    </v-card-title>
                    <v-card-text class="blue-grey lighten-5">
                        <chat-avatar></chat-avatar>
                    </v-card-text>
                </v-card>
            </v-flex>
            <v-flex xs12>
                <v-list>
                    <v-subheader class="green--text ml-4">Tu nombre</v-subheader>
                    <v-list-tile class="ml-4">
                        <v-list-tile-title>{{ user('name') }}</v-list-tile-title>
                        <v-list-tile-action><v-btn flat icon color="grey"><v-icon>edit</v-icon></v-btn></v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-flex>
            <v-flex xs12>
                <v-card>
                    <v-card-text class="blue-grey lighten-5 grey--text">
                        Este no es tu nombre de usuario ni un PIN. Este nombre será visible para tus contactos de Whatsapp.
                    </v-card-text>
                </v-card>
                <!--<span style="background-color:#ddd;" class="grey&#45;&#45;text ">-->
                <!--</span>-->
            </v-flex>
            <v-flex xs12>
                <v-list>
                    <v-subheader class="green--text ml-4">Info.</v-subheader>
                    <v-list-tile class="ml-4">
                        <v-list-tile-title>Hello! I'm using WhatsApp!</v-list-tile-title>
                        <v-list-tile-action><v-btn flat icon color="grey"><v-icon>edit</v-icon></v-btn></v-list-tile-action>
                    </v-list-tile>
                </v-list>
            </v-flex>
        </v-layout>
    </v-navigation-drawer>
</template>

<script>
  import ChatAvatar from './ChatAvatar'
  export default {
    name: 'ProfileDrawer',
    components: { ChatAvatar },
    data () {
      return {
        dataDrawer: this.profileDrawer
      }
    },
    props: {
      profileDrawer: {
        Type: Boolean,
        required: true
      }
    },
    watch: {
      dataDrawer (newval) {
        this.$emit('input', newval)
      },
      profileDrawer (newval) {
        this.dataDrawer = newval
      }
    },
    model: {
      prop: 'profileDrawer',
      event: 'input'
    },
    methods: {
      user (prop) {
        return window.laravel_user[prop]
      }
    }
  }
</script>

<style scoped>

</style>
