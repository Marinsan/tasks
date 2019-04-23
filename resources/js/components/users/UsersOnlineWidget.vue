<template>
    <v-menu offset-y>
        <v-badge slot="activator" left overlap color="error" class="ml-3 mr-2">
            <span slot="badge" v-text="counter"></span>
            <v-btn icon color="white" :loading="loading" :disabled="loading">
                <v-icon color="primary">person</v-icon>
            </v-btn>
        </v-badge>
        <v-list>
            TODO
        </v-list>
    </v-menu>
</template>

<script>
export default {
  name: 'UsersOnlineWidget',
  data () {
    return {
      loading: false,
      counter: 0,
      users: []
    }
  },
  props: {
    channel: {
      type: String,
      default: 'App.counter'
    }
  },
  created () {
    window.Echo.join(this.channel)
      .here((users) => { this.count = users.length })
      .joining(user => this.count++)
      .leaving(user => this.count--)
  }
}
</script>

<style scoped>
