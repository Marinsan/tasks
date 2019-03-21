<template>
    <span>
        <v-toolbar color="primary">
            <v-menu>
                <v-btn slot="activator" icon dark>
                    <v-icon>more_vert</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile>
                        <v-list-tile-title>Opció 1</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile href="https://google.com">
                        <v-list-tile-title>Google</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
            <v-toolbar-title class="white--text">Tasques</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon class="white--text">
                <v-icon>settings</v-icon>
            </v-btn>
             <v-tooltip top>
      <v-btn slot="activator" dark icon class="white--text" @click="refresh" :loading="loading" :disabled="loading">
         <v-icon>refresh</v-icon>
      </v-btn>
      <span>Refrescar</span>
    </v-tooltip>
        </v-toolbar>
        <v-card>
            <v-card-title>
                 <v-expansion-panel v-if="$vuetify.breakpoint.smAndDown">
    <v-expansion-panel-content>
        <template v-slot:header>
        <div>Filtres</div>
            <v-spacer></v-spacer>
            <v-icon class="text-xs-right">filter_list</v-icon>
      </template>
                <v-card-text class="justify-content-center">
                <v-flex xs12>
                        <v-select
                                label="Filtres"
                                :items="filters"
                                v-model="statusBy"
                                item-text="name"
                                :return-object="true"

                        >
                        </v-select>
                    </v-flex>
                    <v-flex xs12>
                      <user-select
                              url="/api/v1/users"
                              label="Usuari"
                              v-model="filterUser"
                              :users="dataUsers"
                      ></user-select>
                    </v-flex>
                    <v-flex xs12>
                        <v-text-field
                                append-icon="search"
                                label="Buscar"
                                v-model="search"
                        ></v-text-field>
                    </v-flex>
</v-card-text>
    </v-expansion-panel-content>
                 </v-expansion-panel>

                <v-layout v-else>
                    <v-flex lg3 class="pr-2">
                        <v-select
                                label="Filtres"
                                :items="filters"
                                v-model="statusBy"
                                item-text="name"
                                :return-object="true"
                        >
                        </v-select>
                    </v-flex>
                    <v-flex lg4 class="pr-2">
                      <user-select url="/api/v1/users"
                                   label="Usuari"
                                   v-model="filterUser"
                                   :users="dataUsers"></user-select>
                    </v-flex>
                    <v-flex lg5>
                        <v-text-field
                                append-icon="search"
                                label="Buscar"
                                v-model="search"
                        ></v-text-field>
                    </v-flex>
                </v-layout>
            </v-card-title>

            <v-data-table
                    :headers="headers"
                    :items="getFilteredTasks"
                    :search="search"
                    no-results-text="No s'ha trobat cap registre coincident"
                    no-data-text="No hi han dades disponibles"
                    rows-per-page-text="Tasques per pàgina"
                    :rows-per-page-items="[5,10,25,50,100,200,{'text':'Tots','value':-1}]"
                    :loading="loading"
                    :pagination.sync="pagination"
                    class="hidden-sm-and-down"
            >
                <v-progress-linear slot="progress" color="secondary" indeterminate></v-progress-linear>
                <template slot="items" slot-scope="{item: task}">
                    <tr v-touch="{  left: () => call('delete', task) }">
                        <td>{{ task.id }}</td>
                        <td>
                            <span :title="task.description">{{ task.name }}</span>
                        </td>
                        <td v-if="task.user_id !== null" >
                            <v-avatar :title="task.user_name + ' - ' + task.user_email">
                                <img :src="task.user_gravatar" alt="gravatar">

                            </v-avatar>
                            {{task.user_email}}
                        </td>

                        <td v-else>
                            <v-avatar title="No user">
                                <img src="img/usuari.png" alt="gravatar">
                            </v-avatar>
                        </td>
                        <td>
                            <task-completed-toggle :status="task.completed"  :task="task" :tags="tags"></task-completed-toggle>
                        </td>
                        <td>
                            <tasks-tags :task="task" :task-tags="task.tags" :tags="tags" @change="refresh(false)"></tasks-tags>
                        </td>
                        <td>
                            <span :title="task.created_at_formatted">{{ task.created_at_human}}</span>
                        </td>
                        <td>
                            <span :title="task.updated_at_formatted">{{ task.updated_at_human}}</span>
                        </td>
                        <td class="d-flex">
                            <task-show :users="users" :task="task" :uri="uri"></task-show>

                            <task-update :users="users" :task="task" @updated="updateTask" :uri="uri"></task-update>

                            <task-destroy :task="task" @removed="removeTask" :uri="uri"></task-destroy>
                        </td>
                    </tr>
                </template>
            </v-data-table>
            <v-data-iterator class="hidden-md-and-up text-center"
                             :items="dataTasks"
                             :search="search"
                             no-results-text="No s'ha trobat cap registre coincident"
                             no-data-text="No hi han dades disponibles"
                             rows-per-page-text="Tasques per pàgina"
                             :rows-per-page-items="[5,10,25,50,100,200,{'text':'Tots','value':-1}]"
                             :loading="loading"
                             :pagination.sync="pagination"

            >
                <div
                        slot="item"
                        slot-scope="{item:task}"
                        xs12
                        sm6
                        md6
                >

                    <v-card class="mb-4 justify-center elevation-10"
                            v-touch="{  left: () => call('delete', task) }"
                    >

                        <v-list>

                        <v-flex class="v-avatar subheading ml-3">
                            <v-spacer></v-spacer>
                        <td v-if="task.user_id !== null" >
                            <v-avatar class="hidden-xs-only" size="70" :title="task.user_name + ' - ' + task.user_email">
                                <img :src="task.user_gravatar" alt="gravatar">
                            </v-avatar>
                            <v-avatar class="hidden-lg-only hidden-xl-only hidden-md-only hidden-sm-only" size="45" :title="task.user_name + ' - ' + task.user_email">
                                <img :src="task.user_gravatar" alt="gravatar">
                            </v-avatar>
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

                             <v-list>
          <v-list-group>
            <v-list-tile slot="activator">
            </v-list-tile>

            <v-list-tile>

                 <v-list-tile-content>
                <v-list-tile-title></v-list-tile-title>
              </v-list-tile-content>

              <v-list-tile-action>
                   <v-layout>
                       <task-show :users="users" :task="task" :uri="uri"></task-show>
                   </v-layout>
              </v-list-tile-action>
                <v-list-tile-content>
                <v-list-tile-title></v-list-tile-title>
              </v-list-tile-content>

                 <v-list-tile-action>
                   <v-layout>
                       <task-update :users="users" :task="task" @updated="updateTask" :uri="uri"></task-update>
                   </v-layout>
              </v-list-tile-action>
                <v-list-tile-content>
                <v-list-tile-title></v-list-tile-title>
              </v-list-tile-content>

                 <v-list-tile-action>
                   <v-layout>
                       <task-destroy :task="task" :mobile="true" @removed="removeTask" :uri="uri"></task-destroy>
                   </v-layout>
              </v-list-tile-action>

                 <v-list-tile-content>
                <v-list-tile-title></v-list-tile-title>
              </v-list-tile-content>

            </v-list-tile>
          </v-list-group>
        </v-list>
                       </v-list>

                    </v-card>
                </div>

            </v-data-iterator>
        </v-card>
    </span>
