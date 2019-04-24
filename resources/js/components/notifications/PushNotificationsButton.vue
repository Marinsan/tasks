<template>
    <span>
        <span style="display: flex;align-items: center;">
            <v-tooltip left>
                <v-btn slot="activator" v-if="disabled" icon flat color="primary" href="#" target="_blank">
                    <v-icon>help</v-icon>
                </v-btn>
                <span>Ajuda sobre les notificacions</span>
            </v-tooltip>
            <v-tooltip left>
                <v-switch
                        slot="activator"
                        color="primary"
                        v-model="notificationEnabled"
                        label="Notificacions"
                        :loading="loading"
                        :disabled="loading"
                ></v-switch>
                <span v-if="disabled">No heu permès les notificacions per aquest lloc. Feu click a l'icona d'ajuda per veure com podeu reactivar les notificacions.</span>
                <span v-else>Notificacions <span v-if="notificationEnabled">activades</span><span v-else>desactivades</span></span>
            </v-tooltip>
        </span>

        <v-btn v-if="!disabled"
               @click="sendNotification">
            Send Notification
        </v-btn>
    </span>
</template>

<script>
import pushSubscriptions from './../api/notifications/pushSubscriptions'
export default {
  name: 'PushNotificationButton',
  data () {
    return {
      notificationEnabled: false,
      loading: false,
      loading1: false,
      disabled: true,
      disableWatcher: false
    }
  },
  methods: {
    sendNotification () {
      this.loading1 = true
      window.axios.post('/api/v1/notifications/hello')
        .catch(error => console.log(error))
        .then(() => { this.loading1 = false })
    },
    /**
       * Toggle push notifications subscription.
       */
    togglePush (oldValue) {
      this.loading = true
      if (oldValue) {
        console.log('UNSUBSCRIBING...')
        pushSubscriptions.unsubscribe()
      } else {
        console.log('SUBSCRIBING...')
        pushSubscriptions.subscribe()
      }
    }
  },
  watch: {
    notificationEnabled (notificationEnabled, oldValue) {
      if (!this.disableWatcher) this.togglePush(oldValue)
    }
  },
  created () {
    window.eventBus.$on('pushDisabled', () => {
      console.log('Received event pushDisabled')
      this.disabled = true
    })
    window.eventBus.$on('pushEnabled', () => {
      console.log('Received event pushEnabled')
      this.disabled = false
    })
    window.eventBus.$on('enableNotifications', () => {
      console.log('Received event enableNotifications')
      this.disableWatcher = true
      this.notificationEnabled = true
      this.disableWatcher = false
    })
    window.eventBus.$on('disableNotifications', () => {
      this.disableWatcher = true
      this.notificationEnabled = false
      this.disableWatcher = false
    })
    window.eventBus.$on('pushOperationFinished', () => {
      this.loading = false
    })
  }
}
</script>
