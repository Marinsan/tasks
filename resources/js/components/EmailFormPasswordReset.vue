<template>
    <span>
    <v-dialog
            v-model="dialog"
            @keydown.esc="dialog=false"
            max-width="290"
    >
        <v-card>
            <v-toolbar dark color="primary">
                <v-toolbar-title>Recuperar password</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn @click="dialog=false" icon flat title="Login"><v-icon>exit_to_app</v-icon></v-btn>
            </v-toolbar>
            <v-card-text>
                <p>Introdueix el teu email per enviar-te la contrasenya</p>
                <v-layout>
                    <v-form method="POST" action="/password/reset">

                        <input type="hidden" name="_token" :value="csrfToken">

                         <v-text-field id="email" type="email" name="email" required autofocus></v-text-field>

                        <v-btn type="submit" icon><v-icon>send</v-icon></v-btn>

                </v-form>
                </v-layout>
            </v-card-text>
        </v-card>
    </v-dialog>

        <a @click="dialog=true">Recupera-la!</a>
        </span>
</template>

<script>
export default {
  name: 'EmailFormPasswordReset',
  data () {
    return {
      dialog: false,
      dataEmail: this.email
    }
  },
  props: ['csrfToken']
}
</script>
