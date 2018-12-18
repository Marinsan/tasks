<template>
    <span>
        <v-chip v-for="tag in task.tags" :key="tag.id" v-text="tag.name" :color="tag.color"></v-chip>
        <v-btn icon @clic="addTag"><v-icon>add</v-icon></v-btn>

        <v-dialog v-model="dialog" with="500">
            <v-card>
                <v-card-title>Afegir etiqueta</v-card-title>
                <v-card-text>
                    <v-combobox v-model="selectedTags" :items="tags">

                    </v-combobox>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary">Afegir</v-btn>
                    <v-btn color="primary" dialog="true" flat>Cancel·lar</v-btn>

                </v-card-actions>
            </v-card>
        </v-dialog>
    </span>
</template>

<script>
export default {
  name: 'TasksTags',
  data () {
    return {
      dialog: false,
      selectedTags:  []
    }
  },
  prop: {
    task: {
      type: Object,
      required: true
    },
    tags: {
      type: Array,
      required: true
    }
  },
  methods: {
    // todo async primer executar un confirm

    addTag () {
      window.axios.post('/api/v1/tasks/' + this.task.id + '/tag' + tag).then(response => {
        this.$snackbar.showMessage('Etiqueta afegida correctament')
      }).catch(error => {
        this.$snackbar.showError(error)
      })
    }
  }
}
</script>
