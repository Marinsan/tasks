<template>
    <div class="mb-3 message chat-multimedia-dialog" :class="{'message-right':owner,'message-left':!owner}">
        <v-dialog
            v-model="dialog"
            @keydown.esc="dialog = false"
            fullscreen
            transition="fade-transition"
        >
            <v-card flat>
                <v-layout justify-center align-start row class="mx-0">
                    <v-flex xs12>
                        <v-toolbar class="bg-white elevation-0">
                            <v-spacer></v-spacer>
                            <v-btn class="my-0 mx-2" flat icon>
                                <v-icon>chat_bubble_outline</v-icon>
                            </v-btn>
                            <v-btn class="my-0 mx-2" flat icon>
                                <v-icon>star</v-icon>
                            </v-btn>
                            <v-btn class="my-0 mx-2" flat icon>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" clip-rule="evenodd" fill="#263238" d="M14.278 4.813c0-.723.873-1.085 1.383-.574l6.045 6.051a.81.81 0 0 1 0 1.146l-6.045 6.051a.81.81 0 0 1-1.383-.574v-2.732c-5.096 0-8.829 1.455-11.604 4.611-.246.279-.702.042-.602-.316 1.43-5.173 4.925-10.004 12.206-11.045V4.813z"></path></svg>
                            </v-btn>
                            <v-btn class="my-0 mx-2" target="_blank" :href="src" tag="a" download flat icon>
                                <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" d="M18.9 10.3h-4V4.4H9v5.9H5l6.9 6.9 7-6.9zM5.1 19.2v2H19v-2H5.1z"></path></svg>
                            </v-btn>
                            <v-btn @click="dialog = false" flat icon class="my-0 mx-2">
                                <v-icon>close</v-icon>
                            </v-btn>
                        </v-toolbar>
                    </v-flex>
                </v-layout>
                <v-layout justify-center align-start row class="mx-0">
                    <v-flex xs12 class="bg-white h-100">
                        <v-carousel
                            hide-delimiters
                            class="shadow-none mt-5"
                        >
                            <v-carousel-item>
                                <img height="100%" style="display: flex;" class="mx-auto" width="auto" :src="src"/>
                            </v-carousel-item>
                        </v-carousel>
                    </v-flex>
                </v-layout>
            </v-card>
        </v-dialog>
        <span></span>
        <div class="message-in message-image tail">
            <span class="tail-container"></span>
            <span class="tail-container highlight"></span>
            <div>
                <div role="">
                    <span dir="auto" class="message-author">Pepe Jeans</span>
                </div>
                <div class="message-body py-2 text-left">
                    <div>
                        <img @click="dialog = true" :src="src" />
                    </div>
                </div>
                <div class="message-time">
                    <div>
                        <span>16:32</span>
                    </div>
                </div>
            </div>
            <span></span>
        </div>
    </div>
</template>

<script>
export default {
  name: 'ImageMessage',
  data () {
    return {
      dialog: false
    }
  },
  props: {
    owner: {
      type: Boolean
    },
    src: {
      type: String
    }
  }
}
</script>

<style scoped>
    .message-image .message-body{
        text-align: center;
    }
    .message-image .message-time{
        color: #fff;
        z-index: 4;
    }
    .message-image .message-time{
        position: absolute;
        right: 10px;
    }
    .message-image img{
        width: 114%;
        margin: -10px -5px -12px -6px;
    }
    .message-image img:hover{
        cursor: pointer;
    }
    .current-img{
        height: 100%;
        width: 50px;
    }
</style>
