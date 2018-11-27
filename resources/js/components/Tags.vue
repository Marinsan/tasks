<template>
    <div>
        TODO TAGS

        <v-btn @click="showMessage">Show snackbar message</v-btn>
        <v-btn @click="showError">Show snackbar error</v-btn>
    </div>
</template>

<script>
import HasSnackbar from './mixins/HasSnackbar'
export default {
  name: 'Tags',
  mixins: [HasSnackbar],
  data () {
    return {
    }
  },
  methods: {
    showMessage () {
      this.$snackbar.showMessage('Missatge exemple')
    },
    showError () {
      this.$snackbar.showError('Missatge error')
    }
  }
}
</script>
