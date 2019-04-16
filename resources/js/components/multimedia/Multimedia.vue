<template>
    <span>
        <div class="text-xs-center">
    <video class="mt-4" id="demovideo" src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" preload="auto" controls></video>

    <!--<div>-->
        <!--<v-btn onclick="document.getElementById('demovideo').volume+=0.1">Aumentar el Volumen</v-btn>-->
        <!--<v-btn onclick="document.getElementById('demovideo').volume-=0.1">Disminuir el Volumen</v-btn>-->
    <!--</div>-->

       <v-flex xs12 sm8 offset-sm2 mt-3 mb-5>
        <v-card>
            <v-card-title>

                    <!--<v-btn icon @click="mute()">-->
                         <!--<template>-->
                        <!--<v-icon v-if="mute > 0.1" color="primary">volume_up</v-icon>-->
                        <!--<v-icon v-else color="primary">volume_off</v-icon>-->
                         <!--</template>-->
                    <!--</v-btn>-->
                <!--<div>-->
            <!--<v-slider v-model="volume" @input="updateVolume(volume)" max="1" step="0.1"></v-slider> <a>{{this.volume * 100 + ' %'}}</a>-->
                <!--</div>-->

                <v-btn flat icon @click="toggleMute">
        <template v-if="!this.muted">
          <v-icon v-if="this.volume >= 0.5">volume_up</v-icon>
          <v-icon v-else-if="this.volume > 0">volume_down</v-icon>
          <v-icon v-else>volume_mute</v-icon>
        </template>
        <v-icon v-show="this.muted">volume_off</v-icon>
      </v-btn>
      <v-slider v-model="volume" @input="updateVolume(volume)" max="1" step="0.1"></v-slider>
      {{ this.volume * 100 + '%' }}

                &nbsp;
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
    </v-card>
       </v-flex>

    <div class="test">Back in black:</div>

    <audio id="demo" src="https://upload.wikimedia.org/wikipedia/en/4/45/ACDC_-_Back_In_Black-sample.ogg" preload="auto" controls></audio>

    <div>
        <button onclick="document.getElementById('demo').play()">Reproducir el Audio</button>
        <button onclick="document.getElementById('demo').pause()">Pausar el Audio</button>
        <button onclick="document.getElementById('demo').volume+=0.1">Aumentar el Volumen</button>
        <button onclick="document.getElementById('demo').volume-=0.1">Disminuir el Volumen</button>
    </div>

    <div class="test">Audio Another day in paradise:</div>

    <audio id="demo2" src="https://upload.wikimedia.org/wikipedia/en/9/9f/Sample_of_%22Another_Day_in_Paradise%22.ogg" preload="auto" controls></audio>

    <div>
        <button onclick="document.getElementById('demo2').play()">Reproducir el Audio</button>
        <button onclick="document.getElementById('demo2').pause()">Pausar el Audio</button>
        <button onclick="document.getElementById('demo2').volume+=0.1">Aumentar el Volumen</button>
        <button onclick="document.getElementById('demo2').volume-=0.1">Disminuir el Volumen</button>
    </div>

    <div class="test">Audio Bullet in the head:</div>

    <audio id="demo3" src="https://upload.wikimedia.org/wikipedia/en/1/17/Bullet_In_The_Head.ogg" preload="auto" controls></audio>

    <div>
        <button onclick="document.getElementById('demo3').play()">Reproducir el Audio</button>
        <button onclick="document.getElementById('demo3').pause()">Pausar el Audio</button>
        <button onclick="document.getElementById('demo3').volume+=0.1">Aumentar el Volumen</button>
        <button onclick="document.getElementById('demo3').volume-=0.1">Disminuir el Volumen</button>
    </div>

    <a href="https://developer.mozilla.org/es/docs/Web/HTML/Usando_audio_y_video_con_HTML5">Més info</a>
    </div>
    </span>

</template>

<script>
export default {
  name: 'Multimedia',
  data () {
    return {
      volume: 0.5,
      muted: false
    }
  },
  created: function () {
    Howler.volume(this.volume)
  },
  methods: {
    forwardVideo () {
      var video = document.getElementById('demovideo')
      video.currentTime += +10
    },
    rewindVideo () {
      var video = document.getElementById('demovideo')
      video.currentTime += -10
    },
    stopVideo () {
      var video = document.getElementById('demovideo')
      video.currentTime += -9999999999
      video.pause()
    },
    playVideo () {
      document.getElementById('demovideo').play()
    },
    pauseVideo () {
      document.getElementById('demovideo').pause()
    },
    updateVolume (volume) {
      Howler.volume(volume)
    },
    toggleMute () {
      Howler.mute(!this.muted)
      this.muted = !this.muted
    },
    mute () {
      var video = document.getElementById('demovideo')
      video.volume += -1
    },
    noMute () {
      var video = document.getElementById('demovideo')
      video.volume += 0.2
    }
  }
}
</script>

<style scoped>
    .volumen {
        width: 100px;
    }
</style>
