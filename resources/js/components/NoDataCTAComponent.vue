<template>

<v-flex class="text-xs-center">
        <img src="/img/icons/logo_192x192.png" alt="">
        <h4 class="mt-4 mb-2 font-weight-thin headline text-xs-center">Ups! No tens cap tasca</h4>
        <v-btn
                color="primary darken-1"
                class="justify-content-center"
                @click="emitCTA"
        ><v-icon>add</v-icon>Nova Tasca</v-btn>
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