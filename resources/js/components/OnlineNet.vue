<template>
    <span>
        <div>
        <p class="font-weight-bold subheading">Estat connexió<v-btn icon @click="show" :loading="online"> <v-icon>cached</v-icon></v-btn></p>

        </div>
        <p>La teva connexió és <b id="status">unknown</b>.</p>
        </span>
</template>

<script>
export default {
  name: 'onlinenet',
  data () {
    return {
      online: false
    }
  },
  methods: {
    show () {
      document.getElementById('status').innerHTML = navigator.onLine ? 'online' : 'offline'

      var target = document.getElementById('target')

      function handleStateChange () {
        var timeBadge = new Date().toTimeString().split(' ')[0]
        var newState = document.createElement('p')
        var state = navigator.onLine ? 'online' : 'offline'
        newState.innerHTML = '<span class="badge">' + timeBadge + '</span> Connection state changed to <b>' + state + '</b>.'
        target.appendChild(newState)
      }

      window.addEventListener('online', handleStateChange)
      window.addEventListener('offline', handleStateChange)
    }
  }
}
</script>

<style scoped>

</style>
