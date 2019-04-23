<template>
    <v-text-field
            label="Solo"
            placeholder="Nou missatge"
            solo
            @keyup.enter="save"
            v-model="message"
            :loading="loading"
            :disabled="loading"
    ></v-text-field>
</template>

<script>
export default {
  name: 'ChatMessageAdd',
  data () {
    return {
      message: '',
      loading: false
    }
  },
  props: {
    channel: {
      type: Object,
      required: true
    }
  },
  methods: {
    save () {
      this.loading = true
      if (this.channel) {
        window.axios.post('/api/v1/channel/' + this.channel.id + '/messages', {
          'text': this.message
        }).then((response) => {
          this.loading = false
          this.$emit('added', response.data)
          this.message = ''
        }).catch(() => {
          this.loading = false
        })
      }
    }
  }
}
</script>
