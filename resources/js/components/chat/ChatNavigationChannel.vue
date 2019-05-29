<template>

    <v-navigation-drawer v-model="dataDrawer"
                         fixed
                         right
                         clipped
                         app>
        <v-toolbar flat color="primary">
            <v-btn icon @click.stop.prevent="drawerNavigationChannel = !drawerNavigationChannel">
                <v-icon class="icon_close">close</v-icon>
            </v-btn>
            <v-toolbar-title class="subheading">Info. del contacto</v-toolbar-title>
        </v-toolbar>

        <navigation-multimedia v-model="drawerNavigationMultimedia"></navigation-multimedia>

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
            <v-btn class="buttons" @click.stop.prevent="drawerNavigationMultimedia = !drawerNavigationMultimedia" icon><v-icon class="buttons" color="grey">chevron_right</v-icon></v-btn>
            </v-card-title>
            <v-content class="ml-2 mb-3">
               <td> <img class="images ml-1" src="https://picsum.photos/200/300/?random" alt="image"></td>
               <td > <img class="images ml-1" src="https://picsum.photos/200/300/?random" alt="image"></td>
               <td> <img class="images ml-1" src="https://picsum.photos/200/300/?random" alt="image"></td>
            </v-content>
            <v-layout class="mt-3"></v-layout>
        </v-card>

        <v-card class="mt-3">

            <v-card-title>
                <span class="font-weight-bold ml-3 subheading">Silenciar</span>
                <v-checkbox @click.stop.prevent="dialogSilence = true" color="grey" class="justify-content-end"></v-checkbox>
            </v-card-title>
            <v-card-title>
                <span class="font-weight-bold ml-3 mb-3 subheading">Missatges destacats</span>
                <v-spacer></v-spacer>
                <v-btn class="buttons" @click.stop.prevent="drawerFeaturedMessage = true" icon><v-icon class="buttons" color="grey">chevron_right</v-icon></v-btn>
            </v-card-title>
            <v-layout></v-layout>
        </v-card>

        <navigation-featured-message v-model="drawerFeaturedMessage"></navigation-featured-message>

        <v-dialog
                v-model="dialogSilence"
                max-width="290"
        >
            <v-card>
                <v-card-title class="headline">Silenciar a "Channel 1" fins...</v-card-title>

                <v-card-text>
                    <v-radio-group>
                        <v-radio label="8 hores" value="radio-1"></v-radio>
                        <v-radio label="1 setmana" value="radio-2"></v-radio>
                        <v-radio label="1 any" value="radio-3"></v-radio>
                    </v-radio-group>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                            color="green darken-1"
                            flat="flat"
                            @click="dialogSilence = false"
                    >
                        Cancelar
                    </v-btn>

                    <v-btn
                            color="green"
                            class="text-white"
                            @click="dialogSilence = false"
                    >
                        Silenciar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-card class="mt-3">
            <v-list>
                <v-list-tile
                        v-for="inf in info"
                        :key="inf.title"
                        avatar
                        @click=""
                >
                    <v-list-tile-content>
                        <v-list-tile-sub-title v-html="inf.subtitle"></v-list-tile-sub-title>
                        <v-list-tile-title v-html="inf.title"></v-list-tile-title>
                    </v-list-tile-content>

                </v-list-tile>
            </v-list>
        </v-card>

        <v-card class="mt-3">
            <v-list two-line>
                <template  v-for="(group, index) in groups">
                    <v-subheader v-if="group.header"
                                 v-html="group.header"
                    :key="group.header">
                        {{ group.header }}
                    </v-subheader>

                    <v-divider  v-else-if="group.divider"
                                :key="index"
                                :inset="group.inset"></v-divider>

                    <v-list-tile  v-else
                                  :key="group.title"
                                  avatar
                                  @click="">
                        <v-list-tile-avatar>
                            <img :src="group.avatar">
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title  v-html="group.title"></v-list-tile-title>
                            <v-list-tile-sub-title v-html="group.subtitle"></v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>

                </template>
            </v-list>
        </v-card>

        <v-card class="mt-3" @click.stop.prevent="dialogBlock = true">
            <v-layout>
                <v-btn icon><v-icon color="grey">block</v-icon></v-btn>
                <a class="subheading mt-3">Bloquear</a>
            </v-layout>
        </v-card>

        <v-dialog
                v-model="dialogBlock"
                max-width="320"
        >
            <v-card>
                <v-card-text>
                    Bloquejar a Channel 1? Els contactes bloquejats no podran trucarte ni enviarte missatges.
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                            color="green darken-1"
                            flat="flat"
                            @click="dialogBlock = false"
                    >
                        Cancelar
                    </v-btn>

                    <v-btn
                            color="green"
                            class="text-white"
                            @click="dialogBlock = false"
                    >
                        Bloquejar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-card class="mt-3" @click.stop.prevent="dialogReport = true">
            <v-layout>
                <v-btn icon ><v-icon color="red">thumb_down</v-icon></v-btn>
                <a class="subheading mt-2">Reportar contacte</a>
            </v-layout>
        </v-card>

        <v-dialog
                v-model="dialogReport"
                max-width="320"
        >
            <v-card>
                <v-card-text>
                    Reportar aquest contacte a Tasques Marinsan?
                <v-checkbox label="Bloquejar contacte i borrar els missatges d'aquest xat"></v-checkbox>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                            color="green darken-1"
                            flat="flat"
                            @click="dialogReport = false"
                    >
                        Cancelar
                    </v-btn>

                    <v-btn
                            color="green"
                            class="text-white"
                            @click="dialogReport = false"
                    >
                        Reportar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-card class="mt-3" @click.stop.prevent="dialogReport = true">
            <v-layout>
                <v-btn icon ><v-icon color="red">delete</v-icon></v-btn>
                <a class="subheading mt-3">Eliminar xat</a>
            </v-layout>
        </v-card>

        <v-dialog
                v-model="dialogDestroy"
                max-width="320"
        >
            <v-card>
                <v-card-text>
                    Eliminar el xat amb "Channel 1"?
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                            color="green darken-1"
                            flat="flat"
                            @click="dialogDestroy = false"
                    >
                        Cancelar
                    </v-btn>

                    <v-btn
                            color="green"
                            class="text-white"
                            @click="dialogDestroy = false"
                    >
                        Eliminar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

    </v-navigation-drawer>

