<template>
    <v-btn
            v-if="show()"
            v-model="fab"
            color="accent"
            dark
            fab
            fixed
            bottom
            right
            large
            @click="share"
            :loading="share_loading"
    >
        <v-icon>share</v-icon>
    </v-btn>
</template>

<script>
export default {
  name: 'ShareFab',
  data () {
    return {
      fab: false,
      share_loading: false
    }
  },
  methods: {
    show () {
      if (('share' in navigator)) return true
      return false
    },
    share () {
      if (!('share' in navigator)) {
        this.share_loading = true
        return
      }
      navigator.share({
        title: "App Tasques de Cristian Marin Tejeda, alumne de DAM",
        text: "Aplicació oberta a tot el qui vulgui probarla!",
        url: 'https://tasks.marinsan.scool.cat'
      })
        this.share_loading = false
        .then(() => console.log('Successful share'))
        .catch(error => console.log('Error sharing:', error))
    }
  }
}
</script>
