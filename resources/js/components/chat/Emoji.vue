<template>
        <v-menu
            v-model="menu"
            top
            offset-y
            slider-color="green"
            :close-on-content-click="false"
            @keydown.esc="menu=false"
        >
            <template v-slot:activator="{ on }">
                <v-btn
                    icon
                    flat
                    color="green"
                    v-on="on"
                    class="mx-0"
                >
                    <v-icon>insert_emoticon</v-icon>
                </v-btn>
            </template>
            <!--yarn add v-emoji-picker-->
            <VEmojiPicker :pack="pack" @select="selectEmoji" labelSearch="Buscar" />
        </v-menu>
</template>

<script>
import VEmojiPicker from 'v-emoji-picker'
import packData from 'v-emoji-picker/data/emojis.json'
export default {
  name: 'Emoji',
  components: {
    VEmojiPicker
  },
  data () {
    return {
      menu: false,
      pack: packData
    }
  },
  props: ['value'],
  methods: {
    selectEmoji (emoji) {
      this.$emit('input', emoji.emoji)
    this.emoji = ''

    }
  }
}
</script>

<style scoped>

</style>
