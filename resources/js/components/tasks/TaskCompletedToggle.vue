<template>
    <v-switch :readonly="readonly" :loading="loading" :disabled="loading" v-model="dataStatus" :label="dataTask.completed ? 'Completada' : 'Pendent'"></v-switch>
</template>

<script>
export default {
  name: 'Toggle',
  data () {
    return {
      dataStatus: this.status,
      dataTask: this.task,
      loading: false
    }
  },
  props: {
    task: {
      type: Object,
      required: true
    },
    status: {
      type: Boolean,
      required: true
    },
    readonly: {
      type: Boolean,
      default: false
    }
  },
  watch: {
    // task (task) {
    //   this.dataTask = task
    // },
    dataStatus: {
      handler: function (dataStatus) {
        if (dataStatus !== this.dataTask.completed) {
          if (dataStatus) this.completeTask()
          else this.uncompleteTask()
        }
      }
    },
    task (task) {
      this.dataTask = task
    },
    status (status) {
      this.dataStatus = status
    }
    // Watchers Imperativa NO DECLARATIVA

  },
  methods: {
    async uncompleteTask () {
      // LOADING I DISABLED TODO
      this.loading = true
      await window.axios.delete('/api/v1/completed_task/' + this.task.id).then((response) => {
        this.$snackbar.showMessage("S'ha descompletat correctament la tasca")
        this.loading = false
        this.dataTask.completed = false
      }).catch(error => {
        this.removing = null
        this.loading = null
        this.dataStatus = !this.dataStatus
      }) // TODO ACABAR
    },
    async completeTask () {
      this.loading = true
      await window.axios.post('/api/v1/completed_task/' + this.task.id).then((response) => {
        this.$snackbar.showMessage("S'ha completat correctament la tasca")
        this.loading = false
        this.dataTask.completed = true
      }).catch(error => {
        this.removing = null
        this.loading = null
        this.dataStatus = !this.dataStatus
      }) // TODO ACABAR
    }
  }
}
</script>
