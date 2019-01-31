<template>
    <v-navigation-drawer
            style="background: url(../img/snackbar.jpg)"
            v-model="dataDrawer"
            fixed
            app
            clipped
    >
        <v-list dense>
            <template v-for="item in items">
                <v-layout
                        v-if="item.heading"
                        :key="item.heading"
                        row
                        align-center
                >
                    <v-flex xs6>
                        <v-subheader v-if="item.heading">
                            {{ item.heading }}
                        </v-subheader>
                    </v-flex>
                    <v-flex xs6 class="text-xs-center">
                        <a href="#!" class="body-2 black--text">EDIT</a>
                    </v-flex>
                </v-layout>
                <v-list-group class="white--text"
                              v-else-if="item.children"
                              v-model="item.model"
                              :key="item.text"
                              :prepend-icon="item.model ? item.icon : item['icon-alt']"
                              append-icon=""
                >
                    <v-list-tile slot="activator" :href="item.url">
                        <v-list-tile-content>
                            <v-list-tile-title class="white--text">
                                {{ item.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile

                            v-for="(child, i) in item.children"
                            :key="i"
                            :href="child.url"
                    >
                        <v-list-tile-action color="white" v-if="child.icon">
                            <v-icon color="white">{{ child.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ child.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list-group>
                <v-list-tile v-else :key="item.text">
                    <v-list-tile-action>
                        <v-icon color="white">{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="white--text"
                                           :href="item.url" :target="item.target"
                                           :style="selectedStyle(item)"
                        >
                            {{ item.text }}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

            </template>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
  name: 'NavigationMenu',
  data: () => ({
    dataDrawer: this.drawer,
    items: [
      { icon: 'home', text: 'Inici', url: '/' },
      {
        icon: 'keyboard_arrow_up',
        'icon-alt': 'keyboard_arrow_down',
        text: 'Tasques',
        model: false,
        children: [
          { icon: 'list', text: 'Tasks Tailwind', url: '/tasks_vue' },
          { icon: 'format_list_bulleted', text: 'Tasques PHP', url: '/tasks' },
          { icon: 'note_add', text: 'Tasques', url: '/tasques' }
        ]
      },
      { icon: 'library_add', text: 'Tags', url: '/tags' },
      { icon: 'build', text: 'Changelog', url: '/changelog' },
      { icon: 'contacts', text: 'Contacte', url: '/contact' },
      { icon: 'person', text: 'Sobre Nosaltres', url: '/about' }
    ]
  }),
  props: {
    drawer: {
      Type: Boolean,
      default: false
    }
  },
  watch: {
    dataDrawer (drawer) {
      this.$emit('input', drawer)
    },
    drawer (drawer) {
      this.dataDrawer = drawer
    }
  },
  model: {
    prop: 'drawer',
    event: 'input'
  },
  methods: {
    setSelectedItem () {
      const currentPath = window.location.pathname
      const selected = this.items.indexOf(this.items.find(item => item.href === currentPath))
      this.items[selected].selected = true
    },
    selectedStyle (item) {
      if (item.selected) {
        return {
          'border-left': '5px solid #F0B429',
          'background-color': '#F0F4F8',
          'font-size': '1em'
        }
      }
    }
  },
  created () {
    this.setSelectedItem()
  }
}
</script>
