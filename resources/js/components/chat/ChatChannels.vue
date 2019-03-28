<template>
    <span>
        <v-navigation-drawer
                v-model="prova"
                absolute
                temporary
                clipped
                width="900"
        >
          <v-list class="pa-1">
            <v-list-tile avatar>
              <v-list-tile-avatar>
                <img src="https://randomuser.me/api/portraits/men/85.jpg">
              </v-list-tile-avatar>

              <v-list-tile-content>
                <v-list-tile-title>John Leider</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list>

          <v-list class="pt-0" dense>
            <v-divider></v-divider>

            <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>clse</v-icon>
              </v-list-tile-action>

              <v-list-tile-content>
                <v-list-tile-title>Prova asd asdsa asd asd asd asd as dasd asd as dasd asd as </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>

              <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>clse</v-icon>
              </v-list-tile-action>

              <v-list-tile-content>
                <v-list-tile-title>Prova</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>

              <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>clse</v-icon>
              </v-list-tile-action>

              <v-list-tile-content>
                <v-list-tile-title>Prova</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>

              <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>clse</v-icon>
              </v-list-tile-action>

              <v-list-tile-content>
                <v-list-tile-title>Prova</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list>
        </v-navigation-drawer>

        <v-toolbar color="primary">
            <v-avatar :title="user.name">
                <img v-if="user.gravatar" :src="user.gravatar" alt="avatar">
                <img v-else src="https://www.gravatar.com/avatar/" alt="avatar">
            </v-avatar>
            <v-toolbar-title>Channels</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-spacer></v-spacer>
            <v-tooltip bottom>
                <v-btn icon slot="activator" @click="prova=!prova">
                    <v-icon>turned_in_not</v-icon>
                </v-btn>
                <span>Nova conversació</span>
            </v-tooltip>
            <v-tooltip bottom>
                <v-btn icon slot="activator">
                    <v-icon>more_vert</v-icon>
                </v-btn>
                <span>Menú</span>
            </v-tooltip>
        </v-toolbar>
        <v-container fluid text-xs-center class="ma-0 pa-0">
          <v-layout row wrap class="mx-0">
            <v-flex xs12 style="height: 64px;">
              <v-card dark color="cyan" style="height: 64px;">
                <v-card-text class="px-0">TODO activar notificacions d'escriptori</v-card-text>
              </v-card>
            </v-flex>
            <v-flex xs12>
              <v-card dark style="height: 64px;">
                  search here
              </v-card>
            </v-flex>
            <v-flex xs12 class="scroll-y" style="max-height: calc(100vh - 64px - 64px - 64px - 64px)">
                <v-list subheader>
                    <v-subheader>Recent channels</v-subheader>
                    <v-list-tile
                            v-for="channel in dataChannels"
                            :key="channel.id"
                            avatar
                            @click="$emit('input',channel)"
                    >
                      <v-list-tile-avatar>
                        <img :src="channel.avatar">
                      </v-list-tile-avatar>

                      <v-list-tile-content>
                        <v-list-tile-title v-html="channel.name"></v-list-tile-title>
                      </v-list-tile-content>

                      <v-list-tile-action>
                        <v-icon color="primary">chat_bubble</v-icon>
                      </v-list-tile-action>
                    </v-list-tile>
                  </v-list>
            </v-flex>
          </v-layout>
        </v-container>
    </span>
</template>

<script>

export default {
  name: 'ChatChannels',
  data () {
    return {
      prova: false,
      dataChannels: this.channels
    }
  },
  model: {
    prop: 'channel',
    event: 'input'
  },
  props: {
    channels: {
      type: Array,
      required: true
    },
    channel: {}
  },
  created () {
    this.user = window.laravel_user
  }
}
</script>
