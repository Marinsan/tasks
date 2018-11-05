<template>
    <v-container grid-list-md text-xs-center id="tags" class="tags">
        <v-layout row wrap>
            <v-flex xs12 sm6 offset-sm3>
                <v-card>
                    <v-toolbar color="indigo" dark>
                        <v-toolbar-title>Tags ({{total}})</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-card-text class="px-0">
                        <form>
                            <v-text-field
                                    type="text"
                                    v-model="newTag" @keyup.enter="add"
                                    name="name"
                                    required>
                            </v-text-field>
                            <v-btn id="button_add_tag" @click="add">Afegir</v-btn>
                        </form>

                        <div v-if="errorMessage">
                            Ha succeit un error: {{ errorMessage }}
                        </div>
                        <v-list dense>
                            <v-list-tile>
                                <v-list-tile-content>
                                    <v-list-tile-title>

                                    </v-list-tile-title>
                                </v-list-tile-content>
                            </v-list-tile>
                        </v-list>
                    </v-card-text>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import EditableText from './EditableText'

export default {
  name: 'Tags',
  components: {
    'editable-text': EditableText
  },
  data () {
    return {
      newTag: '',
      dataTags: this.tags,
      errorMessage: null
    }
  },
  props: {
    tags: {
      type: Array,
      default: function () {
        return []
      }
    }
  },
  computed: {
    total () {
      return this.dataTags.length
    }
  },
  watch: {
    tags (newTags) {
      this.dataTags = newTags
    }
  },
  methods: {
    editName (tag, text) {
      tag.name = text
    },
    add () {
      window.axios.post('/api/v1/tags', {
        name: this.newTag
      }).then((response) => {
        console.log('response')
        console.log(response.data)
        this.dataTags.splice(0, 0, { id: response.data.id, name: this.newTag, completed: false })
        this.newTag = ''
      }).catch((error) => {
        console.log(error)
      })
    },
    remove (tag) {
      window.axios.delete('/api/v1/tags/' + tag.id).then((response) => {
        this.dataTags.splice(this.dataTags.indexOf(tag), 1)
      }).catch((error) => {
        console.log(error)
      })
    }

  },
  created () {
    //  si tinc prop tags no fer res
    //  sino vull fer peticio a la api per obtenir les tasques
    if (this.tags.length === 0) {
      // axios.get('/api/v1/tags')
      // console.log('entra en if')
      window.axios.get('/api/v1/tags').then((response) => {
        // console.log('xivato ok')
        this.dataTags = response.data
      }).catch((error) => {
        this.errorMessage = error.response.data
      })
    }
  }
}

</script>

<style>
    .strike {
        text-decoration: line-through;
    }
    .cursor-pointer:hover {
        cursor: pointer;
    }
</style>
