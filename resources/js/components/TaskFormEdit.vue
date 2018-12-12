<template>
        <v-form>
            <v-text-field v-model="name" label="Nom" hint="Nom de la tasca" placeholder="Nom de la tasca"></v-text-field>
            <v-switch v-model="completed" :label="completed ? 'Completada':'Pendent'"></v-switch>
            <v-textarea v-model="description" label="Descripció"></v-textarea>
            <user-select @selected="setUser" :users="dataUsers" label="Usuari"></user-select>
            <div class="text-xs-center">
                <v-btn @click="dialog=false">
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
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required } from 'vuelidate/lib/validators'
import UserSelect from './UserSelect'

export default {
  name: 'TaskFormEdit',
  mixins: [validationMixin],
  validations: {
    name: { required }
  },
  components: {
    'user-select': UserSelect
  },
  data () {
    return {
      name: '',
      completed: false,
      description: '',
      dataUsers: this.users,
      loading: false,
      user_id: null
    }
  },
  props: {
    users: {
      type: Array,
      required: true
    },
    uri: {
      type: String,
      default: '/api/v1/tasks'
    }
  },
  computed: {
    nameErrors () {
      const errors = []
      if (!this.$v.name.$dirty) return errors
      !this.$v.name.required && errors.push('El camp name és obligatori.')
      return errors
    }
  },
  methods: {
    edit () {
      this.loading = true
      const task = {
        'name': this.name,
        'description': this.description,
        'completed': this.completed,
        'user_id': this.user_id
      }
      window.axios.put(this.uri + '/' + this.id, this.task).then((response) => {
        this.$emit('edited', response.data)
        this.$snackbar.showMessage("S'ha editat correctament la tasca")
        this.dialog = false
        this.$emit('close')
      }).catch(error => {
        this.$snackbar.showError(error)
      })
    },
    setUser ($event) {
      this.user_id = $event
    }
  }
}
</script>
