<template>
    <span>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition"
              @keydown.esc="dialog=false">
        <v-toolbar color="blue darken-3" class="white--text">
            <v-btn icon flat class="white--text">
                <v-icon class="mr-1" @click="dialog=false">close</v-icon>
            </v-btn>
            <v-toolbar-title class="white--text">Mostrar tasca</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat class="white--text" @click="dialog=false">
                <v-icon class="mr-1" >exit_to_app</v-icon>
                SORTIR
            </v-btn>
        </v-toolbar>
        <v-card>
            <v-card-text>
                    <task-show-form :task="task" :uri="uri" :users="users" @close="dialog=false" @show="show"></task-show-form>
            </v-card-text>
        </v-card>
    </v-dialog>
        <v-tooltip top>

         <v-btn v-if="$can('user.tasks.show', task)" slot="activator" dark  icon color="primary" flat  @click="dialog=true">
             <v-icon>visibility</v-icon>
        </v-btn>
             <span>Mostrar la tasca</span>
          </v-tooltip>

</span>
</template>

<script>
import TaskShowForm from './TaskShowForm'
export default {
  name: 'TaskShow',
  components: {
    'task-show-form': TaskShowForm
  },
  data () {
    return {
      dialog: false
    }
  },
  props: {
    task: {
      type: Object,
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
    show (task) {
      this.$emit('show', task)
    }
  }
}
</script>
