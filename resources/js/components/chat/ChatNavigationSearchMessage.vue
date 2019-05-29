<template>
    <v-navigation-drawer
            v-model="dataDrawer"
            fixed
            right
            clipped
            app>
        <v-toolbar flat color="primary">
            <v-btn icon @click.stop.prevent="drawerSearchMessage = !drawerSearchMessage">
                <v-icon class="icon_close">close</v-icon>
            </v-btn>
            <v-toolbar-title class="subheading">Buscar missatge</v-toolbar-title>
        </v-toolbar>



         <v-text-field
                placeholder="Buscar..."
                type="text"
                solo
                light
                clearable
               :prepend-inner-icon="icon"
                @click:prepend-inner="changeIcon"
                @click="changeIcon"
                class="pepe"

         >
            <template v-slot:append>
                <v-fade-transition leave-absolute>
                    <v-progress-circular
                            v-if="loading"
                            size="24"
                            color="info"
                            indeterminate
                    ></v-progress-circular>
                </v-fade-transition>
            </template>
        </v-text-field>

        <v-layout justify-center>
        <p class="font-weight-light">Buscar missatges amb Channel X</p>
        </v-layout>
    </v-navigation-drawer>
</template>

<script>
export default {
  name: 'ChatNavigationSearchMessage',
  data () {
    return {
      dataDrawer: this.drawerSearchMessage,
      iconIndex: 0,
      loading: false,
      icons: [
        'search',
        'arrow_back'
      ]
    }
  },
  props: {
    drawerSearchMessage: {
      Type: Boolean,
      default: null
    }
  },
  watch: {
    dataDrawer (drawer) {
      this.$emit('input', drawer)
    },
    drawerSearchMessage (drawer) {
      this.dataDrawer = drawer
    }
  },
  model: {
    prop: 'drawerSearchMessage',
    event: 'input'
  },
  computed: {
    icon () {
      return this.icons[this.iconIndex]
    }
  },
  methods: {
    resetIcon () {
      this.iconIndex = 0
    },
    changeIcon () {
      this.iconIndex === this.icons.length - 1
        ? this.iconIndex = 0
        : this.iconIndex++
    }
  }
}
</script>

<style scoped>
    .pepe {
        border-radius: 50px;
    }
</style>
