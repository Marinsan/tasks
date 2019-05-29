<template>
    <v-layout class="chat-new-msg">
        <v-flex xs1>
            <emoji @input="addEmoji"></emoji>

        </v-flex>
        <v-flex xs10>
            <div>
                <label class="m-2">
                    <input @keyup.enter="save" v-model="message" type="text" class="search" width="100%"
                           placeholder="Escribe un mensaje aquí">
                </label>
                <v-btn icon class="mic">
                    <v-icon>mic</v-icon>
                </v-btn>
            </div>
        </v-flex>
    </v-layout>
</template>
<script>
  import Emoji from './Emoji'

  export default {
    name: 'ChatMessageAdd',
    components: {Emoji},
    data() {
      return {
        message: '',
        loading: false
      }
    },
    methods: {
      save() {
        this.loading = true
        this.$emit('added', this.message)
        this.loading = false
        this.message = ''
      },
      addEmoji(emoji) {
        this.message = this.message + emoji
      }
    }
  }
</script>
<style scoped>
    .mic {
        position: relative;
        left: -10px;
    }

    .chat-new-msg {
        background-color: #EEEEEE;
        padding: 1px;
    }

    .chat-new-msg label {
        -webkit-align-items: center;
        align-items: center;
        box-sizing: border-box;
        display: inline-flex;
        height: 35px;
        top: 7px;
        left: 12px;
        margin-left: 65px;
        padding-left: 10px;
        padding-right: 0%;
        width: 92%;
        right: 14px;
        background-color: #fff;
        border-radius: 18px;
    }

    .chat-new-msg input.search {
        font-size: 15px;
        font-weight: normal;
        line-height: 20px;
        min-height: 20px;
        outline: none;
        -webkit-user-select: text;
        -moz-user-select: text;
        -ms-user-select: text;
        user-select: text;
        width: 100%;
        z-index: 1;
        border: none;
        padding: 0;
    }
</style>
