<template>
    <span>
        <v-dialog v-model="dialog" :fullscreen="$vuetify.breakpoint.smAndDown" transition="dialog-bottom-transition">
            <v-toolbar color="primary" class="white--text">
            <v-btn flat icon class="white--text" @click="dialog=false">
                <v-icon>close</v-icon>
            </v-btn>
            <v-toolbar-title class="white--text">Crear Tasca</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn flat class="white--text" @click="dialog=false">
                <v-icon class="mr-1">exit_to_app</v-icon>
                Sortir
            </v-btn>
            <v-btn flat class="white--text">
                <v-icon class="mr-1">save</v-icon>
                Afegir
            </v-btn>
        </v-toolbar>
            <v-card>
                <v-card-text>
                    <task-form :users="users" :uri="uri" @close="dialog=false" @created="created" ></task-form>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-tooltip top>
      <v-btn
              slot="activator"
              dark
              @click="dialog = true"
              fab
              bottom
              right
              fixed
              color="accent"
              class="white--text"
      >
         <v-icon>add</v-icon>
      </v-btn>
      <span>Crear Tasca</span>
    </v-tooltip>

    </span>
</template>

<script>
import TaskForm from './TaskForm'
import EventBus from './../../eventBus'

export default {
  name: 'TaskCreate',
  components: {
    'task-form': TaskForm
  },
  data () {
    return {
      dialog: false
    }
  },
  props: {
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
    update (task) {
      this.refresh()
    },
    created (task) {
      this.$emit('created', task)
    }
  },
  mounted () {
    EventBus.$on('cta', () => {
      this.dialog = true
    })
  }
}
</script>
