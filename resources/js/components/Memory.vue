<template>
    <v-btn @click="show" :loading="mem">
        Your device memory is ~<b id="result">unknown</b> GiB. &nbsp; 💾
    </v-btn>
</template>

<script>
export default {
  name: 'Memory',
  data () {
    return {
      mem: false
    }
  },
  methods: {
    show () {
      document.getElementById('result').innerHTML = navigator.deviceMemory || 'unknown'
    }
  }
}
</script>

<style scoped>

</style>
