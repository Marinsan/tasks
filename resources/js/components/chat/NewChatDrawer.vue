<template>
    <v-navigation-drawer
            v-model="value"
            absolute
            width="360"
    >
        <v-navigation-drawer
            v-model="creating"
            absolute
            width="360">
            <v-card flat color="primary">

                <v-card-title class="title"><v-btn color="white" class="mt-5" @click="creating = false" flat icon><v-icon>arrow_back</v-icon></v-btn><span class="mt-5 ml-3 white--text">Afegir participants</span></v-card-title>
            </v-card>
            <v-card flat class="yellow">
                <v-card-title>TODO SEARCH</v-card-title>
            </v-card>
            <v-list two-line subheader>
                <v-divider></v-divider>
                <template v-for="(contact, index) in contacts">
                    <v-list-tile

                            :key="contact.title"
                            avatar
                            @click=""
                    >
                        <v-list-tile-avatar>
                            <v-avatar><img :src="contact.avatar"></v-avatar>
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title>{{ contact.name }}</v-list-tile-title>
                            <v-list-tile-sub-title>{{ contact.state }}</v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-divider :key="index"></v-divider>
                </template>
            </v-list>
    </v-navigation-drawer>
        <v-card flat color="primary">

            <v-card-title class="title"><v-btn class="mt-5" color="white" @click="close()" flat icon><v-icon color="white">arrow_back</v-icon></v-btn><span class="mt-5 ml-3 white--text">Nou xat</span></v-card-title>
        </v-card>
        <v-card flat class="yellow">
            <v-card-title>TODO SEARCH</v-card-title>
        </v-card>
        <v-list two-line subheader>
            <v-list-tile
                    avatar
                    @click="creating = true"
            >
                <v-list-tile-avatar>
                    <v-btn fab class="elevation-0" color="green"><v-icon color="white">group_add</v-icon></v-btn>
                </v-list-tile-avatar>

                <v-list-tile-content>
                    <v-list-tile-title class="subheading">Nou grup</v-list-tile-title>
                </v-list-tile-content>

            </v-list-tile>
            <v-divider></v-divider>
        <v-subheader class="title">FREQÜENTS</v-subheader>
            <v-divider></v-divider>
        <template v-for="(contact, index) in contacts">
            <v-list-tile

                :key="contact.title"
                avatar
                @click=""
        >
            <v-list-tile-avatar>
                <v-avatar><img :src="contact.avatar"></v-avatar>
            </v-list-tile-avatar>

            <v-list-tile-content>
                <v-list-tile-title>{{ contact.name }}</v-list-tile-title>
                <v-list-tile-sub-title>{{ contact.state }}</v-list-tile-sub-title>
            </v-list-tile-content>
            </v-list-tile>
            <v-divider :key="index"></v-divider>
        </template>
    </v-list>
    </v-navigation-drawer>
</template>
<script>
  export default {
    name: 'new-chat-drawer',
    props: {
      value: {
        type: Boolean,
        required: true
      }
    },
    data () {
      return {
        creating: false,
        contacts: [
          {
            name: 'Paco',
            state: 'Si mires aixo es que tens massa temps lliure',
            avatar: 'https://www.dictionary.com/e/wp-content/uploads/2018/03/circle_game-1.jpg'
          },
          {
            name: 'Pepe',
            state: 'Tonto quien lo lea',
            avatar: 'http://as00.epimg.net/img/comunes/fotos/fichas/equipos/large/1.png'
          },
          {
            name: 'Maria Cinta',
            state: 'La cava, millor poble',
            avatar: 'https://previews.123rf.com/images/steveallenuk/steveallenuk1309/steveallenuk130901854/22358591-krishna-s-butter-ball-a-giant-bolder-in-mahabalipuram-in-the-tamil-nadu-region-of-southern-india-une.jpg'
          },
          {
            name: 'Jordi Varas',
            state: 'Que la fuerza te acompañe',
            avatar: 'https://vignette.wikia.nocookie.net/es.starwars/images/d/d6/Yoda_SWSB.png/revision/latest?cb=20180105191224'
          },
          {
            name: 'Deu',
            state: 'Sou tots uns gais!',
            avatar: 'https://avatars3.githubusercontent.com/u/4015406?s=460&v=4'
          },


        ]


      }
    },
    methods: {
      close () {
        this.$emit('close')
      }
    }
  }
</script>
