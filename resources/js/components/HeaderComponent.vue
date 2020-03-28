<template>
    <v-app-bar
        :clipped-left="primaryDrawer.clipped" app
    >
        <v-app-bar-nav-icon
            @click.stop="toggleMini"
        />
        <v-toolbar-title>{{siteName}}</v-toolbar-title>
    </v-app-bar>
</template>


<script>
  import { mapState, mapMutations } from 'vuex';
  import globalStore from 'root/store/globalStore';

  export default {
    beforeCreate: function() {
      if (!this.$store.state.globalStore) {
        this.$store.registerModule(globalStore.name, globalStore);
      }
    },
    methods: {
      ...mapMutations(globalStore.name, [
        'toggleMini',
      ]),
    },
    computed: {
      ...mapState(globalStore.name, [
        'primaryDrawer',
        'siteName'
      ]),
    },
  }
</script>
