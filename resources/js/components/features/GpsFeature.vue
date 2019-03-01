<template>
    <span>
      <a class="white--text">GPS</a>
        <v-layout row justify-center>

    <v-dialog
            v-model="dialog"
            width="500"
    >
      <v-btn
              slot="activator"
              @click="show"
              :loading="gps"
              id="askButton"
              icon
              color="primary"
      >
          🛰
      </v-btn>

      <v-card>
        <v-card-title
                class="headline grey lighten-2"
                primary-title
        >
          Estas aquí! <v-spacer></v-spacer>
            <v-tooltip bottom>
                <v-btn
                icon
                @click="show"
                :loading="gps"
                id="askButton"
                slot="activator"
        ><v-icon>cached</v-icon>
                </v-btn>
        <span>Actualitzar</span>
        </v-tooltip>
        </v-card-title>

        <v-card-text class="text-xs-center list-style-type:none">

            <div id="target"></div>
                    <p class="font-weight-light font-italic">Fent clic sobre les coordenades obtindreu la posició al google maps.</p>
        <p class="font-weight-light font-italic">Si no veieu les coordenades, si us plau premeu el botó de refresc.</p>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
                  color="primary"
                  flat
                  @click="dialog = false"
          >
            Sortir
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
        </v-layout>
        </span>
</template>

<script>
export default {
  name: 'GpsFeature',
  data () {
    return {
      gps: false,
      dialog: false
    }
  },
  methods: {
    show () {
      var target = document.getElementById('target')
      var watchId
      function appendLocation (location, verb) {
        verb = verb || 'updated'
        var newLocation = document.createElement('p')
        newLocation.innerHTML = 'Estat: ' + verb + ': <a href="https://maps.google.com/maps?&z=15&q=' + location.coords.latitude + '+' + location.coords.longitude + '&ll=' + location.coords.latitude + '+' + location.coords.longitude + '" target="_blank">' + location.coords.latitude + ', ' + location.coords.longitude + '</a>'
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
