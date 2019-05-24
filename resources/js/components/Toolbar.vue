<template>
    <v-toolbar
            color="primary"
            dark
            app
            clipped-left
            clipped-right
            fixed>
        <v-toolbar-side-icon @click="$emit('toggle-left')"></v-toolbar-side-icon>
        <v-toolbar-title>Tasks</v-toolbar-title>
        &nbsp;
        <v-tooltip bottom >
            <span class="hidden-xs-only" slot="activator" v-role="'SuperAdmin'"><git-info></git-info> </span>
            <span><strong>Github Info</strong></span>
        </v-tooltip>
        <v-spacer></v-spacer>

        <users-online-widget></users-online-widget>

        <notifications-widget></notifications-widget>
        &nbsp;
        <v-tooltip bottom>
            <v-avatar slot="activator" @click="$emit('toggle-right')">
               <v-layout v-if="user.online">
                <v-badge right bottom overlap color="green">
                    <template v-slot:badge>
                        <span></span>
                    </template>
                    <span>
                             <v-avatar>
                        <img style="border: white 2px; margin: 20px;" :src=userAvatar alt="avatar">
                        </v-avatar>
                        </span>
                </v-badge>
               </v-layout>

                <v-layout v-else>
                <v-badge right bottom overlap color="grey">
                    <template v-slot:badge>
                        <span></span>
                    </template>
                    <span>
                             <v-avatar>
                        <img style="border: white 2px; margin: 20px;" :src=userAvatar alt="avatar">
                        </v-avatar>
                        </span>
                </v-badge>
                </v-layout>

            </v-avatar>
            <span>
                <strong>{{ user.name }}</strong>
                <br>
                {{ user.email }}
            </span>
        </v-tooltip>
        &nbsp;

        <v-form class="hidden-xs-only" action="logout" method="POST">
            <input type="hidden" name="_token" :value="csrfToken">
            <v-btn color="error" type="submit">Logout</v-btn>
        </v-form>
        <v-form class="hidden-md-only hidden-lg-only hidden-sm-only hidden-xl-only" action="logout" method="POST">
            <input type="hidden" name="_token" :value="csrfToken">
            <v-btn alt="Tancar" type="submit" icon><v-icon>exit_to_app</v-icon></v-btn>
        </v-form>
    </v-toolbar>
</template>

<script>
import NotificationsWidget from './notifications/NotificationsWidget'
import GitInfoComponent from './git/GitInfoComponent'
export default {
  name: 'MainToolbar',
  components: {
    'notifications-widget': NotificationsWidget,
    'git-info': GitInfoComponent
  },
  data () {
    return {
      userAvatar: window.laravel_user.gravatar,
      user: {}
    }
  },
  props: {
    csrfToken: {
      Type: String,
      required: true
    }
  },
  created () {
    this.user = window.laravel_user
  }
}
</script>
