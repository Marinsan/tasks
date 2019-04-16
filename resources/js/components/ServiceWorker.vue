<template>
    <span></span>
</template>

<style>

</style>

<script>
import pushSubscriptions from '../../api/pushSubscriptions'
export default {
  name: 'ServiceWorker',
  methods: {
    registerServiceWorker () {
      if (!('serviceWorker' in navigator)) {
        console.log('Service workers aren\'t supported in this browser.')
        return
      }
      if (document.readyState === 'complete') {
        window.addEventListener('load', () => {
          this.register()
        })
      } else {
        this.register()
      }
    },
    register () {
      navigator.serviceWorker.register('/sw.js')
        .then(function (registration) {
          console.log('Registration successful, scope is:', registration.scope)

          if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
            console.log('Notifications aren\'t supported.')
            return
          }

          console.log('Notifications supported!')

          if (Notification.permission === 'denied') {
            console.log('The user has blocked notifications.')
            return
          }

          console.log('The user has allowed notifications.')

          if (!('PushManager' in window)) {
            console.log('Push messaging isn\'t supported.')
            return
          }
          console.log('PushManager supported')

          navigator.serviceWorker.ready.then(registration => {
            // https://developer.mozilla.org/es/docs/Web/API/PushManager
            // Retrieves an existing push subscription.
            // It returns a Promise that resolves to a PushSubscription object containing details of an existing subscription.
            // If no existing subscription exists, this resolves to a null value.
            registration.pushManager.getSubscription()
              .then(subscription => {
                // Si s'arriba aquí és que el sistema suporta les notificacions i no cal desactivar el botó
                // this.pushButtonDisabled = false TODO ESBORRAR
                console.log('SENDING EVENT pushEnabled')
                window.eventBus.$emit('pushEnabled')
                console.log('SUBSCRIPTION GETTTED:')
                console.log(subscription)
                if (!subscription) { // no subscription exists
                  return
                }
                // TODO REMOVE
                // pushSubscriptions.updateSubscription(subscription)
                // console.log('XIVATO')
                // TODO GLOBAL STATE:
                // this.isPushEnabled = true
                // window.eventBus.$emit('enableNotifications')
                console.log('UPDATING SUBSCRIPTION!')
                pushSubscriptions.updateSubscription(subscription).then(() => {
                  // this.isPushEnabled = true
                  window.eventBus.$emit('enableNotifications')
                })
              })
              .catch(e => {
                console.log('Error during getSubscription()', e)
              })
          })
        })
        .catch(function (error) {
          console.log('Service worker registration failed, error:', error)
        })
    }
  },
  mounted () {
    this.registerServiceWorker()
  }
}
</script>
