<template>
    <img :src="dataSrc" :alt="alt" :height="height">
</template>

<script>
import helpers from '../utils/helpers'
export default {
  data () {
    return {
      dataSrc: null
    }
  },
  props: {
    src: {
      type: String,
      required: true
    },
    alt: {
      type: String,
      required: false
    },
    altFormat: {
      type: String,
      required: false
    },
    height: {
      required: false
    }
  },
  methods: {
    alternateSrc () {
      if (this.altFormat) return helpers.changeExtension(this.src, this.altFormat)
      else return helpers.changeExtension(this.src, 'jpeg')
    }
  },
  async created () {
    if (await helpers.supportsWebp()) this.dataSrc = this.src
    else this.dataSrc = this.alternateSrc()
  }
}
</script>
