<template>
    <span>

        <v-btn @click="show" :loading="gps" id="askButton">Geolocalitzam! &nbsp; 🛰 </v-btn>
        <div id="targetg"></div>
        </span>
</template>

<script>

export default {
  name: 'GpsFeature',
  data () {
    return {
      gps: false
    }
  },
  methods: {
    show () {
      var targetg = document.getElementById('target')
      var watchId

      function appendLocation (location, verb) {
        verb = verb || 'updated'
        var newLocation = document.createElement('p')
        newLocation.innerHTML = 'Location ' + verb + ': <a href="https://maps.google.com/maps?&z=15&q=' + location.coords.latitude + '+' + location.coords.longitude + '&ll=' + location.coords.latitude + '+' + location.coords.longitude + '" target="_blank">' + location.coords.latitude + ', ' + location.coords.longitude + '</a>'
        targetg.appendChild(newLocation)
      }

      if ('geolocation' in navigator) {
        document.getElementById('askButton').addEventListener('click', function () {
          navigator.geolocation.getCurrentPosition(function (location) {
            appendLocation(location, 'fetched')
          })

          watchId = navigator.geolocation.watchPosition(appendLocation)
        })
      } else {
        targetg.innerText = 'Geolocation API not supported.'
      }
    }
  }
}
</script>

<style scoped>

</style>
