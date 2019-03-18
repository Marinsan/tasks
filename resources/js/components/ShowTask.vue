<template>

    <v-layout>
        <v-flex xs12 sm6 offset-sm3>

        <v-card class="justify-center mt-5  elevation-10"
                v-touch="{  left: () => call('delete', task) }"
        >

            <v-list>

                <v-flex class="v-avatar subheading ml-3">
                    <v-spacer></v-spacer>
                    <td v-if="task.user_id !== null" >
                        <v-tooltip bottom >
                            <div slot="activator">
                        <v-avatar class="hidden-xs-only" size="70">
                            <img :src="task.user_gravatar" alt="gravatar">
                        </v-avatar>
                        <v-avatar class="hidden-lg-only hidden-xl-only hidden-md-only hidden-sm-only" size="45">
                            <img :src="task.user_gravatar" alt="gravatar">
                        </v-avatar>
                            </div>
                            <span>
                                <strong v-text="task.user_name"> </strong>
                                <br>
                                 <a v-text="task.user_email" ></a>
                <br>

                </span>
                        </v-tooltip>
                    </td>

                    <td v-else>
                        <v-avatar title="No user">
                            <img src="img/usuari.png" alt="gravatar">
                        </v-avatar>
                    </td>
                    <v-list>
                        <v-layout class="ml-2 mt-2">
                            <td class="ml-3 font-weight-thin headline"><p> {{ task.name }}</p></td>
                        </v-layout>
                        <v-layout>
                            <td class="ml-4 font-weight-thin title" style="color:blueviolet"><p> {{ task.user.name }}</p></td>
                        </v-layout>
                        <v-layout>
                            <td class="ml-4 font-weight-light"><p> {{ task.user.email }}</p></td>
                        </v-layout>
                    </v-list>

                </v-flex>
            </v-list>

                <v-expansion-panel>
                    <v-expansion-panel-content
                    >
                        <template v-slot:header>
                            <div class="font-weight-light">Més informació</div>
                        </template>
                        <v-card>
                            <v-card-text class="grey lighten-3">
                               <v-layout>
                                    <task-completed-toggle :status="task.completed"  :task="task" :tags="tags"></task-completed-toggle>

                                    <tasks-tags :task="task" :task-tags="task.tags" :tags="tags" @change="refresh(false)"></tasks-tags>
                               </v-layout>

                                        <br>
                                <td class="ml-3 font-weight-thin font-italic subheading"><p> "{{ task.description }}"</p></td>

                            </v-card-text>
                        </v-card>
                    </v-expansion-panel-content>
                </v-expansion-panel>

        </v-card>

        </v-flex>
    </v-layout>

</template>

<script>
import TaskCompletedToggle from './TaskCompletedToggle'
import TasksTags from './TasksTags'
export default {
  name: 'ShowTask',
  components: {
    'task-completed-toggle': TaskCompletedToggle,
    'tasks-tags': TasksTags
  },
  data () {
    return {
      dataTasks: this.task,
      dataTags: this.tags,
      user: '',
      user_id: '',
      loading: false,
      dataUsers: this.users
    }
  },
  props: ['task', 'users', 'tags'],
  methods: {
    refresh (message = true) {
      this.loading = true
      window.axios.get(this.uri).then(response => {
        this.dataTasks = response.data
        this.loading = false
        if (message) this.$snackbar.showMessage('Tasques actualitzades correctament')
      }).catch(error => {
        console.log(error)
        this.loading = false
      })
    }
  }
}
</script>

<style scoped>

</style>
