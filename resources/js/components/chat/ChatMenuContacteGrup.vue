<template>

    <!--Menu per un contacte-->
    <!--<v-menu bottom left offset-y>-->
        <!--<template v-slot:activator="{ on }">-->
            <!--<v-tooltip bottom>-->
                <!--<v-btn icon slot="activator" v-on="on">-->
                    <!--<v-icon>more_vert</v-icon>-->
                <!--</v-btn>-->
                <!--<span>Menú</span>-->
            <!--</v-tooltip>-->
        <!--</template>-->
        <!--<v-list>-->
            <!--<v-list-tile-->
                    <!--v-for="(contacte, index) in contactes"-->
                    <!--:key="index"-->
                    <!--@click="" >-->
                <!--<v-list-tile-title>{{ contacte.title }}</v-list-tile-title>-->
            <!--</v-list-tile>-->
        <!--</v-list>-->
    <!--</v-menu>-->

    <v-menu bottom left offset-y>
        <template v-slot:activator="{ on }">
            <v-tooltip bottom>
                <v-btn icon slot="activator" v-on="on">
                    <v-icon>more_vert</v-icon>
                </v-btn>
                <span>Menú</span>
            </v-tooltip>
        </template>
        <v-list>
            <v-list-tile
                    v-for="(grup, index) in grups"
                    :key="index"
                    @click="" >
                <v-list-tile-title>{{ grup.title }}</v-list-tile-title>
            </v-list-tile>
        </v-list>
    </v-menu>
</template>

<script>
export default {
  name: 'ChatMenuContacteGrup',
  data () {
    return {
      contactes: [
        { title: 'Info. del contacte' },
        { title: 'Seleccionar missatges' },
        { title: 'Silenciar' },
        { title: 'Buidar missatges' },
        { title: 'Eliminar xat' }
      ],
      grups: [
        { title: 'Info. del grup' },
        { title: 'Seleccionar missatges' },
        { title: 'Silenciar' },
        { title: 'Buidar missatges' },
        { title: 'Eliminar xat' }
      ]
    }
  }
}
</script>

<style scoped>

</style>
