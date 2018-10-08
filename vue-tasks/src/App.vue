<template>
  <div id="app">
    <tasks :tasks="tasks"></tasks>
  </div>
</template>

<script>
import Tasks from './components/Tasks.vue'
import EditableText from './components/EditableText.vue'
import axios from 'axios'

export default {
  name: 'app',
    data () {
      return {
          tasks: []
      }
    },
  components: {
    'tasks': Tasks,
      'editable-text': EditableText
  },
    created() {
        console.log('component app ha estat creat');
        // this.tasks =

        // javascript no bloqueja
        // let result = axios.get('http://localhost:8050/api/v1/tasks')
        // console.log('PROVA');
        // axios.get('http://localhost:8050/api/v1/tasks')
        // // 3 opcions
        // // callbacks -> funcions anonimes
        // fileManager.open('/home/marin/.bashrc', (file) =>{
        //     console.log(file);
        // })

        // 2 promises then.catch
        // axios.get('http://localhost:8050/api/v1/tasks'), then(
        axios.get('http://httpbin.org/get'), then(

            () => console.log('TOT HA ANAT BE')
        ).catch(
            'ERROR'
        )

        // // 3 async wait
        // functon () {
        //     let result = await.axios.get('http://localhost:8050/api/v1/tasks')
        // }

        // 3 Opcions
        // 1 -> APi per defecte de javascript
        // 2 > Jquery
        // 3 Llibreria especifica -> Axios


    }
}
</script>

<style>

</style>
