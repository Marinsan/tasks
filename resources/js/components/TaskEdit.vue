<template>
    <span>
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition"
                          @keydown.esc="dialog=false">
            <v-toolbar color="blue darken-3" class="white--text">
                <v-btn icon flat class="white--text">
                    <v-icon class="mr-1" @click="dialog=false">close</v-icon>
                </v-btn>
                <v-toolbar-title class="white--text">Editar Tasca</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn flat class="white--text" @click="dialog=false">
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
                    <task-form-edit :users="users" :uri="uri" @close="dialog=false" @edited="edited" ></task-form-edit>
                </v-card-text>
            </v-card>
        </v-dialog>
    </span>
</template>

<script>
import TaskFormEdit from './TaskFormEdit'
export default {
  name: 'TaskEdit',
  components: {
    'task-form-edit': TaskFormEdit
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
    edited (task) {
      this.$emit('edited', task)
    }
  }
}
</script>
