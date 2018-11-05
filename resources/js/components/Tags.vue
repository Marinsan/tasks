<template>

    <div id="tags" class=" tags flex justify-center">
        <div class="flex flex-col">
            <h1 class="text-center text-red-light">Tags ({{total}})</h1>
            <div>
                <form>
                    <input type="text"
                           v-model="newTag" @keyup.enter="add"
                           placeholder="Nou Tag"
                           required class="m-3 p-2 shadow border rounded focus:outline-none focus:shadow-outline text-grey-dark">
                    <svg id="button_add_tag" @click="add" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/></svg>
                </form>
            </div>
            <div v-if="errorMessage">
                Ha succeit un error: {{ errorMessage }}
            </div>

            <span :id="'tag' + tag.id">
                <editable-text
                        :text="tag.name"
                        @edited="editName(tag, $event)"
                ></editable-text>
            </span>

                &nbsp;

                <span :id="'delete_tag_id' + tag.id" @click="remove(tag)" class="cursor-pointer">&#215;</span>
            </div>
            <br>
        </div>

    </div>

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
    },
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
