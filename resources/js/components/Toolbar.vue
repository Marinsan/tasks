<template>
    <v-toolbar
            v-model="toolbar"
            :items="dataUsers"
            :item_value="itemValue"
            color="primary"
            slot="selection" slot-scope="data"
            dark
            app
            clipped-left
            clipped-right
            fixed>
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <v-toolbar-title>Tasks</v-toolbar-title>
        <v-spacer></v-spacer>

        <v-tooltip bottom >
            <span class="hidden-xs-only" slot="activator" v-role="'SuperAdmin'"><git-info></git-info> </span>
            <span><strong>Github Info</strong></span>
        </v-tooltip>
        <v-spacer></v-spacer>

        <v-tooltip bottom >
            <v-avatar slot="activator" @click.stop="drawerProfile = !drawerProfile">
                <img src="https://www.gravatar.com/avatar/" alt="avatar">
            </v-avatar>
            <span>

                <strong v-text="user.name"> </strong>
                <br>

                </span>
        </v-tooltip>

        <v-menu bottom left offset-y>
            <v-btn
                    slot="activator"
                    dark
                    icon
            >
                <v-icon>more_vert</v-icon>
            </v-btn>

            <v-list>
                <v-list-tile>
                    <v-list-tile-title> Versio Github</v-list-tile-title>
                </v-list-tile>
                <v-list-tile>
                    <v-form class="hidden-xs-only" click="logout" method="POST" @click="">
                        @csrf
                        <v-list-tile-title>
                            lfsdf
                        </v-list-tile-title>
                    </v-form>
                </v-list-tile>

            </v-list>
        </v-menu>

        <v-form class="hidden-xs-only" action="logout" method="POST">
            @csrf
            <v-btn color="error" type="submit">Logout</v-btn>
        </v-form>
        <v-form class="hidden-md-only hidden-lg-only hidden-sm-only hidden-xl-only" action="logout" method="POST">
            @csrf
            <v-btn type="submit" icon><v-icon>exit_to_app</v-icon></v-btn>
        </v-form>
    </v-toolbar>
</template>

<script>
export default {
  name: 'Toolbar',
  data () {
    return {
      dataUsers: this.users
    }
  },
  methods: {
    logout () {

    }
  },
  model: {
    prop: 'user'
  },
  props: {
    toolbar: {
      Type: Boolean,
      default: false
    },
    itemValue: {
      type: String,
      default: 'id'
    },
    user: {
      type: Object,
      default: function () {
        return {}
      }
    },
    users: {
      type: Array,
      required: true
    },
    label: {
      type: String,
      default: 'Usuaris'
    }
  },
  watch: {
    users () {
      this.dataUsers = this.users
    }
  }
}
</script>
