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

        <task-create v-if="$can('user.tasks.store', tasks)" :users="users" :uri="uri" @created="refresh"></task-create>
        <task-list :users="users" :uri="uri" :tasks="tasks"></task-list>
        <task-show :users="users" :uri="uri"></task-show>

    </span>
</template>

<script>
import TaskCompletedToggle from './TaskCompletedToggle'
import Toggle from './Toggle'
import TaskCreate from './TaskCreate'
import UserSelect from './UserSelect'
import TaskShow from './TaskShow'
import TaskList from './TaskList'

export default {
  name: 'Tasques',
  components: {
    'user-select': UserSelect,
    'task-create': TaskCreate,
    'task-show': TaskShow,
    'task-list': TaskList,
    'task-completed-toggle': TaskCompletedToggle,
    'toggle': Toggle
  },
  data () {
    return {
      taskBeingEdited: '',
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
      editDialog: false,
      user: {
        user_id: ''
      },
      loading: false,
      editing: false,
      removing: null,
      dataTasks: this.tasks
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

  methods: {
    add (task) {
      this.dataTasks.push(task)
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
    edit () {
      window.axios.put(this.uri + '/' + this.taskBeingEdited.id, this.taskBeingEdited).then((response) => {
        this.editTask(response.data)
        this.$snackbar.showMessage("S'ha editat correctament la tasca")
        this.editDialog = false
        this.refresh()
      }).catch(error => {
        this.$snackbar.showError(error)
      })
    }
  }
}
</script>
