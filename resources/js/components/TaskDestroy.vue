<template>
    <v-tooltip top>
        <v-btn slot="activator" dark v-if="$can('user.tasks.destroy', task)" icon color="accent" flat title="Eliminar la tasca"
               :loading="removing" :disabled="removing"
               @click="destroy(task)">
            <v-icon>delete</v-icon>
        </v-btn>
        <span>Eliminar la tasca</span>
    </v-tooltip>
</template>

<script>
export default {
  'name': 'TaskDestroy',
  data () {
    return {
      removing: false
    }
  },
  props: {
    task: {
      type: Object,
      required: true
    },
    uri: {
      type: String,
      required: true
    }
  },
  methods: {
    async destroy (task) {
      // ES6 async await
      let result = await this.$confirm('Les tasques esborrades no es poden recuperar',
        {
          title: 'Esteu segurs',
          buttonTrueText: 'Eliminar',
          buttonFalsetext: 'Cancel·lar',
          // icon: '',
          color: 'error'
        })
      if (result) {
        this.removing = true
        window.axios.delete(this.uri + '/' + task.id).then(() => {
          this.$emit('removed', task)
          this.deleteDialog = false
          task = null
          this.$snackbar.showMessage("S'ha esborrat correctament la tasca")
          this.removing = false
        }).catch(error => {
          this.$snackbar.showError(error.message)
          this.removing = false
        })
      }
    }
  }
}
</script>
