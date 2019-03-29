<template>

    <v-navigation-drawer v-model="dataDrawer"
                         fixed
                         right
                         clipped
                         app>
        <v-toolbar flat color="primary">
            <v-btn icon @click.stop="drawerNavigationChannel = !drawerNavigationChannel">
                <v-icon class="icon_close">close</v-icon>
            </v-btn>
            <v-toolbar-title class="subheading">Info. del contacto</v-toolbar-title>
        </v-toolbar>

        <v-card class="mb-3">
            <v-layout class="mt-4 justify-center mb-5">
        <v-avatar class="avatar mt-5 justify-center mb-5">
            <img src="https://vuetifyjs.com/apple-touch-icon-180x180.png" alt="avatar" class="avatar">
        </v-avatar>
            </v-layout>

            <span class="ml-4 subheading font-weight-bold">Channel 1</span>
            <br>
            <p class="ml-4 font-weight-light">Ult. vegada avui a les 10:45</p>
            <v-layout></v-layout>
        </v-card>

        <v-card>
            <v-card-title>
            <span class="grey--text font-weight-light mt-1">Arxius, enllaços i documents</span>
                <v-spacer></v-spacer>
            <v-btn class="buttons" icon><v-icon class="buttons" color="grey">chevron_right</v-icon></v-btn>
            </v-card-title>
            <v-card-content class="ml-4 mb-3">
                <img class="images" src="https://picsum.photos/200/300/?random" alt="image">
                <img class="images" src="https://picsum.photos/200/300/?random" alt="image">
                <img class="images" src="https://picsum.photos/200/300/?random" alt="image">
            </v-card-content>
            <v-layout class="mt-3"></v-layout>
        </v-card>

        <v-card class="mt-3">

            <v-card-title>
                <span class="font-weight-bold ml-3 subheading">Silenciar</span>
                <v-checkbox color="grey" class="justify-content-end"></v-checkbox>
            </v-card-title>
            <v-divider inset></v-divider>
            <v-card-title>
                <span class="font-weight-bold ml-3 subheading">Missatges destacats</span>
                <v-spacer></v-spacer>
                <v-btn class="buttons" icon><v-icon class="buttons" color="grey">chevron_right</v-icon></v-btn>
            </v-card-title>

        </v-card>

        <v-card class="mt-3">
            <v-card-content>
                <span class="grey--text font-weight-light ml-3">Info. i numero de telefon</span>
                <p></p>
                <p class="ml-3">Lore ipsum</p>
            </v-card-content>
            <v-divider inset></v-divider>
            <v-card-content>
                <span class="font-weight-medium subheading ml-4">+34 666 666 666</span>
            </v-card-content>
            <v-layout class="mt-3"></v-layout>
        </v-card>

        <v-card class="mt-3">
            <v-list two-line>
                <template>
                    <v-subheader>
                        <span>Grups en comu</span>
                        <v-spacer></v-spacer>
                        <span>2</span>
                    </v-subheader>

                    <v-divider inset></v-divider>

                    <v-list-tile>
                        <v-list-tile-avatar>
                            <img src="https://jacekjeznach.com/wp-content/uploads/2017/01/css-code.jpeg" alt="">
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title  @click="">DAM</v-list-tile-title>
                            <v-list-tile-sub-title >Sergi Baucells, Cristian Marin...</v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>


                    <v-divider inset></v-divider>


                    <v-list-tile>
                        <v-list-tile-avatar>
                            <img src="https://ih1.redbubble.net/image.316142692.7951/pp,550x550.jpg" alt="">
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title  @click="">DAM Alumnes</v-list-tile-title>
                            <v-list-tile-sub-title >Sergi Baucells, Cristian Marin...</v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </template>
            </v-list>
        </v-card>

        <v-card class="mt-3">
            <v-content>
                <v-btn icon><v-icon color="grey">block</v-icon></v-btn>
                <a class="subheading">Bloquear</a>
            </v-content>
        </v-card>

        <v-card class="mt-3">
            <v-content>
                <v-btn icon><v-icon color="red">thumb_down</v-icon></v-btn>
                <a class="subheading">Reportar contacte</a>
            </v-content>
        </v-card>

        <v-card class="mt-3">
            <v-content>
                <v-btn icon><v-icon color="red">delete</v-icon></v-btn>
                <a class="subheading">Eliminar xat</a>
            </v-content>
        </v-card>

    </v-navigation-drawer>

</template>

<script>
export default {
  name: 'ChatNavigationChannel',
  data () {
    return {
      dataDrawer: this.drawerNavigationChannel,
    }
  },
  props: {
    drawerNavigationChannel: {
      Type: Boolean,
      default: null
    }
  },
  watch: {
    dataDrawer (drawer) {
      this.$emit('input', drawer)
    },
    drawerNavigationChannel (drawer) {
      this.dataDrawer = drawer
    }
  },
  model: {
    prop: 'drawerNavigationChannel',
    event: 'input'
  },
}
</script>

<style scoped>
    .avatar {
        width: 150px;
        height: 150px;
    }
    .buttons {
        width: 20px;
        height: 20px;
    }
    .images {
        width: 85px;
        height: 85px;
    }
</style>
