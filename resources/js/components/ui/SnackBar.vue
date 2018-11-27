<template>
    <div>
        TODO TAGS
        <v-snackbar
                :timeout="timeout"
                :color="color"
                v-model="show"
        >
            {{ message }}
            <v-btn dark flat @click="show=false">Tancar</v-btn>
        </v-snackbar>
        <v-btn @click="showMessage('missatge')">Show show message</v-btn>
        <v-btn @click="showError('error')">Show show error</v-btn>
    </div>
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
    // SNACKBAR
    showMessage (message) {
      this.message = message
      this.color = 'success'
      this.show = true
    },
    showError (error) {
      this.message = error
      this.color = 'error'
      this.show = true
    }
    // SNACKBAR END
  },
  mounted () {
    EventBus.$on('showSnackbarError', (error) => {
      this.showError(error)
    })
    EventBus.$on('showSnackbarMessage', () => {
      this.showMessage(message)
    })
  }
}
</script>
