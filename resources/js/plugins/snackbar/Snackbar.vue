<template>
    <v-snackbar :timeout="timeout" :color="color" v-model="show">
        {{ message }}
        <v-btn dark flat @click="show=false">Tancar</v-btn>
    </v-snackbar>
</template>

<script>
import EventBus from '../../eventBus'
export default {
  data () {
    return {
      message: 'Prova',
      timeout: 3000,
      color: 'success',
      show: false
    }
  },
  methods: {
    showMessage (message) {
      this.message = message
      this.color = 'success'
      this.show = true
    },
    showError (error) {
      this.message = error
      if (error) {
        if (error.response) {
          // The request was made and the server responded with a status code
          // that falls out of the range of 2xx
          console.log(error.response.data)
          console.log(error.response.status)
          this.showSnackBar(error.response.data, 'error', error.response.status)
        } else if (error.request) {
          // The request was made but no response was received
          // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
          // http.ClientRequest in node.js
          console.log('Status:')
          if (navigator.onLine) {
            console.log('online')
          } else {
            console.log('offline')
          }
          console.log(error)
          console.log(error.request)
          if (navigator.onLine) {
            this.showSnackBar('Error de xarxa', 'error')
          } else {
            this.showSnackBar('Error de xarxa. Estat de la xarxa: sense connexió', 'error')
          }
        } else {
          // Something happened in setting up the request that triggered an Error
          console.log('Error', error.message)
          this.showSnackBar(error.message, 'error')
        }
      }
    }
  },
  mounted () {
    EventBus.$on('showSnackbarError', (error) => {
      this.showError(error)
    })
    EventBus.$on('showSnackbarMessage', (message) => {
      this.showMessage(message)
    })
  }
}
</script>
