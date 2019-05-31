<template>
  <v-list class="channels-list" subheader two-line>
    <v-subheader>Recent channels</v-subheader>
    <template v-for="(item, index) in channels" >
      <list-user :contact="item" :key="'User_' + index"></list-user>
      <v-divider
        :key="'Divider_' + index"
        class="grey lighten-5"
        style="margin-top: 0;margin-bottom: 0;margin-right: 8px;margin-left: 75px"
        v-if="index + 1 < channels.length"
        :inset="inset"
      ></v-divider>
    </template>
  </v-list>
</template>
<script>
import ListUser from "./ListUser";

export default {
  name: "contacts-list",
  components: { ListUser },
  data() {
    return {
      selectedCard: -1,
      index: true,
      inset: true,
      userAvatar: window.laravel_user.gravatar
    };
  },
  methods: {
    hoverCard(selectedIndex) {
      this.selectedCard = selectedIndex;
    },
    isSelected(cardIndex) {
      return this.selectedCard === cardIndex;
    }
  },
  props: {
    channels: {
      type: Array,
      required: true
    }
  },
  created() {
    this.user = window.laravel_user;
  }
};
</script>
<style scoped>
.channels-list {
  min-height: 100%;
  overflow-x: hidden;
  overflow-y: auto;
}
</style>
