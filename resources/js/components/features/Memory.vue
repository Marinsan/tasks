<template>
    <span>

    <a class="white--text">RAM</a>
        <v-layout row justify-center>

        <v-chip color="primary"><v-btn icon @click="show" :loading="mem"><b id="result"></b>GB&nbsp; 💾</v-btn></v-chip>
        </v-layout>

    </span>
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
