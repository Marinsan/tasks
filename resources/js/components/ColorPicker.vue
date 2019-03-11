<template>
    <span>
        <div class="text-xs-center">

        <v-chip color="primary" text-color="white">Primary</v-chip>
                <swatches v-model="colorPrincipal"></swatches>

        <v-chip color="secondary" text-color="white">Secondary</v-chip>
                <swatches v-model="colorSecundari"></swatches>

        </div>
    </span>
</template>

<script>
import Swatches from 'vue-swatches'
// Import the styles too, globally
import 'vue-swatches/dist/vue-swatches.min.css'
export default {
  name: 'Color',
  components: { Swatches },
  data () {
    return {
      colorPrincipal: window.localStorage.getItem('PRIMARY_COLOR_KEY'),
      colorSecundari: window.localStorage.getItem('SECONDARY_COLOR_KEY')
    }
  },
  watch: {
    colorPrincipal () {
      window.localStorage.setItem('PRIMARY_COLOR_KEY', this.colorPrincipal)

      this.$vuetify.theme.primary = this.colorPrincipal
    },
    colorSecundari () {
      window.localStorage.setItem('SECONDARY_COLOR_KEY', this.colorSecundari)
      this.$vuetify.theme.secondary = this.colorSecundari
    }
  }
}
</script>
