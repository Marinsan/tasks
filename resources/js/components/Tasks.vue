<template>
    <div class="flex justify-center">
    <div class="flex flex-col">
        <h1 class="text-center text-red-light">Tasques ({{total}})</h1>
        <div>
            <input type="text"
                   v-model="newTask" @keyup.enter="add"  placeholder="Nova Tasca" class="m-3 p-2 shadow border rounded focus:outline-none focus:shadow-outline text-grey-dark">
            <svg @click="add" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/></svg>

        </div>
        <div v-for="task in filteredTasks" :key="task.id">
            <span :class="{ strike: task.completed=='1'}">
                <editable-text
                        :text="task.name"
                        @edited="editName(task, $event)"
                ></editable-text>
            </span>
            &nbsp;
            <span @click="remove(task)" class="cursor-pointer">&#215;</span>
        </div>
        <br>
        <h3>Filtros</h3>
        <br>
            <div class="h-4">
                <button @click="setFilter('all')" class="bg-white hover:bg-grey-lightest text-grey-darkest font-semibold py-2 px-4 border border-grey-light rounded shadow">
                    Totes
                </button>
                &nbsp;
                <button @click="setFilter('completed')" class="bg-white hover:bg-grey-lightest text-grey-darkest font-semibold py-2 px-4 border border-grey-light rounded shadow">
                    Completades
                </button>
                &nbsp;
                <button @click="setFilter('active')" class="bg-white hover:bg-grey-lightest text-grey-darkest font-semibold py-2 px-4 border border-grey-light rounded shadow">
                    Pendents
                </button>
            </div>

    </div>

    </div>
</template>

<script>
    import EditableText from './EditableText'
    var filters = {
        all: function(tasks) {
            return tasks
        },
        completed: function(tasks) {
            return tasks.filter(function (task) {
                // return task.completed
                if (task.completed=='1') return true
                else return false
            })
        },
        active: function(tasks) {
            return tasks.filter(function (task) {
                // return !task.completed
                if (task.completed=='0') return true
                else return false
            })
        },
    }
    export default {
        name: 'Tasks',
        components: {
            'editable-text': EditableText
        },
        created() {
        },
        data() {
            return {
                filter: 'all',
                newTask: '',
                dataTasks: this.tasks
            }
        },
        props: {
            'tasks': {
                type: Array,
                default: function () {
                    return []
                }
            }
        },
        computed: {
            total() {
                return this.dataTasks.length
            },
            filteredTasks() {
                return filters[this.filter](this.dataTasks)
            }
        },
        watch: {
            tasks(newTasks) {
                this.dataTasks = newTasks
            }
        },
        methods: {
            editName(task,text) {
                task.name = text
            },
            setFilter(newFilter) {
                this.filter = newFilter
            },
            add() {
                this.dataTasks.splice(0,0,{ name: this.newTask, completed: false } )
                this.newTask=''
            },
            remove(task) {
                this.dataTasks.splice(this.dataTasks.indexOf(task),1)
            },
            created() {

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