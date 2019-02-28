<template>
    <span>
        <div>
        <p class="font-weight-bold subheading">Posició dispositiu<v-btn icon @click="show" :loading="po"> <v-icon>cached</v-icon></v-btn></p>
        <p class="font-weight-light font-italic">Actualitza si no obtens la posició correctament</p>
        </div>
        <div id="device"></div>
        <p>La teva orientació és <b id="orientationType">unknown</b>.</p>
        <p>
            <button class="btn btn-default" id="lock">Lock in current orientation</button>
            <button class="btn btn-default" id="unlock">Release the lock</button>
        </p>
        <p class="font-italic font-weight-light" id="logTarget"></p>
        </span>
</template>

<script>
export default {
  name: 'ScreenOL',
  data () {
    return {
      po: false
    }
  },
  methods: {
    show () {
      var $ = document.getElementById.bind(document)

      var orientKey = 'orientation'
      if ('mozOrientation' in screen) {
        orientKey = 'mozOrientation'
      } else if ('msOrientation' in screen) {
        orientKey = 'msOrientation'
      }

      var target = $('logTarget')
      var device = $('device')
      var orientationTypeLabel = $('orientationType')

      function logChange (event) {
        var timeBadge = new Date().toTimeString().split(' ')[0]
        var newState = document.createElement('p')
        newState.innerHTML = '<span class="badge">' + timeBadge + '</span> ' + event + '.'
        target.appendChild(newState)
      }

      if (screen[orientKey]) {
        function update () {
          var type = screen[orientKey].type || screen[orientKey]
          orientationTypeLabel.innerHTML = type

          var landscape = type.indexOf('landscape') !== -1

          if (landscape) {
            device.style.width = '180px'
            device.style.height = '100px'
          } else {
            device.style.width = '100px'
            device.style.height = '180px'
          }

          var rotate = type.indexOf('secondary') === -1 ? 0 : 180
          var rotateStr = 'rotate(' + rotate + 'deg)'

          device.style.webkitTransform = rotateStr
          device.style.MozTransform = rotateStr
          device.style.transform = rotateStr
        }

        update()

        var onOrientationChange = null

        if ('onchange' in screen[orientKey]) { // newer API
          onOrientationChange = function () {
            logChange('Orientation changed to <b>' + screen[orientKey].type + '</b>')
            update()
          }

          screen[orientKey].addEventListener('change', onOrientationChange)
        } else if ('onorientationchange' in screen) { // older API
          onOrientationChange = function () {
            logChange('Orientation changed to <b>' + screen[orientKey] + '</b>')
            update()
          }

          screen.addEventListener('orientationchange', onOrientationChange)
        }

        // browsers require full screen mode in order to obtain the orientation lock
        var goFullScreen = null
        var exitFullScreen = null
        if ('requestFullscreen' in document.documentElement) {
          goFullScreen = 'requestFullscreen'
          exitFullScreen = 'exitFullscreen'
        } else if ('mozRequestFullScreen' in document.documentElement) {
          goFullScreen = 'mozRequestFullScreen'
          exitFullScreen = 'mozCancelFullScreen'
        } else if ('webkitRequestFullscreen' in document.documentElement) {
          goFullScreen = 'webkitRequestFullscreen'
          exitFullScreen = 'webkitExitFullscreen'
        } else if ('msRequestFullscreen') {
          goFullScreen = 'msRequestFullscreen'
          exitFullScreen = 'msExitFullscreen'
        }

        $('lock').addEventListener('click', function () {
          document.documentElement[goFullScreen] && document.documentElement[goFullScreen]()

          var promise = null
          if (screen[orientKey].lock) {
            promise = screen[orientKey].lock(screen[orientKey].type)
          } else {

            promise = screen.orientationLock(screen[orientKey])
          }

          promise
            .then(function () {
              logChange('Screen lock acquired')
              $('unlock').style.display = 'block'
              $('lock').style.display = 'none'
            })
            .catch(function (err) {
              logChange('Cannot acquire orientation lock: ' + err)
              document[exitFullScreen] && document[exitFullScreen]()
            })
        })

        $('unlock').addEventListener('click', function () {
          document[exitFullScreen] && document[exitFullScreen]()

          if (screen[orientKey].unlock) {
            screen[orientKey].unlock()
          } else {
            screen.orientationUnlock()
          }

          logChange('Screen lock removed.')
          $('unlock').style.display = 'none'
          $('lock').style.display = 'block'

        })
      }
    }
  }
}
</script>

<style scoped>
    #device {
        margin: 10px;
        border: 1px solid black;
        border-radius: 10px;
    }

    #device:after {
        content: 'A';
        font: 80px serif;
        display: block;
        text-align: center;
    }

    #unlock {
        display: none;
    }
</style>
