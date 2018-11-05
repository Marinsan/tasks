<template>
    <v-container grid-list-md text-xs-center id="tasks" class="tasks">
        <v-layout row wrap>
            <v-flex xs12 sm6 offset-sm3>
                <v-card>
                   <v-toolbar color="indigo" dark>
                    <v-toolbar-title>Tasques ({{total}})</v-toolbar-title>
                    <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-card-text class="px-0">
                        <form>
                            <v-text-field
                                    type="text"
                                    v-model="newTask" @keyup.enter="add"
                                    name="name"
                                    required>
                            </v-text-field>
                            <v-btn id="button_add_task" @click="add">Afegir</v-btn>
                        </form>

                        <div v-if="errorMessage">
                            Ha succeit un error: {{ errorMessage }}
                        </div>
                        <v-list dense>
                            <v-list-tile v-for="task in filteredTasks" :key="task.id">
                                <v-list-tile-content>
                                    <v-list-tile-title>
                                        <span :id="'task' + task.id" :class="{ strike: task.completed }">
                                        </span>
                                        <editable-text
                                                :text="task.name"
                                                @edited="editName(task, $event)"
                                        ></editable-text>
                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>

                        <span id="filters" v-show="total > 0">
        <h3>Filtros:</h3>
        Active filter: {{ filter }}
        <ul>
            <li><button @click="setFilter('all')">Totes</button></li>
            <li><button @click="setFilter('completed')">Completades</button></li>
            <li><button @click="setFilter('active')">Pendents</button></li>
        </ul>
    </span>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import EditableText from './EditableText'
var filters = {
  all: function (tasks) {
    return tasks
  },
  completed: function (tasks) {
    return tasks.filter(function (task) {
      // return task.completed
      if (task.completed === '1') return true
      else return false
    })
  },
  active: function (tasks) {
    return tasks.filter(function (task) {
      // return !task.completed
      if (task.completed === '0') return true
      else return false
    })
  }
}
export default {
  name: 'Tasks',
  components: {
    'editable-text': EditableText
  },
  data () {
    return {
      filter: 'all',
      newTask: '',
      dataTasks: this.tasks,
      errorMessage: null
    }
  },
  props: {
    tasks: {
      type: Array,
      default: function () {
        return []
      }
    }
  },
  computed: {
    total () {
      return this.dataTasks.length
    },
    filteredTasks () {
      return filters[this.filter](this.dataTasks)
    }
  },
  watch: {
    tasks (newTasks) {
      this.dataTasks = newTasks
    }
  },
  methods: {
    editName (task, text) {
      task.name = text
    },
    setFilter (newFilter) {
      this.filter = newFilter
    },
    add () {
      window.axios.post('/api/v1/tasks', {
        name: this.newTask
      }).then((response) => {
        console.log('response')
        console.log(response.data)
        this.dataTasks.splice(0, 0, { id: response.data.id, name: this.newTask, completed: false })
        this.newTask = ''
      }).catch((error) => {
        console.log(error)
      })
    },
    remove (task) {
      window.axios.delete('/api/v1/tasks/' + task.id).then((response) => {
        this.dataTasks.splice(this.dataTasks.indexOf(task), 1)
      }).catch((error) => {
        console.log(error)
      })
    }

  },
  created () {
    //  si tinc prop tasks no fer res
    //  sino vull fer peticio a la api per obtenir les tasques
    if (this.tasks.length === 0) {
      // axios.get('/api/v1/tasks')
      // console.log('entra en if')
      window.axios.get('/api/v1/tasks').then((response) => {
        // console.log('xivato ok')
        this.dataTasks = response.data
      }).catch((error) => {
        this.errorMessage = error.response.data
      })
    }
  }
}

</script>

<style>
.strike {
    text-decoration: line-through;
}
    .cursor-pointer:hover {
        cursor: pointer;
    }
</style>
