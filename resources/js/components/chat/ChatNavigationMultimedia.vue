<template>
    <v-navigation-drawer
            v-model="dataDrawer"
            fixed
            right
            clipped
            app>
        <v-toolbar flat class="transparent">
            <v-toolbar-title>
                <v-tooltip>
                <v-btn slot="activator" @click.stop="drawerNavigationMultimedia = !drawerNavigationMultimedia" icon>
                    <v-icon>arrow_back</v-icon>
                </v-btn>
                <span>Sortir</span>
            </v-tooltip>
            </v-toolbar-title>

            <template v-slot:extension>
                <v-tabs v-model="tab" centered>
                    <v-tabs-slider color="yellow"></v-tabs-slider>

                    <v-tab
                            v-for="item in items"
                            :key="item"
                    >
                        {{ item.title }}
                    </v-tab>
                </v-tabs>
            </template>        </v-toolbar>

        <v-tabs-items v-model="tab">
            <v-tab-item
                    v-for="ite in items"
                    :key="ite"
            >
                <v-card flat>
                    <v-card-text>{{ ite.text }}</v-card-text>
                    <v-content v-if="ite.img">
                        <img class="images ml-2" :src="ite.img" alt="">
                    </v-content>
                </v-card>
            </v-tab-item>
        </v-tabs-items>

    </v-navigation-drawer>
</template>

<script>
export default {
  name: 'ChatNavigationMultimedia',
  data () {
    return {
      tab: null,
      items: [
        {
          title: 'Arxius',
          text: '',
          img: 'https://picsum.photos/200/300/?random'
        },
        {
          title: 'Documents',
          text: 'Sergi Baucells, Cristian Marin...'
        },
        {
          title: 'Enllaços',
          text: 'Sergi Baucells, Cristian Marin...',

        }
      ],
      dataDrawer: this.drawerNavigationMultimedia
    }
  },
  props: {
    drawerNavigationMultimedia: {
      Type: Boolean,
      default: null
    }
  },
  watch: {
    dataDrawer (drawer) {
      this.$emit('input', drawer)
    },
    drawerNavigationMultimedia (drawer) {
      this.dataDrawer = drawer
    }
  },
  model: {
    prop: 'drawerNavigationMultimedia',
    event: 'input'
  }
}
</script>

<style scoped>
    .images {
        width: 85px;
        height: 85px;
    }
</style>
