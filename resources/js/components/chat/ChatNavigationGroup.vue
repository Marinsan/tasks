<template>

    <v-navigation-drawer v-model="dataDrawer"
                         fixed
                         right
                         clipped
                         app>
        <v-toolbar flat color="primary">
            <v-btn icon @click.stop.prevent="drawerNavigationGroup = !drawerNavigationGroup">
                <v-icon class="icon_close">close</v-icon>
            </v-btn>
            <v-toolbar-title class="subheading">Info. del Grupo</v-toolbar-title>
        </v-toolbar>

        <navigation-multimedia v-model="drawerNavigationMultimedia"></navigation-multimedia>

        <chat-grup-avatar></chat-grup-avatar>



        <v-card class="mt-3">
            <v-card-title>
                <span class="ml-4 font-weight-light">Descripció</span>
                <p class="ml-4 font-weight-light" v-show="!TextField">Afegeix una descripció al grup</p>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                    <v-btn v-show="!TextField" class="mb-4" icon slot="activator" v-on:click="TextField = !TextField"><v-icon color="grey">edit</v-icon></v-btn>
                    <span>Editar</span>
                </v-tooltip>
                <v-text-field append-icon="done" v-show="TextField"></v-text-field>
            </v-card-title>
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
                <v-btn @click.stop.prevent="drawerFeaturedMessage = true" class="buttons" icon><v-icon class="buttons" color="grey">chevron_right</v-icon></v-btn>
            </v-card-title>
            <v-layout></v-layout>
        </v-card>

        <navigation-featured-message v-model="drawerFeaturedMessage"></navigation-featured-message>

        <v-dialog
                v-model="dialogSilence"
                max-width="290"
        >
            <v-card>
                <v-card-title class="headline">Silenciar a "Team 1" fins...</v-card-title>

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
                        <v-list-tile-action v-if="group.admin">
                            <v-chip
                            v-model="chip4"
                            color="yellow"
                            label
                            outline
                            class="admin"
                            >Admin</v-chip>
                        </v-list-tile-action>
                    </v-list-tile>

                </template>
            </v-list>
        </v-card>

        <v-card class="mt-3" @click.stop.prevent="dialogExit = true">
            <v-layout>
                <v-btn icon><v-icon color="red">exit_to_app</v-icon></v-btn>
                <a class="subheading mt-3">Sortir del grup</a>
            </v-layout>
        </v-card>

        <v-dialog
                v-model="dialogExit"
                max-width="320"
        >
            <v-card>
                <v-card-text>
                    Sortir del grup "Team 1"?
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                            color="green darken-1"
                            flat="flat"
                            @click="dialogExit = false"
                    >
                        Cancelar
                    </v-btn>

                    <v-btn
                            color="green"
                            class="text-white"
                            @click="dialogExit = false"
                    >
                        Sortir
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-card class="mt-3" @click.stop.prevent="dialogReport = true">
            <v-layout>
                <v-btn icon ><v-icon color="red">thumb_down</v-icon></v-btn>
                <a class="subheading mt-2">Reportar Grup</a>
            </v-layout>
        </v-card>

        <v-dialog
                v-model="dialogReport"
                max-width="320"
        >
            <v-card>
                <v-card-text>
                    Reportar aquest grup a Tasques Marinsan?
                <v-checkbox label="Sortir del gruo i borrar els missatges d'aquest grup"></v-checkbox>
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

    </v-navigation-drawer>

</template>

<script>
  import ChatNavigationMultimedia from './ChatNavigationMultimedia'
  import ChatGrupAvatar from './ChatGrupAvatar'
  import ChatNavigationFeaturedMessage from './ChatNavigationFeaturedMessage'

export default {
  name: 'ChatNavigationChannel',
  components: {
    'chat-grup-avatar': ChatGrupAvatar,
    'navigation-multimedia': ChatNavigationMultimedia,
    'navigation-featured-message': ChatNavigationFeaturedMessage

  },
  data () {
    return {
      drawerNavigationMultimedia: false,
      drawerFeaturedMessage: false,
      groups: [
        { header: '<span class="grey--text font-weight-light">3 participants</span>' },
        {
          avatar: 'https://avatars2.githubusercontent.com/u/23049646?s=460&v=4',
          title: 'Cristian Marin',
          subtitle: 'Lore ipsum'
        },
        { divider: true, inset: true },
        {
          admin: true,
          avatar: 'https://avatars1.githubusercontent.com/u/23049517?s=400&v=4',
          title: 'Sergi Baucells',
          subtitle: 'Rasque aqui ######### para revelar mi estado'

        },
        { divider: true, inset: true },
        {
          avatar: 'https://avatars1.githubusercontent.com/u/23049409?s=400&v=4',
          title: 'Marc Mestre',
          subtitle: 'Stay determined'
        }
      ],
      dataDrawer: this.drawerNavigationGroup,
      dialogSilence: false,
      dialogExit: false,
      dialogReport: false,
      dialogDestroy: false,
      TextField: false,
      chip4: true,
      dialogShowPhoto: false
    }
  },
  props: {
    drawerNavigationGroup: {
      Type: Boolean,
      default: null
    }
  },
  watch: {
    dataDrawer (drawer) {
      this.$emit('input', drawer)
    },
    drawerNavigationGroup (drawer) {
      this.dataDrawer = drawer
    }
  },
  model: {
    prop: 'drawerNavigationGroup',
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
    .admin {
        width: 65px;
        height: 15px;
        font-size: x-small;
    }
    .hover_letters {
        font-size: small;
    }
    .Full_Avatar {
        width: 350px;
        height: 350px;
    }
</style>
