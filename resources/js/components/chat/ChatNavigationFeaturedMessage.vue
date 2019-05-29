<template>
    <v-navigation-drawer
            v-model="dataDrawer"
            fixed
            right
            clipped
            app>
        <v-toolbar color="primary"></v-toolbar>
        <v-toolbar flat color="primary">
            <v-tooltip>
            <v-btn icon slot="activator" @click.stop.prevent="drawerFeaturedMessage = !drawerFeaturedMessage">
                <v-icon class="icon_close">arrow_back</v-icon>
            </v-btn>
            <span>Sortir</span>
            </v-tooltip>
            <v-toolbar-title class="subheading">Missatges destacats</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-menu bottom left offset-y>
                <template v-slot:activator="{ on }">
                    <v-tooltip bottom>
                        <v-btn icon slot="activator" v-on="on">
                            <v-icon>more_vert</v-icon>
                        </v-btn>
                        <span>Menú</span>
                    </v-tooltip>
                </template>
                <v-list>
                    <v-list-tile>
                        <v-list-tile-title>No destacar cap</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-toolbar>

        <v-layout justify-center>
        <p class="font-weight-light mt-5">No hi ha missatges destacats</p>
        </v-layout>
    </v-navigation-drawer>
</template>

<script>
export default {
  name: 'ChatNavigationFeaturedMessage',
  data () {
    return {
      dataDrawer: this.drawerFeaturedMessage,
      iconIndex: 0,
      loading: false,
      icons: [
        'search',
        'arrow_back'
      ]
    }
  },
  props: {
    drawerFeaturedMessage: {
      Type: Boolean,
      default: null
    }
  },
  watch: {
    dataDrawer (drawer) {
      this.$emit('input', drawer)
    },
    drawerFeaturedMessage (drawer) {
      this.dataDrawer = drawer
    }
  },
  model: {
    prop: 'drawerFeaturedMessage',
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

</style>
