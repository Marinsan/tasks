<template>
    <v-btn @click="vibrate" :loading="vi" >Apreta per vibrar! &nbsp; 📳</v-btn>
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
