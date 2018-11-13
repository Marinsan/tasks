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
            No
          </v-btn>

          <v-btn
                  flat
                  color="green darken-1"
                  @click="destroy"
          >
            Si
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
                <v-btn  flat @click.native="createDialog = false" class="white--text">
                    <v-icon>exit_to_app</v-icon> Sortir
                </v-btn>
                <v-btn  flat  class="white--text">
                    <v-icon>save</v-icon> Guardar
                </v-btn>
        </v-toolbar>
            <v-card>
                <v-card-text>

                    <v-form>
                        <v-text-field v-model="name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-switch v-model="completed" :label="completed ? 'Completada' : 'Pendent'"></v-switch>
                        <v-text-field v-model="description" label="Descrpcio" hint="Descripcio de la tasca"></v-text-field>
                        <v-autocomplete :items="dataUsers" label="Usuari" item-text="name"></v-autocomplete>
                 <div class="text-xs-center" id="">
                   <v-btn   dark @click.native="createDialog = false" class="white--text">
                    <v-icon>exit_to_app</v-icon> Sortir
                </v-btn>
                <v-btn    class="white--text success">
                    <v-icon>save</v-icon> Guardar
                </v-btn>
                     </div>
                    </v-form>

                </v-card-text>
            </v-card>

        </v-dialog>

        <v-dialog v-model="editDialog" fullscreen hide-overlay transition="dialog-bottom-transition"
        @keydown.esc="editDialog=false">
        <v-toolbar color="blue darken-3" class="white--text">
            <v-btn icon dark @click.native="editDialog = false">
            <v-icon>close</v-icon>
          </v-btn>
            <v-toolbar-title>
                Editar Tasca

            </v-toolbar-title>
            <v-spacer></v-spacer>
                <v-btn  flat @click.native="editDialog = false" class="white--text">
                    <v-icon>exit_to_app</v-icon> Sortir
                </v-btn>
                <v-btn  flat  class="white--text">
                    <v-icon>save</v-icon> Guardar
                </v-btn>
        </v-toolbar>
            <v-card>
                <v-card-text>

                    <v-form>
                        <v-text-field v-model="name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-switch v-model="completed" :label="completed ? 'Completada' : 'Pendent'"></v-switch>
                        <v-text-field v-model="description" label="Descrpcio" hint="Descripcio de la tasca"></v-text-field>
                         <v-autocomplete :items="dataUsers" label="Usuari" item-text="name"></v-autocomplete>
                        <div class="text-xs-center">
                   <v-btn   dark @click.native="editDialog = false" class="white--text">
                    <v-icon>exit_to_app</v-icon> Sortir
                </v-btn>
                <v-btn    class="white--text success">
                    <v-icon>save</v-icon> Guardar
                </v-btn>
                     </div>
                    </v-form>

                </v-card-text>
            </v-card>

        </v-dialog>

        <v-dialog v-model="showDialog" fullscreen hide-overlay transition="dialog-bottom-transition"
                  @keydown.esc="showDialog=false">
        <v-toolbar color="blue darken-3" class="white--text">
            <v-btn icon dark @click.native="showDialog = false">
            <v-icon>close</v-icon>
          </v-btn>
            <v-toolbar-title>
                Veure Tasca
            </v-toolbar-title>
            <v-spacer></v-spacer>

                <v-btn  flat @click.native="showDialog = false" class="white--text">
                    <v-icon>exit_to_app</v-icon> Sortir
                </v-btn>
                <v-btn  flat @click.native="showDialog = false" class="white--text">
                    <v-icon>save</v-icon> Guardar
                </v-btn>
        </v-toolbar>

            <v-card>
                <v-card-text>


     <v-list three-line subheader>
          <v-subheader>Tasca</v-subheader>
          <v-list-tile >
              <v-list-tile-content>
              <v-list-tile-title>ID</v-list-tile-title>
              <v-list-tile-sub-title>1</v-list-tile-sub-title>
            </v-list-tile-content>
            <v-list-tile-content>
              <v-list-tile-title>Nom de la tasca</v-list-tile-title>
              <v-list-tile-sub-title>Comprar algo</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
         <v-list-tile>
            <v-list-tile-content>
              <v-list-tile-title>Completat</v-list-tile-title>
              <v-list-tile-sub-title>Si</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile>
            <v-list-tile-content>
              <v-list-tile-title>Descripcio</v-list-tile-title>
              <v-list-tile-sub-title>blablabla</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
         <v-list-tile>
            <v-list-tile-content>
              <v-list-tile-title>Usuari</v-list-tile-title>
              <v-list-tile-sub-title>Cristian Marin</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
         <v-list-tile>
            <v-list-tile-content>
              <v-list-tile-title>Darrera modificacio</v-list-tile-title>
              <v-list-tile-sub-title> 2018-11-13 19:14:05</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>




                </v-card-text>
            </v-card>

        </v-dialog>

        <v-snackbar :timeout="3000" color="success" v-model="snackbar">
            Això es un snackbar
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
                        <td v-text="task.name"></td>
                        <td v-text="task.user_id"></td>
                        <td v-text="task.completed"></td>
                        <td v-text="task.created_at"></td>
                        <td v-text="task.updated_at"></td>
                        <td>
                            <v-btn icon color="primary" flat title="Mostrar snackbar"
                                   @click="snackbar=true">
                                <v-icon>info</v-icon>
                            </v-btn>
                            <v-btn :loading="loading_show" icon color="primary" flat title="Mostrar la tasca"
                                   @click="showShow(task)">
                                <v-icon>visibility</v-icon>
                            </v-btn>
                            <v-btn :loading="loading_update" icon color="success" flat title="Actualitzar la tasca"
                                   @click="showUpdate(task)">
                                <v-icon>edit</v-icon>
                            </v-btn>

                            <v-btn :loading="loading_delete" icon color="error" flat title="Eliminar la tasca"
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
                            <v-list-title>
                                <v-list-title-content>Completed</v-list-title-content>
                                <v-list-title-content class="align-end">{{ task.completed}}</v-list-title-content>
                            </v-list-title>
                            <v-list-title>
                                <v-list-title-content>User</v-list-title-content>
                                <v-list-title-content class="align-end">{{ task.user_id}}</v-list-title-content>
                            </v-list-title>
                        </v-list>
                    </v-card>
                </v-flex>

            </v-data-iterator>

        </v-card>
        <v-btn
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
export default {
  name: 'Tasques',
  data () {
    return {
      dataUsers: this.users,
      completed: false,
      name: '',
      description: '',
      notifications: false,
      sound: true,
      widgets: false,
      snackbar: true,
      deleteDialog: false,
      createDialog: false,
      editDialog: false,
      showDialog: false,
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
        { text: 'Creat', value: 'created_at' },
        { text: 'Modificat', value: 'updated_at' },
        { text: 'Accions', sortable: false }
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
    destroy (task) {
      this.loading_delete = true
      setTimeout(() => { this.loading_delete = false }, 5000)
      console.log('Todo delete task' + task.id)
    },
    showDestroy (task) {
      this.deleteDialog = true
      this.loading_delete = true
      setTimeout(() => { this.loading_delete = false }, 5000)
      console.log('Todo delete task' + task.id)
    },
    create (task) {
      console.log('Todo delete task')
    },
    showCreate (task) {
      this.createDialog = true
      console.log('Todo delete task')
    },
    update (task) {
      this.loading_update = true
      setTimeout(() => { this.loading_update = false }, 5000)
      console.log('Todo update task' + task.id)
    },
    show (task) {
      this.loading_show = true
      setTimeout(() => { this.loading_show = false }, 5000)
      console.log('Todo show task' + task.id)
    },
    showUpdate (task) {
      this.editDialog = true
      console.log('Todo delete task')
    },
    showShow (task) {
      this.showDialog = true
      console.log('Todo delete task')
    },
    refresh () {
      this.loading = true
      window.axios.get('/api/v1/user/tasks').then(response => {
        // show snackbatr missatge ok 'Les tasques s'han actualitzat correctament'
        this.dataTasks = response.data
        this.loading = false
      }).catch(error => {
        console.log(error)
        this.loading = false
      })
    }
  }
}
</script>
