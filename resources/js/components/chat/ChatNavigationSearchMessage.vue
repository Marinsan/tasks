<template>
    <v-navigation-drawer
            v-model="dataDrawer"
            fixed
            right
            clipped
            app>
        <v-list class="pa-1">
            <v-list-tile>

                    <v-btn icon @click.stop="drawerSearchMessage = !drawerSearchMessage">
                        <v-icon>close</v-icon>
                    </v-btn>
                    <v-list-tile class="headline">Buscar missatge</v-list-tile>

            </v-list-tile>
        </v-list>

        <v-list class="pt-0" dense>
            <v-divider></v-divider>

            <v-list-tile>
                <v-list-tile-action>
                    <v-icon>search</v-icon>
                </v-list-tile-action>

                <v-list-tile-content>
                    <v-list-tile-title>Prova</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
  name: 'ChatNavigationSearchMessage',
  data () {
    return {
      dialog: false,
      dataDrawer: this.drawerSearchMessage
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
  }
}
</script>

<style scoped>

</style>
