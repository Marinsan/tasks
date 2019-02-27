<template>
    <span>

        <v-btn @click="show" :loading="gps" id="askButton">Geolocalitzam! &nbsp; 🛰 </v-btn>
        <div id="target"></div>
        <p>La teva latitud és: </p>
        <p>La teva longitud és: </p>

        </span>
</template>

<script>
var target = document.getElementById('target')
var watchId
export default {
  name: 'GpsFeature',
  data () {
    return {
      gps: false
    }
  },
  methods: {
    show () {
      function appendLocation (location, verb) {
        verb = verb || 'updated'
        var newLocation = document.createElement('p')
        newLocation.innerHTML = 'Location ' + verb + ': <a href="https://maps.google.com/maps?&z=15&q=' + location.coords.latitude + '+' + location.coords.longitude + '&ll=' + location.coords.latitude + '+' + location.coords.longitude + '" target="_blank">' + location.coords.latitude + ', ' + location.coords.longitude + '</a>'
        var latitude = location.coords.latitude
        var longitude =  location.coords.longitude
        console.log(latitude)
        console.log(longitude)
        console.log(newLocation)

        // TODO: target = null
        console.log(target)
        console.log(watchId)
        target.appendChild(newLocation)
      }

      if ('geolocation' in navigator) {
        document.getElementById('askButton').addEventListener('click', function () {
          navigator.geolocation.getCurrentPosition(function (location) {
            appendLocation(location, 'fetched')
          })

          watchId = navigator.geolocation.watchPosition(appendLocation)
        })
      } else {
        target.innerText = 'Geolocation API not supported.'
      }
    }
  }
}
</script>

<style scoped>

</style>
