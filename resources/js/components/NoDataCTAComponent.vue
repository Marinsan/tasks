<template>

<v-flex class="text-xs-center">
        <img src="/img/tasks0.png" width="150" alt="">
        <h4 class="mt-4 mb-2 font-weight-thin headline">Ups! No tens cap tasca 😭, crean una per poder admnistrar millor el temps!</h4>
        <v-btn
                color="primary darken-1"
                class="justify-content-center"
                @click="emitCTA"
                round
        ><v-icon>add</v-icon> &nbsp; Nova Tasca</v-btn>
</v-flex>

</template>

<script>
import EventBus from './../eventBus'
export default {
  name: 'NoDataCTAComponent',
  props: ['img', 'btnText', 'mainText'],
  methods: {
    emitCTA () {
      EventBus.$emit('cta')
    }
  }
}
</script>