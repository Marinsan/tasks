<template>
    <v-form>
        <v-text-field readonly v-model="name" label="Nom" hint="El nom de la tasca..." placeholder="Nom de la tasca"></v-text-field>
        <!--TODO toggle component? -->
        <v-switch readonly v-model="completed" :label="completed ? 'Completada' : 'Pendent'"></v-switch>
        <v-textarea readonly v-model="description" label="Descripció" hint="bla bla bla..."></v-textarea>
        <!--// TODO canviar a user-select-->
        <user-select :readonly="true" v-model="user" :users="dataUsers" label="Usuari"></user-select>
        <div class="text-xs-center">
            <v-btn flat @click="$emit('close')">
                <v-icon class="mr-1">exit_to_app</v-icon>
                Cancel·lar
            </v-btn>
        </div>
    </v-form>
</template>
<script>
import UserSelect from './UserSelect'

export default {
  name: 'TaskShowForm',
  components: {
    'user-select': UserSelect
  },
  data () {
    return {
      name: this.task.name,
      description: this.task.description,
      completed: this.task.completed,
      user: null,
      dataUsers: this.users,
      working: false
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
    showUser (task) {
      this.user = this.users.find((user) => {
        return parseInt(user.id) === parseInt(task.user_id)
      })
    }
  },
  created () {
    this.showUser(this.task)
  }
}
</script>
