<template>


    <v-tooltip top>
        <v-btn
                v-if="show"
                slot="activator"
                color="accent"
                @click="share"
                dark
                icon
                flat
        >
        <span v-if="menu">
        <v-icon>share</v-icon>
            </span>
        </v-btn>
        <span>Compartir la tasca</span>
    </v-tooltip>
</template>

<script>
export default {
  name: 'ShareTask',
  data () {
    return {
      dataTitle: this.title,
      dataText: this.text,
      dataUrl: this.url
    }
  },

  props: {
    task: {
      type: Object,
      required: true
    },
    menu: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    show () {
      return ('share' in navigator)
    }
  },
  methods: {
    share () {
      navigator.share({
        title: 'Tasca ' + this.task.name,
        text: this.task.description,
        url: 'https://tasks.marinsan.scool.cat/tasques/' + this.task.id
      })
        .then(() => console.log('Successful share'))
        .catch(error => console.log('Error sharing:', error))
    }
  }
}
</script>
