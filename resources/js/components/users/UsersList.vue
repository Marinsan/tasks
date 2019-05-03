<template>
    <v-card class="ml-2 mr-2 mt-5">
        <v-toolbar dark color="primary elevation-2">
            <v-toolbar-title>
                Users
            </v-toolbar-title>
        </v-toolbar>
        <v-container fluid>
            <v-layout row>
                <v-flex class="ml-3" xs12 md4>
                    <v-text-field
                            v-model="search"
                            append-icon="search"
                            label="Search"
                    ></v-text-field>
                </v-flex>
            </v-layout>
            <v-layout row>
                <v-flex xs12>
                    <v-data-table :headers="headers" class="elevation-1" :items="dataUsers" :search="search">
                        <template slot="items" slot-scope="{ item: user }">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.mobile }}</td>
                            <td>{{ user.email_verified_at }}</td>
                            <td>
                                <users-email-component :user="user"></users-email-component>
                            </td>
                        </template>
                    </v-data-table>
                </v-flex>
            </v-layout>
        </v-container>
    </v-card>
</template>

<script>
export default {
  name: 'UsersList',
  data () {
    return {
      dataUsers: this.users,
      search: '',
      headers: [
        { text: 'Id', value: 'id' },
        { text: 'Name', value: 'name' },
        { text: 'Email', value: 'email' },
        { text: 'Phone', value: 'mobile' },
        { text: 'Verified', value: 'email_verified_at' },
        { text: 'Actions', value: 'id' }
      ]
    }
  },
  props: {
    users: {
      type: Array,
      required: true
    },
    user: {
      type: Object,
      required: false
    }
  }
}
</script>

<style scoped>
</style>
