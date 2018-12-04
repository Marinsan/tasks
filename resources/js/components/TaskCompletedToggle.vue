<template>
    <v-switch v-model="dataTask.completed" :loading="loading" :disabled="loading" :label="dataTask.completed ? 'Completada' : 'Pendent'"></v-switch>
</template>

<script>
export default {
  name: 'TaskcompletedToggle',
  data () {
    return {
      loading: null,
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
      handler: function (dataTask, oldDataTask) {
        if (dataTask.completed) this.completeTask()
        else this.uncompleteTask()
      },
      deep: true
    },
    // dataTask (task) {
    //   if (task.completed) this.completeTask()
    //   else this.uncompleteTask()
    // },
    task (task) {
      this.dataTask = task
    }
  },
  methods: {
    uncompleteTask () {
      this.loading = true
      window.axios.delete('/api/v1/completed_task/' + this.task.id)
      console.log('TODO AXIOS UNCOMPLETE TASK')
    },
    completeTask () {
      window.axios.post('/api/v1/completed_task/' + this.task.id)
      console.log('TODO AXIOS COMPLETE TASK')
    }
  }
}
</script>
