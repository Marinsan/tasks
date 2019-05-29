<template>
    <div class="mb-3 message message-contact" :class="{'message-right':owner,'message-left':!owner}">
        <v-dialog
            v-model="dialog"
            width="500"
        >
            <v-card
                class="shadow-lg">
                <v-toolbar color="teal" dark>
                    <v-icon @click="dialog = false">close</v-icon>
                    <v-toolbar-title>Grupos</v-toolbar-title>
                </v-toolbar>
                <div class="chat-search">
                    <v-btn flat icon class="ma-0" @click="resetForm()" v-if="searching || search != ''">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#4FC3F7" d="M20 11H7.8l5.6-5.6L12 4l-8 8 8 8 1.4-1.4L7.8 13H20v-2z"></path></svg>
                    </v-btn>
                    <v-btn flat icon v-else class="ma-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".3" d="M15.009 13.805h-.636l-.22-.219a5.184 5.184 0 0 0 1.256-3.386 5.207 5.207 0 1 0-5.207 5.208 5.183 5.183 0 0 0 3.385-1.255l.221.22v.635l4.004 3.999 1.194-1.195-3.997-4.007zm-4.808 0a3.605 3.605 0 1 1 0-7.21 3.605 3.605 0 0 1 0 7.21z"></path></svg>
                    </v-btn>
                    <label>
                        <input v-model="search"
                               @focus="searching = true"
                               @blur="searching = false"
                               class="search"
                               placeholder="Buscar grupos"/>
                    </label>
                </div>
                <template v-for="(channel, key) in getFilteredChannels">
                    <div class="channel" :key="key">
                        <div class="channel-avatar">
                            <img :src="channel.avatar" class="avatar">
                        </div>
                        <div class="channel-data">
                            <span class="channel-title">{{ channel.title }}</span>
                            <span class="channel-msg">{{ channel.members }}</span>
                        </div>
                    </div>
                </template>
            </v-card>
        </v-dialog>
        <span></span>
        <div class="message-in tail">
            <span class="tail-container"></span>
            <span class="tail-container highlight"></span>
            <div>
                <div role="">
                    <span dir="auto" class="message-author">Pepe Jeans</span>
                </div>
                <div class="message-body py-2 text-left">
                    <div>
                        <img class="contact-image mr-3" src="http://i.pravatar.cc/300?sadsdasadsad" />
                        <span class="contact-name">Bart Simpson</span>
                    </div>
                </div>
                <div class="message-time">
                    <div>
                        <span>16:32</span>
                    </div>
                </div>
            </div>
            <div class="contact-actions">
                <div class="action">
                    <span>Mensaje</span>
                </div>
                <div class="action" @click="showModal">
                    <span>Añadir a un grupo</span>
                </div>
            </div>
            <span></span>
        </div>
    </div>
</template>

<script>
export default {
  name: 'ContactMessage',
  methods: {
    showModal () {
      this.search = ''
      this.dialog = true
    },
    resetForm () {
      this.search = ''
      this.searching = false
    }
  },
  data () {
    return {
      dialog: false,
      search: '',
      channels: [
        { id: 1, title: 'Family', members: 'Pepe, James', avatar: 'http://i.pravatar.cc/300?sadsdasadsad' },
        { id: 2, title: 'Classes', members: 'John, Acacha, James, Bart', avatar: 'http://i.pravatar.cc/300?saregedsrea' },
        { id: 3, title: 'Scool', members: 'Pepe, Acacha, James', avatar: 'http://i.pravatar.cc/300?swegvrfg' }
      ],
      searching: false
    }
  },
  computed: {
    getFilteredChannels () {
      return this.channels.filter((item) => {
        if (item.title.toUpperCase().includes(this.search.toUpperCase()) || item.members.toUpperCase().includes(this.search.toUpperCase())) return true
        else return false
      })
    }
  },
  props: {
    owner: {
      type: Boolean
    }
  }
}
</script>

<style scoped>
    .message-contact {
        width: 30%;
        padding-left: .5rem;
    }
    .message-contact .contact-image{
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        height: 55px;
    }
    .message-contact .contact-name{
        font-weight: bold;
    }
    .message-contact .contact-actions{
        display: flex;
        border-top: 1px solid rgba(0, 0, 0, 0.06);
        margin-top: 8px;
        margin-bottom: -8px;
    }
    .message-contact .contact-actions .action{
        flex: 50%;
        color: #00a5f4;
        text-align: center;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .message-contact .contact-actions .action:hover{
        cursor: pointer;
    }
    .chat-search {
        background-color: #f8f8f8;
        box-sizing: border-box;
        -webkit-flex: none;
        flex: none;
        height: 49px;
        position: relative;
        transition: box-shadow 0.18s ease-out, background-color 0.25s ease-out;
        z-index: 100;
    }
    .chat-search label {
        -webkit-align-items: center;
        align-items: center;
        box-sizing: border-box;
        display: -webkit-flex;
        display: flex;
        height: 35px;
        position: absolute;
        top: 7px;
        left: 12px;
        padding-left: 65px;
        padding-right: 32px;
        right: 14px;
        background-color: #fff;
        border-radius: 18px;
    }
    .chat-search input.search {
        font-size: 18px;
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
    .chat-search button {
        height: 24px;
        position: absolute;
        top: 12px;
        width: 24px;
        z-index: 100;
        outline: none;
        border: 0;
        left: 24px;
        padding: 0;
        background: none;
        cursor: pointer;
        color: #999999;
    }
    .channel {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
        height: 72px;
        pointer-events: all;
        position: relative;
        cursor: pointer;
        background-color: white;
        -webkit-align-items: center;
        align-items: center;
    }
    .channel-avatar {
        padding: 0 15px 0 13px;
    }
    .avatar {
        width: 50px;
        height: 50px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }
    .channel-title {
        font-size: 17px;
        display: block;
    }
    .channel-msg {
        font-size: 14px;
        width: 315px;
    }
    .v-overlay::before{
        background: #a5a5a5;
    }
</style>
