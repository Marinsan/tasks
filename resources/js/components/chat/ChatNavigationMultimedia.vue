<template>
    <v-navigation-drawer
            v-model="dataDrawer"
            fixed
            right
            clipped
            app>
        <v-toolbar flat class="transparent" color="primary">
            <v-toolbar-title>
                <v-tooltip>
                <v-btn slot="activator" @click.stop.prevent="drawerNavigationMultimedia = !drawerNavigationMultimedia" icon>
                    <v-icon>arrow_back</v-icon>
                </v-btn>
                <span>Sortir</span>
            </v-tooltip>
            </v-toolbar-title>

            <template v-slot:extension>
                <v-tabs v-model="tab" centered color="primary">
                    <v-tabs-slider color="yellow"></v-tabs-slider>

                    <v-tab
                            v-for="item in items"
                            :key="item.title"
                    >
                        {{ item.title }}
                    </v-tab>
                </v-tabs>
            </template>        </v-toolbar>

        <v-tabs-items v-model="tab">
            <v-tab-item
                    v-for="ite in items"
                    :key="ite.text"
            >
                <v-card flat>
                    <v-card-text v-html="ite.text"></v-card-text>
                    <v-content v-if="ite.img">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
                        <img class="images ml-1 mt-2" :src="ite.img" alt="">
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
          text: '<p class="text-xs-center mt-5">Sense documents</p>'
        },
        {
          title: 'Enllaços',
          text: '<p class="text-xs-center mt-5">Sense enllaços</p>',

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
        width: 70px;
        height: 70px;
    }
</style>
