<template>
    <v-container fluid class="ma-0 pa-0">
        <v-layout row wrap>
            <v-flex sm12 md3>
                <chat-channels :channels="channels" v-model="channel"></chat-channels>
            </v-flex>
            <v-flex sm12 md9>
                <chat-channel :channel="channel"></chat-channel>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import ChatChannels from './ChatChannels'
import ChatChannel from './ChatChannel'
export default {
  name: 'Chat',
  components: {
    'chat-channels': ChatChannels,
    'chat-channel': ChatChannel
  },
  data () {
    return {
      channel: null
    }
  },
  props: {
    channels: {
      type: Array,
      required: true
    }
  }
}
</script>
