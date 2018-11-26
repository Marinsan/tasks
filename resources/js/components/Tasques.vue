<template>
    <span>
        <v-dialog v-model="deleteDialog" max-width="290">
           <v-card>
        <v-card-title class="headline">Eliminar Tasca</v-card-title>

        <v-card-text>
          Esteu segur d'eliminar la tasca?
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
                  flat
                  color="green darken-1"
                  @click="deleteDialog = false"
          >
            Cancelar
          </v-btn>

          <v-btn
                  flat
                  color="green darken-1"
                  @click="destroy"
                  :loading="loading_delete"
                  :disabled="loading_delete"
          >
            Confirmar
          </v-btn>
        </v-card-actions>
      </v-card>

        </v-dialog>

        <v-dialog v-model="createDialog" fullscreen hide-overlay transition="dialog-bottom-transition"
                  @keydown.esc="createDialog=false">
        <v-toolbar color="blue darken-3" class="white--text">
            <v-btn icon dark @click.native="createDialog = false">
            <v-icon>close</v-icon>
          </v-btn>
            <v-toolbar-title>
                Crear Tasca

            </v-toolbar-title>
            <v-spacer></v-spacer>
                <v-btn  flat @click.native="createDialog=false" class="white--text">
                    <v-icon>exit_to_app</v-icon>
                    Sortir
                </v-btn>
                <v-btn  flat  class="white--text">
                    <v-icon>save</v-icon>
                    Guardar
                </v-btn>
        </v-toolbar>
            <v-card>
                <v-card-text>

                    <v-form>
                         <v-text-field v-model="newTask.name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-switch v-model="newTask.completed" :label="completed ? 'Completada':'Pendent'"></v-switch>
                        <v-textarea v-model="newTask.description" label="Descripció" item-value="id"></v-textarea>
                        <v-autocomplete v-model="newTask.user_id    " :items="dataUsers" label="Usuari" item-value="id" item-text="name"></v-autocomplete>
                        <div class="text-xs-center">
                            <v-btn @click="createDialog=false">
                                <v-icon class="mr-2">exit_to_app</v-icon>
                                Cancel·lar
                            </v-btn>
                            <v-btn color="success"
                                   flat
                                   @click="add()"
                                   :loading="creating"
                                   :disabled="creating">
                                <v-icon class="mr-2">save</v-icon>
                                Guardar
                            </v-btn>
                        </div>
                    </v-form>

                </v-card-text>
            </v-card>

        </v-dialog>

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
                <v-btn flat class="white--text">
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
                        <v-autocomplete :items="dataUsers" label="Usuari" item-value="id" item-text="name"></v-autocomplete>
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
                <v-btn flat class="white--text">
                    <v-icon class="mr-1">save</v-icon>
                    Guardar
                </v-btn>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-form>
                        <v-text-field disabled v-model="taskBeingShown.name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-switch disabled v-model="taskBeingShown.completed" :label="completed ? 'Completada':'Pendent'"></v-switch>
                        <v-textarea disabled v-model="taskBeingShown.description" label="Descripció"></v-textarea>
                        <v-autocomplete disabled :items="dataUsers" label="Usuari" item-value="id" item-text="name"></v-autocomplete>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-snackbar :timeout="snackbarTimeout" :color="snackbarColor" v-model="snackbar">
            {{ snackbarMessage }}
            <v-btn dark flat @click="snackbar=false">Tancar</v-btn>
        </v-snackbar>

        <v-toolbar color="blue darken-3">
            <v-menu>
                <v-btn slot="activator" icon dark>
                    <v-icon>more_vert</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile @click="opcio1">
                        <v-list-tile-title>Opció 1</v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile href="https://www.google.es">
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
                                v-model="filter">

                        </v-select>
                    </v-flex>
                    <v-flex lg4 class="pr-2">
                        <v-select
                                label="Users"
                                :items="dataUsers"
                                v-model="user"
                                clearable
                                item-text="name"
                        >
                        </v-select>
                    </v-flex>
                    <v-flex lg5>
                        <v-text-field
                                v-model="search"
                                append-icon="search"
                                label="Buscar"
                        ></v-text-field>
                    </v-flex>
                </v-layout>
            </v-card-title>
            <v-data-table
                    :headers="headers"
                    :items="dataTasks"
                    :search="search"
                    no-results-text="No s'ha trobat cap registre coincident"
                    no-data-text="No hi han dades disponibles"
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
                        <td>
                            <span :title="task.description">{{ task.name }}</span>
                        </td>
                        <td>
                            <v-avatar :title="task.user_name">
                                <img :src="task.user_gravatar" alt="avatar">
                            </v-avatar>
                        </td>
                         <td>
                          <v-switch v-model="completed" :label="completed ? 'Completada' : 'Pendent'"></v-switch>
                        </td>
                        <td>
                            <span :title="task.created_at_formatted">{{ task.created_at_human }}</span>
                        </td>
                        <td>
                            <span :title="task.updated_at_formatted">{{ task.updated_at_human }}</span>
                        </td>
                        <td>
                           <v-btn v-can="tasks.showShow" icon color="primary" flat title="Mostrar la tasca"
                                  @click="showShow(task)">
                                <v-icon>visibility</v-icon>
                            </v-btn>
                            <v-btn v-can="tasks.edit" icon color="success" flat title="Editar la tasca"
                                   @click="showUpdate(task)">
                                <v-icon>edit</v-icon>
                            </v-btn>

                            <v-btn v-can="tasks.destroy" icon color="error" flat title="Eliminar la tasca"
                                   @click="showDestroy(task)">
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
                             no-data-text="No hi han dades disponibles"
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
                md4>
                    <v-card class="mb-1">
                        <v-card-title v-text="task.name"></v-card-title>
                        <v-list dense>
                            <v-list-tile-title>
                                <v-list-tile-content>Completed</v-list-tile-content>
                                <v-list-tile-content class="align-end">{{ task.completed}}</v-list-tile-content>
                            </v-list-tile-title>
                            <v-list-tile-title>
                                <v-list-tile-content>User</v-list-tile-content>
                                <v-list-tile-content class="align-end">{{ task.user_id}}</v-list-tile-content>
                            </v-list-tile-title>
                        </v-list>
                    </v-card>
                </v-flex>

            </v-data-iterator>

        </v-card>
        <v-btn
                v-can="tasks.add"
                @click="showCreate"
                fab
                bottom
                right
                fixed
                color="pink"
                class="white--text"
        >
            <v-icon>add</v-icon>
        </v-btn>
    </span>
