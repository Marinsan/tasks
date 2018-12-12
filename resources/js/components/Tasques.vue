<template>
    <span>

        <task-create v-if="$can('user.tasks.store', tasks)" :users="users" :uri="uri"></task-create>
        <task-edit v-if="$can('user.tasks.update', tasks)" :users="users" :uri="uri"></task-edit>
        <task-list :users="users" :uri="uri" :tasks="tasks"></task-list>
        <task-show :users="users" :uri="uri"></task-show>
    </span>
</template>

<script>
import TaskCompletedToggle from './TaskCompletedToggle'
import Toggle from './Toggle'
import TaskCreate from './TaskCreate'
import UserSelect from './UserSelect'
import TaskShow from './TaskShow'
import TaskList from './TaskList'
import TaskEdit from './TaskEdit'

export default {
  name: 'Tasques',
  components: {
    'user-select': UserSelect,
    'task-create': TaskCreate,
    'task-show': TaskShow,
    'task-list': TaskList,
    'task-edit': TaskEdit,
    'task-completed-toggle': TaskCompletedToggle,
    'toggle': Toggle
  },
  data () {
    return {
      dataUsers: this.users,
      removing: null,
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
