<template>
    <v-switch v-model="dataCompleted" :label="dataCompleted ? 'Completada' : 'Pendent'"></v-switch>
</template>

<script>
export default {
  name: 'toggle',
  data () {
    return {
      dataCompleted: this.completed
    }
  },
  props: {
    completed: {
      type: Boolean,
      required: true
    },
    id: {
      type: Number,
      required: true
    }
  },
  watch: {
    completed (completed) {
      this.dataCompleted = completed
    },
    dataCompleted: {
      handler: function (dataCompleted, olddataCompleted) {
        if (dataCompleted) this.complete()
        else this.uncomplete()
      },
      deep: true
    },
    task (task) {
      this.dataCompleted = task
    }
  },
  methods: {
    uncomplete () {
      console.log('TODO AXIOS UNCOMPLETE TASK')
    },
    complete () {
      window.axios.delete('v1/completed_task/{task}')
      console.log('TODO AXIOS COMPLETE TASK')
    }
  }
}
</script>
