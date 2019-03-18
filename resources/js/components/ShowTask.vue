<template>

    <v-layout>
        <v-flex xs12 sm6 offset-sm3>

        <v-card class="mb-4 justify-center elevation-10 mt-5"
                v-touch="{  left: () => call('delete', task) }"
        >

            <v-list>

                <v-flex class="v-avatar subheading ml-3">
                    <v-spacer></v-spacer>
                    <td v-if="task.user_id !== null" >
                        <v-tooltip bottom >
                        <v-avatar slot="activator" class="hidden-xs-only" size="70">
                            <img :src="task.user_gravatar" alt="gravatar">
                        </v-avatar>
                            <span>


                        <v-avatar class="hidden-lg-only hidden-xl-only hidden-md-only hidden-sm-only" size="45">
                            <img :src="task.user_gravatar" alt="gravatar">
                        </v-avatar>
                                <strong v-text="task.user_name"> </strong>
                                <br>
                                 <a v-text="task.user_email" ></a>
                <br>

                </span>
                        </v-tooltip>
                    </td>

                    <td v-else>
                        <v-avatar title="No user">
                            <img src="img/usuari.png" alt="gravatar">
                        </v-avatar>
                    </td>
                    <v-list>
                        <v-layout class="ml-2 mt-2">
                            <td class="ml-3 font-weight-thin headline"><p> {{ task.name }}</p></td>
                        </v-layout>
                        <v-layout>
                            <td class="ml-4 font-weight-thin title" style="color:blueviolet"><p> {{ task.user.name }}</p></td>
                        </v-layout>
                        <v-layout>
                            <td class="ml-4 font-weight-light"><p> {{ task.user.email }}</p></td>
                        </v-layout>
                    </v-list>

                </v-flex>

                <v-expansion-panel>
                    <v-expansion-panel-content
                    >
                        <template v-slot:header>
                            <div>Item</div>
                        </template>
                        <v-card>
                            <v-card-text class="grey lighten-3">
                                <td class="ml-3 font-weight-thin font-italic"><p> "{{ task.description }}"</p></td>
                            </v-card-text>
                        </v-card>
                    </v-expansion-panel-content>
                </v-expansion-panel>


            </v-list>

        </v-card>
        </v-flex>
    </v-layout>


</template>

<script>
export default {
  data () {
    return {
      dataTasks: this.task,
      user: '',
      user_id: '',
      loading: false,
      dataUsers: this.users
    }
  },
  props: ['task', 'users']
}
</script>

<style scoped>

</style>
