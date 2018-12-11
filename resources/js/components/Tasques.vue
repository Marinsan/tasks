<template>
    <span>

        <v-dialog v-model="editDialog" fullscreen hide-overlay transition="dialog-bottom-transition"
                  @keydown.esc="editDialog=false">
            <v-toolbar color="blue darken-3" class="white--text">
                <v-btn icon flat class="white--text">
                    <v-icon class="mr-1" @click="editDialog=false">close</v-icon>
                </v-btn>
                <v-toolbar-title class="white--text">Editar Tasca</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn flat class="white--text" @click="editDialog=false">
                    <v-icon class="mr-1" >exit_to_app</v-icon>
                    SORTIR
                </v-btn>
                <v-btn @click="edit" flat class="white--text">
                    <v-icon class="mr-1">save</v-icon>
                    Guardar
                </v-btn>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-form>
                        <v-text-field v-model="taskBeingEdited.name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-switch v-model="taskBeingEdited.completed" :label="taskBeingEdited.completed ? 'Completada':'Pendent'"></v-switch>
                        <v-textarea v-model="taskBeingEdited.description" label="Descripció"></v-textarea>
                        <v-autocomplete  :readonly="!$can('tasks.index')" v-model="taskBeingEdited.user_id"  :items="dataUsers" label="Usuari" item-text="name" item-value="id"></v-autocomplete>
                        <div class="text-xs-center">
                            <v-btn @click="editDialog=false">
                                <v-icon class="mr-2">exit_to_app</v-icon>
                                Cancel·lar
                            </v-btn>
                            <v-btn color="success"
                                   @click="edit">
                                <v-icon class="mr-2">save</v-icon>
                                Guardar
                            </v-btn>
                        </div>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-dialog v-model="showDialog" fullscreen hide-overlay transition="dialog-bottom-transition"
                  @keydown.esc="showDialog=false">
            <v-toolbar color="blue darken-3" class="white--text">
                <v-btn icon flat class="white--text">
                    <v-icon class="mr-1" @click="showDialog=false">close</v-icon>
                </v-btn>
                <v-toolbar-title class="white--text">Mostrar tasca</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn flat class="white--text" @click="showDialog=false">
                    <v-icon class="mr-1" >exit_to_app</v-icon>
                    SORTIR
                </v-btn>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-form>
                        <v-text-field readonly v-model="taskBeingShown.name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-switch readonly v-model="taskBeingShown.completed" :label="taskBeingShown.completed ? 'Completada':'Pendent'"></v-switch>
                        <v-textarea readonly v-model="taskBeingShown.description" label="Descripció"></v-textarea>
                        <v-autocomplete readonly v-model="taskBeingShown.user_id" :items="dataUsers" label="Usuari" item-value="id" item-text="name"></v-autocomplete>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-toolbar color="blue darken-3">
            <v-menu>
                <v-btn slot="activator" icon dark>
                    <v-icon>more_vert</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile @click="opcio1">
                        <v-list-tile-title>Opció 1</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile href="http://google.com">
                        <v-list-tile-title>Google</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
            <v-toolbar-title class="white--text">Tasques</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon class="white--text">
                <v-icon>settings</v-icon>
            </v-btn>
            <v-btn icon class="white--text" @click="refresh" :loading="loading" :disabled="loading">
                <v-icon>refresh</v-icon>
            </v-btn>
        </v-toolbar>
        <v-card>
            <v-card-title>
                <v-layout row wrap>
                    <v-flex lg3 class="pr-2">
                        <v-select
                                label="Filtres"
                                :items="filters"
                                v-model="filter"
                                item-text="name"
                                :return-object="true"
                        >
                        </v-select>
                    </v-flex>
                    <v-flex lg4 class="pr-2">
                        <user-select
                                label="Users"
                                :items="dataUsers"
                                v-model="user"
                                item-text="name"
                                clearable>
                        </user-select>
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
                    no-data-text="No hi ha dades disponibles"
                    rows-per-page-text="Tasques per pàgina"
                    :rows-per-page-items="[5,10,25,50,100,200,{'text':'Tots','value':-1}]"
                    :loading="loading"
                    :pagination.sync="pagination"
                    class="hidden-md-and-down"
            >
                <v-progress-linear slot="progress" color="blue" indeterminate></v-progress-linear>
                <template slot="items" slot-scope="{item: task}">
                    <tr>
                        <td>{{ task.id }}</td>
                        <td v-text="task.name"></td>

                        <td v-if="task.user_id !== null">
                            <v-avatar :title="task.user_name + ' - ' + task.user_email">
                                <img :src="task.user_gravatar" alt="gravatar">

                            </v-avatar>
                            &nbsp {{task.user_email}}
                        </td>

                        <td v-else>
                            <v-avatar title="No user">
                                <img src="img/usuari.png" alt="gravatar">
                            </v-avatar>
                        </td>

                        <!--<toggle :completed="task.completed" :id="task.id"></toggle>-->
                            <task-completed-toggle :task="task" ></task-completed-toggle>

                        <td>
                            <span :title="task.created_at_formatted">{{ task.created_at_human}}</span>
                        </td>
                        <td>
                            <span :title="task.updated_at_formatted">{{ task.updated_at_human}}</span>
                        </td>
                        <td>
                            <v-btn v-if="$can('user.tasks.show', tasks)" icon color="primary" flat title="Mostrar la tasca"
                                   @click="showShow(task)">
                                <v-icon>visibility</v-icon>
                            </v-btn>
                            <v-btn v-if="$can('user.tasks.update', tasks)" icon color="success" flat title="Editar la tasca"
                                   @click="showUpdate(task)">
                                <v-icon>edit</v-icon>
                            </v-btn>
                            <v-btn v-if="$can('user.tasks.destroy', tasks)" icon color="error" flat title="Eliminar la tasca"
                                   :loading="removing === task.id" :disabled="removing === task.id" @click="destroy(task)">
                                <v-icon>delete</v-icon>
                            </v-btn>
                        </td>
                    </tr>
                </template>
            </v-data-table>
            <v-data-iterator class="hidden-lg-and-up"
                             :items="dataTasks"
                             :search="search"
                             no-results-text="No s'ha trobat cap registre coincident"
                             no-data-text="No hi ha dades disponibles"
                             rows-per-page-text="Tasques per pàgina"
                             :rows-per-page-items="[5,10,25,50,100,200,{'text':'Tots','value':-1}]"
                             :loading="loading"
                             :pagination.sync="pagination"
            >
                <v-flex
                        slot="item"
                        slot-scope="{item:task}"
                        xs12
                        sm6
                        md4
                >
                    <v-card class="mb-1">
                        <v-card-title v-text="task.name"></v-card-title>
                        <v-list dense>
                            <v-list-tile>
                              <v-list-tile-content>Completed:</v-list-tile-content>
                              <v-list-tile-content class="align-end">{{ task.completed }}</v-list-tile-content>
                            </v-list-tile>
                            <v-list-tile>
                              <v-list-tile-content>User:</v-list-tile-content>
                              <v-list-tile-content class="align-end">{{ task.user_id }}</v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </v-flex>
            </v-data-iterator>
        </v-card>

          <task-create :users="users" :uri="uri" @created="refresh" ></task-create>

    </span>
