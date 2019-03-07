<template>
    <v-card class="elevation-0 text-xs-center" style="width: 400px;">
        <v-card-title style="align-items: center;justify-content: center;">
            <span class="title">Llista de correu electrònic</span>
            <em class="subheading">Apunta't i sigues el primer en rebre tota la informació sobre l'Institut de l'Ebre!</em>
        </v-card-title>
        <v-card-text>
            <v-form v-model="valid">
                <v-text-field
                        name="email"
                        label="E-mail"
                        v-model="email"
                        :rules="emailRules"
                        required
                        box
                        autofocus
                        auto-grow
                ></v-text-field>
            </v-form>
            <v-btn
                    :loading="loading"
                    :disabled="loading"
                    class="primary"
                    dark
                    large
                    @click.native="subscribe"
            >
                Apunta'm
            </v-btn>
        </v-card-text>
    </v-card>
</template>

<script>
  export default {
    name: 'NewsLetterSubscriptionCard',
    data () {
      return {
        valid: false,
        loading: false,
        email: '',
        emailRules: [
          (v) => !!v || 'El email és obligatori',
          (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'S\'ha d\'indicar un correu electrònic vàlid'
        ]
      }
    },
    methods: {
      subscribe () {
        this.loading = true
        window.axios.post('/api/v1/newsletter', { 'email': this.email }).then(() => {
          this.$snackbar.showMessage("La subscripció s'ha realitzar correctament")
        }).catch(error => {
          console.log(error)
          this.$snackbar.showError(error)
        }).then(() => {
          this.loading = false
        })
      },
      todo () {
        if (navigator.serviceWorker) {
          navigator.serviceWorker.ready
            .then(function (registration) {
              console.log('A service worker is active:', registration.active)

              document.getElementById('submitForm').addEventListener('click', (event) => {
                if (registration.sync) {
                  registration.sync.register('example-sync')
                    .catch(function (err) {
                      // console.log('TODO SUBSCRIPTION')
                      // subscribe()
                      return err
                    })
                } else {
                  if (navigator.onLine) {
                    console.log('TODO SUBSCRIPTION')
                    // subscribe()
                  } else {
                    alert("You are offline! When your internet returns, we'll finish up your request.")
                  }
                }
              })
            })
        }
      }
    }
  }
</script>