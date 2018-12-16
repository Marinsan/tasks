<template>
    <span>
        <task-create v-if="$can('user.tasks.store', tasks)" :users="users" :uri="uri" @created="add"></task-create>
        <task-list :users="users" :uri="uri" :tasks="tasks"></task-list>
    </span>
</template>

<script>
import TaskCreate from './TaskCreate'
import TaskList from './TaskList'
export default {
  name: 'Tasques',
  components: {
    'task-create': TaskCreate,
    'task-list': TaskList
  },
  data () {
    return {
      dataTasks: this.tasks
    }
  },
  props: {
    tasks: {
      type: Array,
      required: true
    },
    users: {
      type: Array,
      required: true
    },
    uri: {
      type: String,
      required: true
    }
  },
  methods: {
    add (task) {
      this.dataTasks.push(task)
    }
  }
}
</script>
