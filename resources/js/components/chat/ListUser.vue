<template>
    <v-list-tile
            :key="contact.title"
            avatar
            ripple
            @click="open = true"
            @mouseover="hover=true"
            @mouseout="hover=false"
            class="chat-item"
    >
        <v-list-tile-avatar>
            <img style="margin-left: 25%;height: 120%;width: 120%" :src="contact.avatar">
        </v-list-tile-avatar>

        <v-list-tile-content style="margin-left: 1%">
            <v-list-tile-title style="margin-top: -2%">{{ contact.title }}</v-list-tile-title>
            <v-list-tile-sub-title style="margin-top: 1%;">{{ contact.subtitle }}</v-list-tile-sub-title>
        </v-list-tile-content>

        <v-list-tile-action>
            <v-list-tile-action-text>{{ contact.action }}</v-list-tile-action-text>
            <v-list-tile-action style="margin-top: 22%;margin-right: -15px">
                <v-badge v-if="contact.msgcount>0" color="green accent-4" class="msg-count" :class="{'menu-display':open}">
                    <span slot="badge">{{ contact.msgcount }}</span>
                </v-badge>
            </v-list-tile-action>
            <div class="headline"></div>
            <span class="grey--text" :class="{'selected': hover || open}"></span>

            <v-menu offset-y @input="open=false" transition="slide-y-transition" color="grey">
                <v-card-actions slot="activator" icon>
                    <v-icon class="iconkey" :class="{'selected': hover || open}" @click="open=true" color="grey light-4" medium>keyboard_arrow_down</v-icon>
                </v-card-actions>
                <v-list class="pr-lg-5 pl-2">
                    <v-list-tile>
                        <v-list-tile-title>Arxivar xat</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-title>Silenciar</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-title>Esborrar Chat</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-title>Ancorar Chat</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-title>Marcar com a llegit</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-list-tile-action>
    </v-list-tile>
</template>
<script>
export default {
  name: 'listUser',
  data () {
    return {
      open: false,
      hover: false
    }
  },
  props: {
    contact: {
      type: Object,
      required: true
    }
  }
}
</script>
<style scoped>
    .iconkey {
        display: none;
        position: absolute;
        top: -16px;
        right: -10px;
    }
    .chat-item:hover .msg-count {
        transform: translateX(-20px);
    }
    .menu-display {
        transform: translateX(-20px);
    }
    .msg-count {
        position: absolute;
        right: 35px;
        transition-duration: 150ms;
    }
    .iconkey.selected {
        display: block;
        margin-left: 50%;
        color: lightgrey !important;
    }
</style>