</template>

<script>
  import ChatNavigationMultimedia from './ChatNavigationMultimedia'
  import ChatNavigationFeaturedMessage from './ChatNavigationFeaturedMessage'

export default {
  name: 'ChatNavigationChannel',
  components: {
    'navigation-featured-message': ChatNavigationFeaturedMessage,
    'navigation-multimedia': ChatNavigationMultimedia
  },
  data () {
    return {

      drawerNavigationMultimedia: false,
      groups: [
        { header: '<span class="grey--text font-weight-light">Grups en comu 2</span>' },
        {
          avatar: 'https://jacekjeznach.com/wp-content/uploads/2017/01/css-code.jpeg',
          title: 'DAM',
          subtitle: 'Sergi Baucells, Cristian Marin...'
        },
        { divider: true, inset: true },
        {
          avatar: 'https://ih1.redbubble.net/image.316142692.7951/pp,550x550.jpg',
          title: 'DAM Alumnes',
          subtitle: 'Sergi Baucells, Cristian Marin...'
        }
      ],
      info: [
        { title: 'Lore ipsum ', subtitle: '<span class="grey--text font-weight-light">Info. i numero de telefon</span>' },
        { title: '<span class="font-weight-bold">+34 669 521 365</span>' }
      ],
      dataDrawer: this.drawerNavigationChannel,
      dialogSilence: false,
      dialogBlock: false,
      dialogReport: false,
      dialogDestroy: false
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
  }
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
