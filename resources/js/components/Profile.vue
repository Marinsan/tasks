<template>
    <v-container
            fill-height
            fluid
            grid-list-xl>
        <v-layout
                justify-center
                wrap
        >
            <v-flex
                    xs12
                    md8
            >
                <v-card>
                    <v-toolbar color="primary">
                        <v-toolbar-title class="white--text">Perfil</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-form class="mt-4">
                        <v-container py-0>
                            <v-layout wrap>
                                <v-flex
                                        xs12
                                        md6
                                >
                                    <v-text-field
                                            v-model="name"
                                            class="purple-input"
                                            label="User Name"

                                    />

                                </v-flex>
                                <v-flex
                                        xs12
                                        md6
                                >
                                    <v-text-field
                                            v-model="email"
                                            label="Email Address"
                                            class="purple-input"/>
                                </v-flex>
                                <v-flex
                                        xs12
                                        md6
                                >
                                    <v-text-field

                                            label="Admin"
                                            class="purple-input"/>
                                </v-flex>
                                <v-flex
                                        xs12
                                        md6
                                >
                                    <v-text-field

                                            label="Roles"
                                            class="purple-input"/>
                                </v-flex>
                                <v-flex
                                        xs12
                                        md12
                                >
                                    <v-text-field
                                            label="Permissions"
                                            class="purple-input"/>
                                </v-flex>

                                <v-flex
                                        xs12
                                        text-xs-right
                                >
                                    <v-btn
                                            class="mx-0 font-weight-light"
                                            color="success"
                                    >
                                        Modificar
                                    </v-btn>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-form>
                </v-card>
            </v-flex>
            <v-flex
                    xs12
                    md4
            >
                <material-card class="v-card-profile">
                    <v-avatar
                            slot="offset"
                            class="mx-auto d-block"
                            size="130"
                    >
                        <img

                                ref="img_avatar"
                                src="/user/avatar"
                                @click="selectFilesAvatar"
                        >
                    </v-avatar>
                    <v-card-text class="text-xs-center">
                        <p>Username here</p>
                        <form action="/avatar" method="POST" enctype="multipart/form-data">
                            <input type="file" name="avatar" id="avatar-file-input" ref="avatar" accept="image/*" @change="uploadAvatar">
                            <input type="hidden" name="_token" :value="csrf_token">
                        </form>
                        <v-btn
                                color="success"
                                round
                                class="font-weight-light"
                                @click="selectFilesAvatar"
                                :loading="uploadingAvatar"
                                :disabled="uploadingAvatar"
                        >Upload Avatar</v-btn>
                        <v-progress-linear
                                v-model="percentCompletedAvatar"
                                :active="uploadingAvatar"
                        ></v-progress-linear>

                    </v-card-text>
                </material-card>
                <material-card class="v-card-profile">
                    <v-avatar
                            slot="offset"
                            class="mx-auto d-block"
                            size="130"
                    >
                        <img
                                ref="img_photo"
                                src="/user/photo"
                                @click="selectFiles"
                        >
                    </v-avatar>
                    <v-card-text class="text-xs-center">
                        <p>Username here</p>
                        <form action="/photo" method="POST" enctype="multipart/form-data">
                            <input type="file" name="photo" id="photo-file-input" ref="photo" accept="image/*" @change="upload">
                            <input type="hidden" name="_token" :value="csrf_token">
                        </form>
                        <v-btn
                                color="success"
                                round
                                class="font-weight-light"
                                @click="selectFiles"
                                :loading="uploading"
                                :disabled="uploading"
                        >Upload Photo</v-btn>
                        <v-progress-linear
                                v-model="percentCompleted"
                                :active="uploading"
                        ></v-progress-linear>
                    </v-card-text>
                </material-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import MaterialCard from './ui/MaterialCard'
export default {
  components: {
    'material-card': MaterialCard
  },
  name: 'Profile',
  data () {
    return {
      uploading: false,
      uploadingAvatar: false,
      percentCompletedAvatar: 0,
      percentCompleted: 0,
      name: this.user.name,
      email: this.user.email
    }
  },
  methods: {
    preview () {
      if (this.$refs.photo.files && this.$refs.photo.files[0]) {
        var reader = new FileReader()
        reader.onload = e => {
          this.$refs.img_photo.setAttribute('src', e.target.result)
        }
        reader.readAsDataURL(this.$refs.photo.files[0])
      }
    },
    save (formData) {
      this.uploading = true
      var config = {
        onUploadProgress: progressEvent => {
          this.percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
        }
      }
      window.axios.post('/api/v1/user/photo', formData, config)
        .then(() => {
          this.uploading = false
          this.$snackbar.showMessage('La foto ha estat pujada correctament!')
        })
        .catch(error => {
          console.log(error)
          this.$snackbar.showError(error)
          this.uploading = false
        })
    },
    selectFiles () {
      this.$refs.photo.click()
    },
    upload () {
      const formData = new FormData()
      formData.append('photo', this.$refs.photo.files[0])
      // Preview it
      this.preview()
      // save it
      this.save(formData)
    },
    previewAvatar () {
      if (this.$refs.avatar.files && this.$refs.avatar.files[0]) {
        var reader = new FileReader()
        reader.onload = e => {
          this.$refs.img_avatar.setAttribute('src', e.target.result)
        }
        reader.readAsDataURL(this.$refs.avatar.files[0])
      }
    },
    saveAvatar (formData) {
      this.uploadingAvatar = true
      var config = {
        onUploadProgress: progressEvent => {
          this.percentCompletedAvatar = Math.round((progressEvent.loaded * 100) / progressEvent.total)
        }
      }
      window.axios.post('/api/v1/user/avatar', formData, config)
        .then(() => {
          this.uploadingAvatar = false
          this.$snackbar.showMessage('El avatar ha estat pujat correctament!')
        })
        .catch(error => {
          console.log(error)
          this.$snackbar.showError(error)
          this.uploadingAvatar = false
        })
    },
    selectFilesAvatar () {
      this.$refs.avatar.click()
    },
    uploadAvatar () {
      const formData = new FormData()
      formData.append('avatar', this.$refs.avatar.files[0])
      // Preview it
      this.previewAvatar()
      // save it
      this.saveAvatar(formData)
    }
  },
  created () {
    this.csrf_token = window.csrf_token
  },
  props: {
    user: {
      type: Object,
      required: true
    }
  }
}
</script>

<style scoped>
    input[type=file] {
        position: absolute;
        left: -99999px;
    }
</style>
