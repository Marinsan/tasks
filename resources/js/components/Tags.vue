<template>
    <span>
        <v-dialog v-model="deleteDialog" width="500">
            <v-card>
                <v-card-title class="headline">Esteu segurs?</v-card-title>

                <v-card-text>
                    Aquesta operació no es pot desfer.
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                      <v-btn
                              color="green darken-1"
                              flat
                              @click="deleteDialog = false"
                      >
                        Cancel·lar
                      </v-btn>

                      <v-btn
                              color="error darken-1"
                              flat="flat"
                              @click="destroy"
                              :loading="removing"
                              :disabled="removing"
                      >
                        Confirmar
                      </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-dialog v-model="createDialog" fullscreen hide-overlay transition="dialog-bottom-transition"
                  @keydown.esc="createDialog=false">
            <v-toolbar color="blue darken-3" class="white--text">
                <v-btn icon flat class="white--text">
                    <v-icon class="mr-1" @click="createDialog=false">close</v-icon>
                </v-btn>
                <v-toolbar-title class="white--text">Crear Tag</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn flat class="white--text" @click="createDialog=false">
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
                        <v-text-field v-model="newTag.name" label="Nom" hint="Nom del tag" placeholder="Nom del tag"></v-text-field>
                        <v-text-field v-model="newTag.color" label="Color" hint="Color" placeholder="Color"></v-text-field>
                        <v-autocomplete :items="dataUsers" label="Usuari" item-value="id" item-text="name"></v-autocomplete>
                        <v-textarea v-model="newTag.description" label="Descripció" item-value="id"></v-textarea>
                        <div class="text-xs-center">
                            <v-btn @click="createDialog=false">
                                <v-icon class="mr-2">exit_to_app</v-icon>
                                Cancel·lar
                            </v-btn>
                            <v-btn color="success"

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
                <v-toolbar-title class="white--text">Editar Tag</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn flat class="white--text" @click="editDialog=false">
                    <v-icon class="mr-1" >exit_to_app</v-icon>
                    SORTIR
                </v-btn>
                <v-btn  flat class="white--text">
                    <v-icon class="mr-1">save</v-icon>
                    Guardar
                </v-btn>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-form>
                        <v-text-field v-model="tagBeingEdited.name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-text-field v-model="tagBeingEdited.color" label="Color" hint="Color" placeholder="Color"></v-text-field>
                        <v-textarea v-model="tagBeingEdited.description" label="Descripció"></v-textarea>
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
                <v-toolbar-title class="white--text">Mostrar tag</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn flat class="white--text" @click="showDialog=false">
                    <v-icon class="mr-1" >exit_to_app</v-icon>
                    SORTIR
                </v-btn>
                <v-btn  flat class="white--text">
                    <v-icon class="mr-1">save</v-icon>
                    Guardar
                </v-btn>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-form>
                        <v-text-field disabled v-model="tagBeingShown.name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
                        <v-text-field disabled v-model="tagBeingShown.color" label="Color" hint="Color" placeholder="Color"></v-text-field>
                        <v-textarea disabled v-model="tagBeingShown.description" label="Descripció"></v-textarea>
                        <v-autocomplete disabled :items="dataUsers" label="Usuari" item-value="id" item-text="name"></v-autocomplete>
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
                                item-text="name"
                                clearable>
                        </v-select>
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
                    :items="dataTags"
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
                <template slot="items" slot-scope="{item: tag}">
                    <tr>
                        <td>{{ tag.id }}</td>
                        <td v-text="tag.name"></td>
                        <td v-text="tag.description"></td>
                        <td class="text-xs-left"><div class="elevation-2" :style="'background-color:' + tag.color+';border-radius: 4px;height: 15px;width: 15px;'"></div></td>
                       <td>
                            <v-avatar :title="tag.user_name">
                                <img :src="tag.user_gravatar" alt="avatar">
                            </v-avatar>
                        </td>
                        <td>
                            <span :title="tag.created_at_formatted">{{ tag.created_at_human}}</span>
                        </td>
                        <td>
                            <span :title="tag.updated_at_formatted">{{ tag.updated_at_human}}</span>
                        </td>
                        <td>
                            <v-btn v-can="tags.showShow" icon color="primary" flat title="Mostrar la tasca"
                                   @click="showShow(tag)">
                                <v-icon>visibility</v-icon>
                            </v-btn>
                            <v-btn v-can="tags.edit" icon color="success" flat title="Editar la tasca"
                                   @click="showUpdate(tag)">
                                <v-icon>edit</v-icon>
                            </v-btn>
                            <v-btn v-can="tags.destroy" icon color="error" flat title="Eliminar la tasca"
                                   @click="showDestroy(tag)">
                                <v-icon>delete</v-icon>
                            </v-btn>
                        </td>
                    </tr>
                </template>
            </v-data-table>
            <v-data-iterator class="hidden-lg-and-up"
                             :items="dataTags"
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
                        slot-scope="{item:tag}"
                        xs12
                        sm6
                        md4
                >
                    <v-card class="mb-1">
                        <v-card-title v-text="tag.name"></v-card-title>
                        <v-list dense>
                            <v-list-tile>
                              <v-list-tile-content>User:</v-list-tile-content>
                              <v-list-tile-content class="align-end">{{ tag.user_id }}</v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card>
                </v-flex>
            </v-data-iterator>
        </v-card>
        <v-btn
                v-can="tags.add"
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
  name: 'Tags',
  data () {
    return {
      tagBeingEdited: '',
      tagBeingShown: '',
      newTag: {
        name: '',
        color: '',
        description: '',
        user_id: ''
      },
      dataUsers: this.users,
      color: '',
      name: '',
      description: '',
      deleteDialog: false,
      createDialog: false,
      editDialog: false,
      showDialog: false,
      tagBeingRemoved: null,
      user: '',
      usersold: [
        'Cristian Marin',
        'Sergi Baucells',
        'Marc Mestre'
      ],
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
      creating: false,
      editing: false,
      removing: false,
      dataTags: this.tags,
      headers: [
        { text: 'Id', value: 'id' },
        { text: 'Name', value: 'name' },
        { text: 'Description', value: 'description' },
        { text: 'Color', value: 'color' },
        { text: 'User', value: 'user_id' },
        { text: 'Creat', value: 'created_at_timestamp' },
        { text: 'Modificat', value: 'updated_at_timestamp' },
        { text: 'Accions', sortable: false, value: 'full_search' }
      ]
    }
  },
  props: {
    tags: {
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
      console.log('OPCIO 1 REFRESH')
    },
    showUpdate (tag) {
      this.editDialog = true
      this.tagBeingEdited = tag
    },
    showShow (tag) {
      this.showDialog = true
      this.tagBeingShown = tag
    },
    showDestroy (tag) {
      this.deleteDialog = true
      this.tagBeingRemoved = tag
    },
    showCreate () {
      this.createDialog = true
    },
    removeTag (tag) {
      this.dataTags.splice(this.dataTags.indexOf(tag), 1)
    },
    createTag (tag) {
      this.dataTags.splice(0, 0, tag)
    },
    editTag (editedTag) {
      this.dataTags.splice(this.dataTags.indexOf(editedTag), 1, editedTag)
    },
    add () {
      window.axios.post('/api/v1/tags', this.newTag).then((response) => {
        this.createTag(response.data)
        this.$snackbar.showMessage("S'ha creat correctament la tasca")
        this.createDialog = false
      }).catch(error => {
        this.$snackbar.showError(error)
      })
    },
    destroy () {
      this.removing = true
      window.axios.delete('/api/v1/tags/' + this.tagBeingRemoved.id).then(() => {
        // this.refresh() // Problema -> rendiment
        this.removeTag(this.tagBeingRemoved)
        this.deleteDialog = false
        this.tagBeingRemoved = null
        this.$snackbar.showMessage("El Tag s'ha esborrat correctament")
        this.removing = false
      }).catch(error => {
        this.$snackbar.showError(error.message)
        this.removing = false
      })
    },
    edit () {
      window.axios.put('/api/v1/tags/' + this.tagBeingEdited.id, this.tagBeingEdited).then((response) => {
        this.editTag(response.data)
        this.$snackbar.showMessage("El tag s'ha editat correctament")
        this.editDialog = false
      }).catch(error => {
        this.$snackbar.showError(error)
      })
    },
    refresh () {
      this.loading = true
      window.axios.get('/api/v1/tags').then(response => {
        this.dataTags = response.data
        this.loading = false
        this.$snackbar.showMessage('Tags actualitzats correctament')
      }).catch(error => {
        console.log(error)
        this.loading = false
      })
    },
    created () {
      console.log('Usuari logat')
      console.log(window.laravel_user)
    }
  }
}
</script>