</template>

<script>
import TaskCompletedToggle from './TaskCompletedToggle'
import Toggle from './Toggle'
import TaskCreate from './TaskCreate'

export default {
  name: 'Tasques',
  components: {
    TaskCreate,
    'task-completed-toggle': TaskCompletedToggle,
    'toggle': Toggle
  },
  data () {
    return {
      taskBeingEdited: '',
      taskBeingShown: '',
      newTask: {
        name: '',
        completed: false,
        user_id: '',
        description: ''
      },
      dataUsers: this.users,
      completed: false,
      name: '',
      description: '',
      createDialog: false,
      editDialog: false,
      showDialog: false,
      user: {
        user_id: ''
      },
      usersold: [
        'Cristian Marin',
        'Sergi Baucells',
        'Marc Mestre'
      ],
      filter: { name: 'Totes', value: null },
      filters: [{ name: 'Totes', value: null }, { name: 'Completades', value: true }, { name: 'Pendents', value: false }],
      search: '',
      pagination: {
        rowsPerPage: 25
      },
      loading: false,
      creating: false,
      editing: false,
      removing: null,
      dataTasks: this.tasks,
      headers: [
        { text: 'Id', value: 'id' },
        { text: 'Nom', value: 'name' },
        { text: 'Usuari', value: 'user_id' },
        { text: 'Completat', value: 'completed' },
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
    users: {
      type: Array,
      required: true
    },
    uri: {
      type: String,
      required: true
    }
  },
  computed: {
    getFilteredTasks () {
      return this.dataTasks.filter((task) => {
        if (task.completed === this.filter.value || this.filter.value == null) return true
        else return false
      })
    }
  },
  methods: {
    opcio1 () {
      console.log('OPCIO 1 REFRESH')
    },
    showUpdate (task) {
      this.editDialog = true
      this.taskBeingEdited = task
    },
    showShow (task) {
      this.showDialog = true
      this.taskBeingShown = task
    },
    removeTask (task) {
      this.dataTasks.splice(this.dataTasks.indexOf(task), 1)
    },
    createTask (task) {
      this.dataTasks.splice(0, 0, task)
    },
    editTask (editedTask) {
      this.dataTasks.splice(this.dataTasks.indexOf(editedTask), 1, editedTask)
    },
    async destroy (task) {
      let result = await this.$confirm('Les tasques esborrades no es poden recuperar',
        {
          title: 'Esteu segurs?',
          buttonTrueText: 'Eliminar',
          buttonFalseText: 'Cancel·lar',
          color: 'red'
        })
      if (result) {
        this.removing = true
        window.axios.delete(this.uri + '/' + task.id).then(() => {
          // this.refresh() // Problema -> rendiment
          this.removeTask(task)
          this.deleteDialog = false
          this.task = null
          this.$snackbar.showMessage("S'ha esborrat correctament la tasca")
          this.removing = false
        }).catch(error => {
          this.$snackbar.showError(error.message)
          this.removing = false
        })
      }
    },
    edit () {
      window.axios.put(this.uri + '/' + this.taskBeingEdited.id, this.taskBeingEdited).then((response) => {
        this.editTask(response.data)
        this.$snackbar.showMessage("S'ha editat correctament la tasca")
        this.editDialog = false
        this.refresh()
      }).catch(error => {
        this.$snackbar.showError(error)
      })
    },
    refresh () {
      this.loading = true
      window.axios.get(this.uri).then(response => {
        this.dataTasks = response.data
        this.loading = false
        this.$snackbar.showMessage('Tasques actualitzades correctament')
      }).catch(error => {
        console.log(error)
        this.loading = false
      })
    }
  }
}
</script>
