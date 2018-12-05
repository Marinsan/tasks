<template>
    <v-switch :loading="loading" :disabled="loading"  v-model="dataTask.completed" :label="dataTask.completed ? 'Completada' : 'Pendent'"></v-switch>
</template>

<script>
export default {
  name: 'taskCompletedToggle',
  data () {
    return {
      loading: false,
      dataTask: this.task
    }
  },
  props: {
    task: {
      type: Object,
      required: true
    }
  },
  watch: {
    dataTask: {
      handler: function (dataTask) {
        if (dataTask.completed) this.completeTask()
        else this.uncompleteTask()
      },
      deep: true
    },
    task (task) {
      this.dataTask = task
    }
  },
  methods: {
    uncompleteTask () {
      window.axios.delete('/api/v1/completed_task/' + this.task.id).then(() =>{
        this.loading = false
        this.$snackbar.showMessage('Tasca descompletada correctament')
      }).catch(error =>{
        this.$snackbar.showError(error)
        this.loading = false
      })
    },
    completeTask () {
      window.axios.post('/api/v1/completed_task/' + this.task.id).then(() =>{
        this.loading = false
        this.$snackbar.showMessage('Tasca completada correctament')
      }).catch(error =>{
        this.$snackbar.showError(error)
        this.loading = false
      })
    }
  }
}
</script>
