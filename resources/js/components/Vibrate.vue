<template>
    <v-btn @clic="vibrate" :loading="vi" >Apreta per vibrar! &nbsp; 📳</v-btn>
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
      navigator.vibrate(200);
    }
  }
}
</script>

<style scoped>

</style>
