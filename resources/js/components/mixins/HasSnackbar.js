export default {
  data () {
    return {
      snackbarMessage: '',
      snackbarTimeout: 3000,
      snackbarColor: 'success',
      snackbar: false
    }
  },
  methods: {
    showMessage (message) {
      this.snackbarMessage = message
      this.color = 'success'
      this.snackbar = true
    },
    showError (error) {
      this.snackbarMessage = error
      this.color = 'error'
      this.snackbar = true
    }
  }
}