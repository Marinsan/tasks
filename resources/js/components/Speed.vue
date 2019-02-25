<template>
        <v-layout row justify-center>
    <v-btn
            @click.stop="dialog = true"
            @click="show"
            :loading="spee"
    >
      Xarxa &nbsp; 📶
    </v-btn>

    <v-dialog
            v-model="dialog"
            max-width="290"
    >
      <v-card>
        <v-card-title class="headline">Caracteristiques de la teva xarxa</v-card-title>

        <v-card-text>
            <p>El tipus de xarxa teorica actual és: <b id="networkType">?</b>.</p>
            <p>El teu tipus de xarxa és: <b id="effectiveNetworkType">?</b>.</p>
            <p>Maxima velocitat de baixada: <b id="downlinkMax">?</b>.</p>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
                  color="green darken-1"
                  flat="flat"
                  @click="dialog = false"
          >
            Tancar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
    </span>
</template>

<script>
export default {
  name: 'Speed',
  data () {
    return {
      spee: false,
      dialog: false
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
