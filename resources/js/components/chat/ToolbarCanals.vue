<template>
    <span>
    <v-toolbar color="primary">
        <v-avatar size="52px" @click.stop="$emit('toggleDrawer')">
                <img :src=user.gravatar alt="avatar">
        </v-avatar>
        <v-toolbar-title>Channels</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-tooltip bottom>
            <v-btn icon slot="activator" @click="chatDrawer=!chatDrawer">
                <v-icon>turned_in_not</v-icon>
            </v-btn>
            <span>Nova conversació</span>
        </v-tooltip>
        <menu-canals></menu-canals>
    </v-toolbar>
        <new-chat-drawer :value="chatDrawer" @close="chatDrawer = false"></new-chat-drawer>
    </span>
</template>

<script>
import MenuCanals from './MenuCanals'
import NewChatDrawer from './NewChatDrawer'
import ProfileDrawer from './ProfileDrawer'
export default {
  name: 'ToolbarCanals',
  data () {
    return {
      chatDrawer: false,

      profileDrawer: false,
    }
  },
  props: {

    user: {
      type: Object,
      required: false

    }
  },
  components: {
    'menu-canals': MenuCanals,
    'new-chat-drawer': NewChatDrawer,
    'profile-drawer': ProfileDrawer
  }
}
</script>

<style scoped>

</style>
