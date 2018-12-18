<template>
    <v-form action="/login" method="POST">

        <v-toolbar dark color="primary">
            <v-toolbar-title>Login form</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn href="/" icon flat title="Home"><v-icon>exit_to_app</v-icon></v-btn>
        </v-toolbar>
        <v-card-text>
            <input type="hidden" name="_token" :value="csrfToken">
            <v-text-field
                    prepend-icon="person"
                    name="email"
                    label="Login"
                    type="text"
                    v-model="dataEmail"
                    :error-messages="emailErrors"
                    @input="$v.dataEmail.$touch()"
                    @blur="$v.dataEmail.$touch()"
            ></v-text-field>
            <v-text-field
                    id="password"
                    prepend-icon="lock"
                    name="password"
                    type="password"
                    label="Password"
                    v-model="password"
                    :error-messages="passwordErrors"
                    @input="$v.password.$touch()"
                    @blur="$v.password.$touch()"
            ></v-text-field>
            <!--<p class="text-xs-center">No recordes la contrasenya? <email-form-password-reset :email="email"></email-form-password-reset></p>-->
            <p class="text-xs-center">No recordes la contrasenya? <a href="/password/reset">Recupera-la!</a></p>
            <p class="text-xs-center">No tens compte d'usuari? <a href="/register">Registrat!</a></p>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="primary" type="submit" :disabled="$v.$invalid">Login</v-btn>
        </v-card-actions>
    </v-form>
</template>

<script>

import { validationMixin } from 'vuelidate'
import { required, minLength, email } from 'vuelidate/lib/validators'
import VListTile from 'vuetify/lib/components/VList/VListTile'
import EmailFormPasswordReset from './EmailFormPasswordReset'

export default {
  name: 'LoginForm',
  components: { VListTile,
    'email-form-password-reset': EmailFormPasswordReset
  },
  mixins: [validationMixin],
  validations: {
    dataEmail: { required, email },
    password: { required, minLength: minLength(6) }
  },

  data () {
    return {
      dataEmail: this.email,
      password: ''
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
    },
    passwordErrors () {
      const errors = []
      if (!this.$v.password.$dirty) return errors
      !this.$v.password.minLength && errors.push('El camp password ha de tenir un mida minima de 6 caracters')
      !this.$v.password.required && errors.push('El password es obligatori.')
      return errors
    }
  }
}
</script>
