<template>
    <!--<v-btn @click="show" :loading="spee">-->
        <!--<p>Current theoretical network type is <b id="networkType">not available</b>.</p>-->
        <!--<p>Current effective network type is <b id="effectiveNetworkType">not available</b>.</p>-->
        <!--<p>Current max downlink speed is <b id="downlinkMax">not available</b>. &nbsp; 💾-->
    <!--</v-btn>-->
</template>

<script>
export default {
  name: 'Speed',
  data () {
    return {
      spee: false
    }
  },
  methods: {
    show () {
      function getConnection () {
        return navigator.connection || navigator.mozConnection ||
          navigator.webkitConnection || navigator.msConnection
      }

      function updateNetworkInfo (info) {
        document.getElementById('networkType').innerHTML = info.type
        document.getElementById('effectiveNetworkType').innerHTML = info.effectiveType
        document.getElementById('downlinkMax').innerHTML = info.downlinkMax
      }

      var info = getConnection()
      if (info) {
        info.addEventListener('change', updateNetworkInfo)
        updateNetworkInfo(info)
      }
    }
  }
}
</script>

<style scoped>

</style>
