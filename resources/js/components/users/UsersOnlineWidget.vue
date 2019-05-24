<template>
    <v-menu offset-y>
        <v-badge slot="activator" left overlap color="error" class="ml-3 mr-2 mt-2">
            <span slot="badge" v-text="counter"></span>
            <v-btn icon color="white" :loading="loading" :disabled="loading">
                <v-icon color="primary">person</v-icon>
            </v-btn>
        </v-badge>
        <v-list>
            <v-list-tile v-if="counter > 0">
                <v-list-tile-title>
                    <span v-if="counter === 1">Hi ha {{ counter }} usuari connectat:</span>
                    <span v-else>Hi ha {{ counter }} usuaris connectats:</span>
                </v-list-tile-title>
            </v-list-tile>
            <v-divider v-if="counter > 0"></v-divider>
            <v-list-tile
                    v-for="(user) in users"
                    :key="user.id"
                    :href="'/users?id=' + user.id "
                    target="_blank"
            >
                <v-list-tile-avatar>
                    <v-avatar :title="user.name">
                        <v-img v-if="user.gravatar" :src="user.gravatar" alt="avatar"></v-img>
                        <v-img v-else src="https://www.gravatar.com/avatar/" alt="avatar"></v-img>
                    </v-avatar>
                </v-list-tile-avatar>
                <v-list-tile-content v-if="counter > 0">
                    <v-list-tile-title style="max-width: 450px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <v-tooltip bottom>
                            <span slot="activator">{{ user.name }}</span>
                            <span>{{ user.name }}</span>
                        </v-tooltip>
                    </v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-menu>
</template>

<script>
export default {
  name: 'UsersOnlineWidget',
  data () {
    return {
      loading: false,
      users: []
    }
  },
  props: {
    channel: {
      type: String,
      default: 'App.Counter'
    }
  },
  computed: {
    counter () {
      if (this.users) return this.users.length
      return 0
    }
  },
  mounted () {
    window.Echo.join(this.channel)
      .here((users) => {
        this.users = users
      })
      .joining((user) => {
        // TODO -> USER ALREADY EXISTS?
        if (!this.users.find(u => u.id === user.id)) this.users.push(user)
      })
      .leaving((user) => {
        this.users.splice(this.users.indexOf(user), 1)
      })
  }
}
</script>
