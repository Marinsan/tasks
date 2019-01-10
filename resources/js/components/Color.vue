<template>
    <span>
        <div class="text-xs-center">
  <h4>Principal:</h4> <swatches v-model="colorPrincipal"></swatches>
  <h4>Secundari:</h4> <swatches v-model="colorSecundari"></swatches>
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
    },
    colorSecundari () {
      window.localStorage.setItem('SECONDARY_COLOR_KEY', this.colorSecundari)
    }
  }
}
</script>