<template>
    <span>
        <p class="font-weight-bold">El teu dispositiu te una memoria RAM de:</p>
    <v-btn @click="show" :loading="mem">
        <b id="result"></b>GB&nbsp; 💾
    </v-btn>
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