</template>

<script>
import TaskCompletedToggle from './TaskCompletedToggle'
import TaskDestroy from './TaskDestroy'
import TaskUpdate from './TaskUpdate'
import TaskShow from './TaskShow'
import TasksTags from './TasksTags'
import EventBus from './../eventBus'

export default {
  name: 'TasksList',
  components: {
    'task-destroy': TaskDestroy,
    'task-update': TaskUpdate,
    'task-show': TaskShow,
    'task-completed-toggle': TaskCompletedToggle,
    'tasks-tags': TasksTags
  },
  data () {
    return {
      user: '',
      user_id: '',
      loading: false,
      dataTasks: this.tasks,
      dataUsers: this.users,
      filter: 'Totes',
      filterUser: null,
      filters: [
        { name: 'Totes', value: 'Totes' },
        { name: 'Completades', value: true },
        { name: 'Pendents', value: false }
      ],
      statusBy: { name: 'Totes', value: 'Totes' },
      search: '',
      pagination: {
        rowsPerPage: 10
      },
      headers: [
        { text: 'Id', value: 'id' },
        { text: 'Name', value: 'name' },
        { text: 'User', value: 'user_id' },
        { text: 'Completat', value: 'completed' },
        { text: 'Etiquetes', value: 'tags' },
        { text: 'Creat', value: 'created_at_timestamp' },
        { text: 'Modificat', value: 'updated_at_timestamp' },
        { text: 'Accions', sortable: false, value: 'full_search' }
      ]
    }
  },
  props: {
    tasks: {
      type: Array,
      required: true
    },
    tags: {
      type: Array,
      required: true
    },
    users: {
      type: Array,
      required: true
    },
    uri: {
      type: String,
      required: true
    }
  },
  watch: {
    tasks (newTasks) {
      this.dataTasks = newTasks
    }
  },
  computed: {
    getFilteredTasks () {
      let filterUser = this.filterUser
      let statusBy = this.statusBy
      let tasks = this.dataTasks
      if (filterUser == null) {
        tasks = this.dataTasks
      } else if (filterUser !== null) {
        tasks = tasks.filter((task) => {
          if (task.user_id == filterUser.id) return true
          else return false
        })
      }
      if (statusBy.value != 'Totes') {
        tasks = tasks.filter((task) => {
          if (task.completed == statusBy.value) return true
          else return false
        })
      }
      return tasks
    }
  },
  methods: {
    searchForTasks () {
      this.loading = true
      window.axios.get(this.uri).then((response) => {
        this.loading = false
        this.dataTasks = response.data
      }).catch((error) => {

      })
    },
    removeTask (task) {
      this.dataTasks.splice(this.dataTasks.indexOf(task), 1)
    },
    swipe (task) {
      this.dataTasks.splice(this.dataTasks.indexOf(task), 1)
    },
    updateTask (task) {
      this.refresh()
    },
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
    },
    call (action, object) {
      EventBus.$emit('touch-' + action, object)
    },
    created () {
      window.Echo.private('App.User.' + window.laravel_user.id)
        .listen('TaskUncompleted', (e) => {
          console.log(e.tasks)
          this.refresh()
        })
    }
  }
}
</script>
