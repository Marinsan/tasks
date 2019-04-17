<template>
    <v-tooltip bottom>
        <v-btn  slot="activator"
                icon
                style="margin: 0px"
                :loading="loading"
                :disabled="loading"
                @click="send">
            <v-icon color="primary">email</v-icon>
        </v-btn>
        <span>Enviar email confirmació correu electrònic personal</span>
    </v-tooltip>
</template>

<script>
import api from './../api/emails/user_emails'

export default {
  name: 'UserSendConfirmationEmail',
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
    async send () {
      let res = await this.$confirm("Voleu enviar email per confirmar correu electrònic personal de l'usuari?", { title: 'Esteu segurs?', buttonTrueText: 'Enviar' })
      if (res) {
        this.sendEmailConfirmation(t)
      }
    },
    sendEmailConfirmation () {
      this.loading = true
      api.sendConfirmationEmail(this.user).then(response => {
        this.$snackbar.showMessage('Correu electrònic enviat correctament')
        this.loading = false
      }).catch(error => {
        this.$snackbar.showError(error)
        this.loading = false
      })
    }
  }
}
</script>
