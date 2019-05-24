import helpers from '../js/utils/helpers'
export default {
  /**
   * Send a request to the server to update user's subscription.
   *
   * @param {PushSubscription} subscription
   */
  updateSubscription (subscription) {
    const key = subscription.getKey('p256dh')
    const token = subscription.getKey('auth')

    const data = {
      endpoint: subscription.endpoint,
      key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
      token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null
    }
    return window.axios.put('/api/v1/subscriptions', data).catch(() => {
      window.eventBus.$emit('pushOperationFinished')
    })
  },
  /**
   * Send a request to the server to delete user's subscription.
   *
   * @param {PushSubscription} subscription
   */
  deleteSubscription (subscription) {
    // TODO DELETE
    // this.loading = true

    return window.axios.post('/api/v1/subscriptions/delete', { endpoint: subscription.endpoint }).catch(() => {
      window.eventBus.$emit('pushOperationFinished')
    })
    // TODO ESBORRAR DESPRES EXPLICAT!!!! -> AQUI NO TENIM LOADING
    // window.axios.post('/api/v1/subscriptions/delete', { endpoint: subscription.endpoint })
    //   .then(() => {
    //     this.loading = false
    // })
  },
  /**
   * Subscribe for push notifications.
   */
  subscribe () {
    return navigator.serviceWorker.ready.then(registration => {
      const options = { userVisibleOnly: true }
      const vapidPublicKey = window.vapidPublicKey

      if (vapidPublicKey) {
        options.applicationServerKey = helpers.urlBase64ToUint8Array(vapidPublicKey)
      }

      registration.pushManager.subscribe(options)
        .then(subscription => {
          window.eventBus.$emit('pushEnabled')
          // this.isPushEnabled = true  TODO
          window.eventBus.$emit('enableNotifications')
          // this.pushButtonDisabled = false  TODO
          this.updateSubscription(subscription).then(() => {
            window.eventBus.$emit('pushOperationFinished')
          })
        })
        .catch(e => {
          if (Notification.permission === 'denied') {
            console.log('Permission for Notifications was denied')
            window.eventBus.$emit('disableNotifications')
            // this.pushButtonDisabled = true TODO
          } else {
            console.log('Unable to subscribe to push.', e)
            window.eventBus.$emit('enableNotifications')
            // this.pushButtonDisabled = false  TODO
          }
        })
    })
  },
  /**
   * Unsubscribe from push notifications.
   */
  unsubscribe () {
    console.log('unsubscribe!!!')
    return navigator.serviceWorker.ready.then(registration => {
      registration.pushManager.getSubscription().then(subscription => {
        console.log('unsubscribe subscription:')
        console.log(subscription)
        if (!subscription) {
          console.log('XITO!')
          window.eventBus.$emit('pushDisabled')
          // this.isPushEnabled = false  TODO
          window.eventBus.$emit('enableNotifications')
          // this.pushButtonDisabled = false  TODO
          return
        }
        console.log('OK!!!')
        subscription.unsubscribe().then(() => {
          console.log('unsubscribe ok')
          console.log('deleting subscription!')
          this.deleteSubscription(subscription).then(() => {
            window.eventBus.$emit('pushOperationFinished')
            // window.eventBus.$emit('pushDisabled')
            // this.isPushEnabled = false  TODO
            window.eventBus.$emit('disableNotifications')
            // this.pushButtonDisabled = false  TODO
          })
        }).catch(e => {
          console.log('Unsubscription error: ', e)
          window.eventBus.$emit('disableNotifications')
          // this.pushButtonDisabled = false  TODO
        })
      }).catch(e => {
        console.log('Error thrown while unsubscribing.', e)
      })
    })
  }
}
