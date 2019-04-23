<template>
    <span>
        <div class="text-xs-center">
             <h1 class="font-weight-bold mt-3">Big Buck Bunny</h1>

    <video class="mt-2" id="demovideo" src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" preload="auto" controls></video>

       <v-flex xs12 sm8 offset-sm2 mt-3 mb-5>
        <v-card>
            <v-card-title>
                <v-spacer></v-spacer>
      <v-btn outline fab small color="primary" @click="rewindVideo()" icon>
          <v-icon>fast_rewind</v-icon>
      </v-btn>
      <v-btn outline fab color="primary" @click="stopVideo()">
        <v-icon>stop</v-icon>
      </v-btn>

      <v-btn outline fab large color="primary" @click="playVideo()">
        <v-icon large>play_arrow</v-icon>
      </v-btn>

      <v-btn outline fab color="primary" @click="pauseVideo">
        <v-icon>pause</v-icon>
      </v-btn>

      <v-btn outline fab small color="primary" @click="forwardVideo()" icon>
          <v-icon>fast_forward</v-icon>
      </v-btn>

      <v-spacer></v-spacer>
                </v-card-title>

            <v-layout class="text-xs-center justify-center">


            <v-btn class="mt-3" flat icon @click="toggleMute">
        <template v-if="this.volume >= 0.1">
          <v-icon v-if="this.volume >= 0.5">volume_up</v-icon>
          <v-icon v-else-if="this.volume >= 0.2">volume_down</v-icon>
          <v-icon v-else>volume_mute</v-icon>
        </template>
         <template v-else>
             <v-icon>volume_off</v-icon>
        </template>

      </v-btn>
                <div>
      <v-slider class="volumen" v-model="volume" @input="updateVolume(volume)" max="1" step="0.1"></v-slider>
                </div>
                <a class="mt-4 ml-3">{{ this.volume * 100 + '%' }}</a>
                </v-layout>
    </v-card>
       </v-flex>

    <h1 class="font-weight-light mb-3">Back in black</h1>

    <audio id="demoaudio" src="https://upload.wikimedia.org/wikipedia/en/4/45/ACDC_-_Back_In_Black-sample.ogg" preload="auto" controls></audio>

    <div>
        <v-btn icon @click="rewindAudio"><v-icon>fast_rewind</v-icon></v-btn>
         <v-btn icon @click="stopAudio()"><v-icon>stop</v-icon></v-btn>
        <v-btn icon onclick="document.getElementById('demoaudio').play()"><v-icon>play_arrow</v-icon></v-btn>
        <v-btn icon onclick="document.getElementById('demoaudio').pause()"><v-icon>pause</v-icon></v-btn>
        <v-btn icon onclick="document.getElementById('demoaudio').volume+=0.1"><v-icon>volume_up</v-icon></v-btn>
        <v-btn icon onclick="document.getElementById('demoaudio').volume-=0.1"><v-icon>volume_down</v-icon></v-btn>
        <v-btn icon @click="forwardAudio"><v-icon>fast_forward</v-icon></v-btn>
    </div>


    </div>
    </span>

</template>

<script>
export default {
  name: 'Multimedia',
  data () {
    return {
      volume: 0.5,
      idVideo: 'demovideo',
      idAudio: 'demoaudio'
    }
  },
  methods: {
    forwardVideo () {
      var video = document.getElementById(this.idVideo)
      video.currentTime += +10
    },
    rewindVideo () {
      var video = document.getElementById(this.idVideo)
      video.currentTime += -10
    },
    stopVideo () {
      var video = document.getElementById(this.idVideo)
      video.currentTime += -9999999999
      video.pause()
    },
    playVideo () {
      document.getElementById(this.idVideo).play()
    },
    pauseVideo () {
      document.getElementById(this.idVideo).pause()
    },
    updateVolume () {
      var video = document.getElementById(this.idVideo)
      video.volume = this.volume
    },
    toggleMute () {
      var video = document.getElementById(this.idVideo)
      if (video.volume > 0) {
        video.volume -= video.volume
      } else {
        video.volume += 0.2
      }
    },
    forwardAudio () {
      var audio = document.getElementById(this.idAudio)
      audio.currentTime += +5
    },
    rewindAudio () {
      var audio = document.getElementById(this.idAudio)
      audio.currentTime += -5
    },
    stopAudio () {
      var audio = document.getElementById(this.idAudio)
      audio.currentTime += -9999999999
      audio.pause()
    }
  }
}
</script>

<style scoped>
    .volumen {
        width: 100%;
    }
</style>
