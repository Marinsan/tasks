<template>
    <span>
    <v-dialog
            v-model="dialog"
            @keydown.esc="dialog=false"
            max-width="290"
    >
        <v-card>
            <v-toolbar dark color="primary">
                <v-toolbar-title>Recupera la contrasenya</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn @click="dialog=false" icon flat title="Login"><v-icon>exit_to_app</v-icon></v-btn>
            </v-toolbar>
            <v-card-text>
                <p>Introdueix el teu email per enviar-te la contrasenya</p>
                <v-layout>
                    <input type="hidden" name="_token" :value="csrfToken">
                    <v-text-field
                            prepend-icon="person"
                            name="email"
                            label="Email"
                            type="text"
                            v-model="dataEmail"
                            :error-messages="emailErrors"
                            @input="$v.dataEmail.$touch()"
                            @blur="$v.dataEmail.$touch()"
                    ></v-text-field><v-btn icon><v-icon>send</v-icon></v-btn></v-layout>
            </v-card-text>
        </v-card>
    </v-dialog>

        <a @click="dialog=true">Recupera-la!</a>

        </span>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, email } from 'vuelidate/lib/validators'

export default {
  name: 'EmailFormPasswordReset',
  mixins: [validationMixin],
  validations: {
    dataEmail: { required, email }
  },
  data () {
    return {
      dialog: false,
      dataEmail: this.email
    }
  },
  props: ['email', 'csrfToken'],
  computed: {
    emailErrors () {
      const errors = []
      if (!this.$v.dataEmail.$dirty) return errors
      !this.$v.dataEmail.email && errors.push('El camp email ha de ser un email valid')
      !this.$v.dataEmail.required && errors.push('El email es obligatori.')
      return errors
    }
  }
}
</script>
