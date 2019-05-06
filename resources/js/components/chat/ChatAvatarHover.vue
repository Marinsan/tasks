<template>
    <span>
        <v-card>

        <v-hover>
            <v-layout
                    slot-scope="{ hover }"
                    class="mt-4 justify-center mb-5"
                    color="grey lighten-4"

            >
                <v-menu
                        absolute
                        offset-y
                        style="max-width: 600px"
                >
                    <template >
                        <v-avatar slot="activator" class="avatar mt-5 justify-center mb-5">
                            <v-img
                                    src="https://vuetifyjs.com/apple-touch-icon-180x180.png" alt="avatar" class="avatar"
                            >
                                <v-expand-transition>
                                    <div
                                            v-if="hover"
                                            class="d-flex grey darken-2 display-3 white--text hover"
                                            style="height: 100%;"
                                    >
                                        <v-flex>

                                            <div class="text-xs-center hover_icon">
                                                <v-icon color="white hover_icon">camera_alt</v-icon>
                                            </div>
                                            <p class="hover_letters text-xs-center">CANVIA &nbsp; L'ICONA</p>
                                            <p class="hover_letters text-xs-center">DEL GRUP</p>

                                        </v-flex>

                                    </div>
                                </v-expand-transition>
                            </v-img>
                        </v-avatar>
                    </template>
                    <v-list>
                        <v-list-tile @click.stop="dialogShowPhoto = true">
                            <v-list-tile-title>Veure foto</v-list-tile-title>
                        </v-list-tile>
                        <v-list-tile @click.stop=" ">
                            <v-list-tile-title>Pujar foto</v-list-tile-title>
                        </v-list-tile>
                        <v-list-tile @click.stop=" ">
                            <v-list-tile-title>Eliminar foto</v-list-tile-title>
                        </v-list-tile>
                    </v-list>
                </v-menu>
            </v-layout>
        </v-hover>
        <v-card-title>
            <span class="ml-4 subheading font-weight-bold">Team 1</span>
            <v-spacer></v-spacer>
            <v-tooltip bottom>
                <v-btn icon slot="activator"><v-icon color="grey">edit</v-icon></v-btn>
                <span>Editar</span>
            </v-tooltip>
            <p class="ml-4 font-weight-light">Creat el 5/2/2019 a les 15:09</p>
        </v-card-title>
    </v-card>

    <v-dialog
            v-model="dialogShowPhoto"
            fullscreen
            hide-overlay
            transition="slide-x-reverse-transition"
    >
        <v-card>
            <v-card-title>
                <v-avatar size="52px">
                    <img src="https://vuetifyjs.com/apple-touch-icon-180x180.png" alt="avatar">
                </v-avatar>
                &nbsp;
                <span class="subheading">Team 1</span>
                <v-spacer> </v-spacer>
                <v-tooltip bottom>
                    <v-btn @click="dialogShowPhoto = false" slot="activator" icon>
                        <v-icon>close</v-icon>
                    </v-btn>
                    <span>Sortir</span>
                </v-tooltip>
            </v-card-title>
            <v-card-text class="text-xs-center">
                <v-avatar class="mt-5 justify-center">
                    <img class="Full_Avatar" src="https://vuetifyjs.com/apple-touch-icon-180x180.png" alt="avatar">
                </v-avatar>
            </v-card-text>
        </v-card>
    </v-dialog>
    </span>
</template>

<script>
export default {
  name: 'ChatAvatarHover',
  data () {
    return {
      dialogShowPhoto: false
    }
  }
}
</script>

<style scoped>
    .hover_letters {
        font-size: small;
        opacity: 10;
        font-weight: 900;
    }
    .avatar {
            width: 150px;
            height: 150px;
    }
    .hover {
        opacity: 0.5;
    }
</style>
