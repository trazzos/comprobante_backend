<template>
    <v-container fluid>
        <v-row
            align="center"
            justify="center"
        >
            <v-col cols="12">
                <v-data-table
                    :headers="headers"
                    :items="items"
                    :items-per-page="25"
                    :loading="loading"
                    class="elevation-1"
                ></v-data-table>
            </v-col>
        </v-row>
    </v-container>
</template>


<script>
  import { mapState, mapMutations, mapActions } from 'vuex';

  import companyListStore from 'companyModule/store/companyListStore';

  export default {
    beforeCreate: function() {
      if (!this.$store.state.companyListStore) {
        this.$store.registerModule(companyListStore.name, companyListStore);
      }
    },
    mounted() {
      this.companiesGet();
    },
    methods: {
      ...mapActions(companyListStore.name, [
        "companiesGet"
      ]),
    },
    computed: {
      ...mapState(companyListStore.name, [
        'loading',
        'headers',
        'items',
      ]),
    },
  }
</script>
