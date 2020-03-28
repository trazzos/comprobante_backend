<template>
    <v-app id="sandbox">
        <navigation-component></navigation-component>
        <header-component></header-component>
        <content-component></content-component>
        <footer-component></footer-component>
        <page-loading-component :loading="loading"></page-loading-component>
    </v-app>
</template>


<script>
  import { mapState, mapMutations } from 'vuex';

  import NavigationComponent from 'root/components/NavigationComponent';
  import FooterComponent from 'root/components/FooterComponent';
  import HeaderComponent from 'root/components/HeaderComponent';
  import ContentComponent from 'root/components/ContentComponent';
  import PageLoadingComponent from 'root/components/PageLoadingComponent';
  import globalStore from 'root/store/globalStore';

  export default {
    beforeCreate: function() {
      if (!this.$store.state.globalStore) {
        this.$store.registerModule(globalStore.name, globalStore);
      }
    },
    mounted() {
      this.setLoading(false);
    },
    components: {
      NavigationComponent,
      FooterComponent,
      HeaderComponent,
      ContentComponent,
      PageLoadingComponent
    },
    methods: {
      ...mapMutations(globalStore.name, [
        "setLoading"
      ]),
    },
    computed: {
      ...mapState(globalStore.name, [
        'loading',
      ]),
    },
  }
</script>
