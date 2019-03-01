<template>
    <span>
    <a class="white--text">Vibrar</a>
    <v-layout row justify-center>
    <v-btn @click="vibrate" icon color="primary" :loading="vi" > 📳</v-btn>
    </v-layout>
    </span>
</template>

<script>
export default {
  name: 'Vibrate',
  data () {
    return {
      vi: false
    }
  },
  methods: {
    vibrate () {
      if (window.navigator && window.navigator.vibrate) {
        navigator.vibrate(200)
      } else {
        this.$snackbar.showMessage('El teu dispositiu no suporta la vibració')
      }
    }
  }
}
</script>

<style scoped>

</style>
