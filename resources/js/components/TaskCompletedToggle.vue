<template>
    <v-switch :loading="loading" :disabled="loading" v-model="dataTask.completed" :label="dataTask.completed ? 'Completada' : 'Pendent'"></v-switch>
</template>

<script>
export default {
  name: 'taskCompletedToggle',
  data () {
    return {
      dataTask: this.task,
      loading: false
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
      this.loading = true
      window.axios.delete('/api/v1/completed_task/' + this.task.id).then(() => {
        this.loading = false
      }).catch(error => {
        this.$snackbar.showError(error.message)
        this.loading = false
      })
    },
    completeTask () {
      this.loading = true
      window.axios.post('/api/v1/completed_task/' + this.task.id).then(() => {
        this.loading = false
      }).catch(error => {
        this.$snackbar.showError(error.message)
        this.loading = false
      })
    }
  }
}
</script>
