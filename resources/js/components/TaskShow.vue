<template>
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
                <v-form>
                    <task-form  readonly :users="users" :uri="uri" @close="dialog=false"></task-form>
                </v-form>
            </v-card-text>
        </v-card>
    </v-dialog>

</template>

<script>
import TaskForm from './TaskForm'
export default {
  name: 'TaskShow',
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
  }
}
</script>

<style scoped>

</style>
