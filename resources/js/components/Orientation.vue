<template>
    <span>

 <div class="text-xs-center">
    <v-dialog
            v-model="dialog"
            width="500"
    >
      <v-btn
              slot="activator"
              @click="show"
              :loading="gps"
              id="askButton"
      >
         Poscició! &nbsp;📲
      </v-btn>

      <v-card>
        <v-card-title
                class="headline grey lighten-2"
                primary-title
        >
          Estas amb aquesta orientació!
        </v-card-title>

        <v-card-text class="text-xs-center list-style-type:none text-center justify-content-center">

        <screen-o-l></screen-o-l>

    <p>Inclinació Esquerra/Dreta [gamma] &nbsp;<a id="doTiltLR"></a></p>

    <p>Inclinació Davant/Detras [beta] &nbsp;<a id="doTiltFB"></a></p>


    <p>Direcció [alpha] &nbsp;<a id="doDirection"></a></p>



<div class="container" id="logoContainer">
  <img src="https://www.w3.org/html/logo/downloads/HTML5_Badge_512.png" id="imgLogo">
</div>

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
            </div>
        </span>
</template>

<script>
import ScreenOL from "./ScreenOL"
export default {
  name: 'Orientation',
  components: {ScreenOL},
  data () {
    return {
      gps: false,
      dialog: false
    }
  },
  methods: {
    show () {
      if ('DeviceOrientationEvent' in window) {
        window.addEventListener('deviceorientation', deviceOrientationHandler, false)
      } else {
        document.getElementById('logoContainer').innerText = 'Device Orientation API not supported.'
      }

      function deviceOrientationHandler (eventData) {
        var tiltLR = eventData.gamma
        var tiltFB = eventData.beta
        var dir = eventData.alpha

        document.getElementById('doTiltLR').innerHTML = Math.round(tiltLR)
        document.getElementById('doTiltFB').innerHTML = Math.round(tiltFB)
        document.getElementById('doDirection').innerHTML = Math.round(dir)

        var logo = document.getElementById('imgLogo')
        logo.style.webkitTransform = 'rotate(' + tiltLR + 'deg) rotate3d(1,0,0, ' + (tiltFB * -1) + 'deg)'
        logo.style.MozTransform = 'rotate(' + tiltLR + 'deg)'
        logo.style.transform = 'rotate(' + tiltLR + 'deg) rotate3d(1,0,0, ' + (tiltFB * -1) + 'deg)'
      }
    }
  }
}
</script>

<style scoped>
    .container {
        perspective: 300;
        -webkit-perspective: 300;
    }

    #imgLogo {
        width: 275px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding: 15px;
    }
</style>
