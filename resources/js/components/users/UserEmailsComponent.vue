<template>
    <v-menu offset-y>
        <v-tooltip bottom slot="activator">
            <v-btn  slot="activator"
                    icon
                    style="margin: 0px"
                    :loading="loading"
                    :disabled="loading">
                <v-icon color="primary">email</v-icon>
            </v-btn>
            <span>Enviar emails</span>
        </v-tooltip>
        <v-list>
            <v-list-tile @click="send('sendWelcomeEmail')" >
                <v-list-tile-title>Benvinguda</v-list-tile-title>
            </v-list-tile>
            <v-list-tile @click="send('sendResetPasswordEmail')" >
                <v-list-tile-title>Restauració paraula de pas</v-list-tile-title>
            </v-list-tile>
            <v-list-tile @click="send('sendConfirmationEmail')" >
                <v-list-tile-title>Confirmació email personal</v-list-tile-title>
            </v-list-tile>
        </v-list>
    </v-menu>
</template>

<script>
import api from './../api/emails/user_emails'
export default {
  name: 'UserEmails',
  data () {
    return {
      loading: false
    }
  },
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  methods: {
    async send (method) {
      let res = await this.$confirm(this.messages[method], { title: 'Esteu segurs?', buttonTrueText: 'Enviar' })
      if (res) {
        this.sendEmail(method)
      }
    },
    sendEmail (method) {
      this.loading = true
      api[method](this.user).then(() => {
        this.loading = false
        this.$snackbar.showMessage('Missatge enviat correctament')
      }).catch(() => {
        this.loading = false
      })
    }
  },
  created () {
    this.messages = {
      'sendWelcomeEmail': "Voleu tornar a enviar l'email de benvinguda a l'usuari?",
      'sendResetPasswordEmail': 'Voleu enviar email per canviar paraula de pas?',
      'sendConfirmationEmail': "Voleu enviar email per confirmar correu electrònic personal de l'usuari?"
    }
  }
}
</script>
