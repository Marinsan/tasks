<template>
    <span>
        <v-menu>

            <v-badge slot="activator" left color="accent" overlap>
                <span slot="badge">6</span>
                <v-tooltip bottom >
            <v-btn slot="activator" icon color="primary">
                <v-icon>notifications</v-icon>
            </v-btn>
                    <span>
                        Notificacions
                    </span>
                     </v-tooltip>
            </v-badge>

            <v-list>
                <v-list-tile>
                    <v-tooltip left >
                    <v-list-tile-title slot="activator" @click="notify">
                         Notificacio 1

                    </v-list-tile-title>
                        <span>
                        Descripcio de la notificacio 1
                        </span>
                    </v-tooltip>
                </v-list-tile>
                <v-list-tile>
                    <v-tooltip left >
                    <v-list-tile-title slot="activator" @click="notify">
                         Notificacio 2

                    </v-list-tile-title>
                        <span>
                        Descripcio de la notificacio 2
                        </span>
                    </v-tooltip>
                </v-list-tile>
                <v-list-tile>
                    <v-tooltip left >
                    <v-list-tile-title slot="activator" @click="notify">
                         Notificacio 3

                    </v-list-tile-title>
                        <span>
                        Descripcio de la notificacio 3
                        </span>
                    </v-tooltip>
                </v-list-tile>
                <v-list-tile>
                    <v-tooltip left >
                    <v-list-tile-title slot="activator" @click="notify">
                         Notificacio 4

                    </v-list-tile-title>
                        <span>
                        Descripcio de la notificacio 4
                        </span>
                    </v-tooltip>
                </v-list-tile>
                <v-list-tile>
                    <v-tooltip left >
                    <v-list-tile-title slot="activator" @click="notify">
                         Notificacio 5

                    </v-list-tile-title>
                        <span>
                        Descripcio de la notificacio 5
                        </span>
                    </v-tooltip>
                </v-list-tile>
            </v-list>
        </v-menu>

    </span>
</template>

<script>
export default {
  name: 'NotificationsWidget',
  methods: {
    notify () {
      if (!('Notification' in window)) {
        this.$snackbar.showError('This browser does not support desktop notification')
      } else {
        if (Notification.permission === 'default') {
          Notification.requestPermission().then(function (result) {
            console.log(result)
            new Notification('Hi there!')
          })
        }
        console.log(Notification.permission)
        if (Notification.permission === 'granted') {
          new Notification('Hi there!')
        }
      }
    }
  }
}
</script>

<style scoped>

</style>
