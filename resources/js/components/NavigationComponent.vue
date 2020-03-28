<template>
    <v-navigation-drawer
        v-model="primaryDrawer.model"
        :clipped="primaryDrawer.clipped"
        :mini-variant="primaryDrawer.mini"
        app
        overflow
    >
        <v-list dense>
            <v-list-item link :to="{ name: 'home' }">
                <v-list-item-action>
                    <v-icon>mdi-home</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title>Inicio</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item link :to="{ name: 'company' }">
                <v-list-item-action>
                    <v-icon>mdi-contact-mail</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title>Empresa</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item link :to="{ name: 'proyect' }">
                <v-list-item-action>
                    <v-icon>mdi-contact-mail</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                    <v-list-item-title>Proyectos</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
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
    computed: {
      ...mapState(globalStore.name, [
        'primaryDrawer',
      ]),
    },
  }
</script>
