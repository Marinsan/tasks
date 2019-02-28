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
              :loading="batter"
      >
         Revisa la teva bateria!&nbsp; 🔋
      </v-btn>

      <v-card>
        <v-card-title
                class="headline grey lighten-2"
                primary-title
        >
          Estat de la bateria
        </v-card-title>

        <v-card-text class="text-xs-center">

    <p>Estat bateria <b id="charging">unknown</b>&nbsp; 🔋</p>
    <p>Temps per carregar <b id="chargingTime">unknown</b> &nbsp;🔌 </p>
    <p>Temps per descarregar <b id="dischargingTime">unknown</b>&nbsp; ⏳</p>
    <p>Nivell bateria <b id="level">unknown</b></p>
    <p class="font-italic font-weight-light"> Nivell 1 = 100%</p>

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
export default {
  name: 'Battery',
  data () {
    return {
      batter: false,
      dialog: false
    }
  },
  methods: {
    show () {
      if ('getBattery' in navigator || ('battery' in navigator && 'Promise' in window)) {
        var target = document.getElementById('target')

        function handleChange (change) {
          var timeBadge = new Date().toTimeString().split(' ')[0]
          var newState = document.createElement('p')
          newState.innerHTML = '<span class="badge">' + timeBadge + '</span> ' + change + '.'
          target.appendChild(newState)
        }

        function onChargingChange () {
          handleChange('Battery charging changed to <b>' + (this.charging ? 'carregant' : 'descarregant') + '</b>')
        }
        function onChargingTimeChange () {
          handleChange('Battery charging time changed to <b>' + this.chargingTime + ' s</b>')
        }
        function onDischargingTimeChange () {
          handleChange('Battery discharging time changed to <b>' + this.dischargingTime + ' s</b>')
        }
        function onLevelChange () {
          handleChange('Battery level changed to <b>' + this.level + '</b>')
        }

        var batteryPromise

        if ('getBattery' in navigator) {
          batteryPromise = navigator.getBattery()
        } else {
          batteryPromise = Promise.resolve(navigator.battery)
        }

        batteryPromise.then(function (battery) {
          document.getElementById('charging').innerHTML = battery.charging ? 'carregant' : 'descarregant'
          document.getElementById('chargingTime').innerHTML = battery.chargingTime + ' s'
          document.getElementById('dischargingTime').innerHTML = battery.dischargingTime + ' s'
          document.getElementById('level').innerHTML = battery.level

          battery.addEventListener('chargingchange', onChargingChange)
          battery.addEventListener('chargingtimechange', onChargingTimeChange)
          battery.addEventListener('dischargingtimechange', onDischargingTimeChange)
          battery.addEventListener('levelchange', onLevelChange)
        })
      }
    }
  }
}
</script>

<style scoped>

</style>
