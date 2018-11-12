<template>
    <span>
        <v-dialog v-model="deleteDialog" max-width="290">
           <v-card>
        <v-card-title class="headline">Eliminar Tag</v-card-title>

        <v-card-text>
          Esteu segur d'eliminar el tag?
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
                  color="green darken-1"
                  flat="flat"
                  @click="deleteDialog = false"
          >
            Disagree
          </v-btn>

          <v-btn
                  color="green darken-1"
                  flat="flat"
                  @click="deleteDialog = false"
          >
            Agree
          </v-btn>
        </v-card-actions>
      </v-card>

        </v-dialog>

        <v-dialog v-model="createDialog" fullscreen>

      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click.native="createDialog = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Settings</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click.native="createDialog = false">Save</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-list three-line subheader>
          <v-subheader>User Controls</v-subheader>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>Content filtering</v-list-tile-title>
              <v-list-tile-sub-title>Set the content filtering level to restrict apps that can be downloaded</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-content>
              <v-list-tile-title>Password</v-list-tile-title>
              <v-list-tile-sub-title>Require password for purchase or use password to restrict purchase</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>
        <v-list three-line subheader>
          <v-subheader>General</v-subheader>
          <v-list-tile avatar>
            <v-list-tile-action>
              <v-checkbox v-model="notifications"></v-checkbox>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Notifications</v-list-tile-title>
              <v-list-tile-sub-title>Notify me about updates to apps or games that I downloaded</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-action>
              <v-checkbox v-model="sound"></v-checkbox>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Sound</v-list-tile-title>
              <v-list-tile-sub-title>Auto-update apps at any time. Data charges may apply</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-action>
              <v-checkbox v-model="widgets"></v-checkbox>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Auto-add widgets</v-list-tile-title>
              <v-list-tile-sub-title>Automatically add home screen widgets</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
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
            <v-toolbar-title class="white--text">Tags</v-toolbar-title>
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
                <v-layout>
                    <v-flex lg-3 class="mr-2">
                        <v-select
                                label="Filtres"
                                :items="filters"
                                v-model="filter">

                        </v-select>
                    </v-flex>
                    <v-flex lg-3 class="mr-2">
                        <v-select
                                label="Users"
                                :items="users"
                                v-model="user"
                                clearable
                        >
                        </v-select>
                    </v-flex>
                    <v-flex lg-4 class="mr-2">
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
                    :items="dataTags"
                    :search="search"
                    no-results-text="No s'ha trobat cap registre coincident"
                    no-data-text="No hi han dades disponibles"
                    rows-per-page-text="Tasques per pàgina"
                    :rows-per-page-items="[5,10,25,50,100,200,{'text':'Tots','value':-1}]"
                    :loading="loading"
                    :pagination.sync="pagination"
            >
                <v-progress-linear slot="progress" color="blue" indeterminate></v-progress-linear>

                <template slot="items" slot-scope="{item: tags}">
                    <tr>
                        <td>{{ tags.id }}</td>
                        <td v-text="tags.name"></td>
                        <td v-text="tags.completed"></td>
                        <td v-text="tags.user_id"></td>
                        <td v-text="tags.created_at"></td>
                        <td v-text="tags.updated_at"></td>
                        <td>
                            <v-btn icon color="primary" flat title="Mostrar snackbar"
                                   @click="snackbar=true">
                                <v-icon>visibility</v-icon>
                            </v-btn>
                            <v-btn :loading="loading_show" icon color="primary" flat title="Mostrar la tasca"
                                   @click="show(tags)">
                                <v-icon>visibility</v-icon>
                            </v-btn>
                            <v-btn :loading="loading_update" icon color="success" flat title="Actualitzar la tasca"
                                   @click="update(tags)">
                                <v-icon>update</v-icon>
                            </v-btn>

                            <v-btn :loading="loading_delete" icon color="error" flat title="Eliminar la tasca"
                                   @click="showDestroy(tags)">
                                <v-icon>delete</v-icon>
                            </v-btn>
                        </td>
                    </tr>
                </template>
            </v-data-table>
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
      notifications: false,
      sound: true,
      widgets: false,
      snackbar: true,
      deleteDialog: false,
      createDialog: false,
      filter: 'Totes',
      filters: [
        'Totes',
        'Completades',
        'Pendents'
      ],
      user: '',
      users: [
        'Cristian Marin',
        'Sergi Baucells',
        'Marc Mestre'
      ],
      search: '',
      pagination: {
        rowsPerPage: 25
      },
      loading: false,
      loading_delete: false,
      loading_update: false,
      loading_show: false,
      dataTags: this.tags,
      headers: [
        { text: 'Id', value: 'id' },
        { text: 'Nom', value: 'name' },
        { text: 'Usuari', value: 'user_id' },
        { text: 'Color', value: 'color' },
        { text: 'Descripcio', value: 'description'},
        { text: 'Creat', value: 'created_at' },
        { text: 'Modificat', value: 'updated_at' },
        { text: 'Accions', sortable: false }
      ]
    }
  },
  props: {
    tags: {
      type: Array,
      required: false
    }
  },
  methods: {
    opcio1 () {
      console.log('Todo Opcio')
    },
    destroy (tags) {
      this.loading_delete = true
      setTimeout(() => { this.loading_delete = false }, 5000)
      console.log('Todo delete tags' + tags.id)
    },
    showDestroy (tags) {
      this.deleteDialog = true
      this.loading_delete = true
      setTimeout(() => { this.loading_delete = false }, 5000)
      console.log('Todo delete tags' + tags.id)
    },
    create (tags) {
      console.log('Todo delete tags')
    },
    showCreate (tags) {
      this.createDialog = true
      console.log('Todo delete tags')
    },
    update (tags) {
      this.loading_update = true
      setTimeout(() => { this.loading_update = false }, 5000)
      console.log('Todo update tags' + tags.id)
    },
    show (tags) {
      this.loading_show = true
      setTimeout(() => { this.loading_show = false }, 5000)
      console.log('Todo show tags' + tags.id)
    },
    refresh () {
      this.loading = true
      window.axios.get('/api/v1/user/tags').then(response => {
        this.dataTags = response.data
        this.loading = false
      }).catch(error => {
        console.log(error)
        this.loading = false
      })
    }
  }
}
</script>