</template>

<script>
import VListTile from 'vuetify/lib/components/VList/VListTile'
export default {
  name: 'Tasques',
  components: { VListTile },
  data () {
    return {
      newTask: {
        name: '',
        completed: false,
        user_id: '',
        description: ''
      },
      taskBeingEdited: '',
      taskBeingShown: '',
      snackbarMessage: 'sd',
      snackbarTimeout: 3000,
      snackbarColor: 'success',
      snackbar: false,
      dataUsers: this.users,
      completed: false,
      name: '',
      user: '',
      creating: false,
      description: '',
      notifications: false,
      sound: true,
      widgets: false,
      deleteDialog: false,
      createDialog: false,
      editDialog: false,
      showDialog: false,
      taskBeginRemoved: null,
      filter: 'Totes',
      filters: [
        'Totes',
        'Completades',
        'Pendents'
      ],
      search: '',
      pagination: {
        rowsPerPage: 25
      },
      loading: false,
      loading_delete: false,
      loading_update: false,
      loading_show: false,
      dataTasks: this.tasks,
      headers: [
        { text: 'Id', value: 'id' },
        { text: 'Name', value: 'name' },
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
    }
  },
  methods: {
    opcio1 () {
      console.log('Todo Opcio')
    },
    showMessage (message) {
      this.snackbarMessage = message
      this.snackbarColor = 'success'
      this.snackbar = true
    },
    showError (error) {
      this.snackbarMessage = error.message
      this.snackbarColor = 'error'
      this.snackbar = true
    },
    showDestroy (task) {
      this.deleteDialog = true
      this.taskBeginRemoved = task
    },
    removeTask (task) {
      this.dataTasks.splice(this.dataTasks.indexOf(task), 1)
    },
    destroy () {
      this.loading_delete = true
      window.axios.delete('/api/v1/tasks/' + this.taskBeginRemoved.id).then(() => {
        this.removeTask(this.taskBeginRemoved)
        this.loading_delete = false
        this.taskBeginRemoved = null
        this.deleteDialog = false
        this.showMessage("S'ha eliminat correctament")
      }).catch(error => {
        this.showError(error)
        this.loading_delete = false
      })
    },
    showCreate (task) {
      this.createDialog = true
      this.newTask = task
    },
    show (task) {
      this.loading_show = true
      setTimeout(() => {
        this.loading_show = false
      }, 5000)
      console.log('Todo show task' + task.id)
    },
    showUpdate (task) {
      this.editDialog = true
      this.taskBeingEdited = task
    },
    showShow (task) {
      this.showDialog = true
      this.taskBeingShown = task
    },
    // snackbar

    create (task) {
      console.log('Todo delete task')
    },

    update (task) {
      this.loading_update = true
      setTimeout(() => {
        this.loading_update = false
      }, 5000)
      console.log('Todo update task' + task.id)
    },

    refresh () {
      this.loading = true
      window.axios.get('/api/v1/user/tasks/').then(response => {
        this.showMessage("S'ha refrescat be")
        this.dataTasks = response.data
        this.loading = false
      }).catch(error => {
        console.log(error)
        this.loading = false
      })
    },
    createTask (task) {
      this.dataTasks.splice(0, 0, task)
    },
    add () {
      window.axios.post('/api/v1/tasks', this.newTask).then((response) => {
        this.createTask(response.data)
        this.showMessage("La tasca s'ha creat correctament!")
        this.createDialog = false
      }).catch(error => {
        this.showError(error)
      })
    },
    edit () {
      console.log(this.taskBeingEdited)
      window.axios.put('/api/v1/tasks/' + this.taskBeingEdited.id, this.taskBeingEdited).then((response) => {
        this.editTask(response.data)
        this.showMessage("S'ha editat correctament")
        this.editDialog = false
      }).catch(error => {
        this.showError(error)
      })
    },
    editTask (editedTask) {
      this.dataTasks.splice(this.dataTasks.indexOf(editedTask), 1, editedTask)
    },
    created () {
      console.log('Usuari logat')
      console.log(window.laravel_user)
    }
  }
}
</script>
