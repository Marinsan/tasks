<template>
<span>
    <p class="font-weight-bold text-xs-center mt-5 headline">Press any button for play!</p>
    <div id="ball"></div>
</span>
</template>

<script>
var ball
export default {
  name: 'Gamepad',
  data () {
    return {
      gamepads: []
    }
  },
  methods: {
    updateLoop () {
      var gp = navigator.getGamepads()[0]
      var left = (gp.axes[0] + 1) / 2 * (window.innerWidth - ball.offsetWidth)
      var right = (gp.axes[1] + 1) / 2 * (window.innerHeight - ball.offsetHeight)

      ball.style.left = left + 'px'
      ball.style.top = right + 'px'

      if (gp.buttons[0].pressed) {
        document.body.style.backgroundColor = 'red'
      } else {
        document.body.style.backgroundColor = 'white'
      }

      requestAnimationFrame(this.updateLoop)
    }
  },
  mounted () {
    window.addEventListener('gamepadconnected', (e) => {
      ball = document.getElementById('ball')
      ball.style.backgroundColor = 'green'
      document.getElementsByTagName('p')[0].innerHTML = e.gamepad.id
      this.updateLoop()
    }, false)
  }
}
</script>

<style scoped>
    #ball {
        position: absolute;
        left: calc(50vw - 25px);
        top: calc(50vh - 25px);
        background-color: red;
        width: 50px;
        height: 50px;
        border-radius: 25px;
    }
</style>
