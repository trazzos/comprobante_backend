<template>
    <v-footer
        :inset="footer.inset"
        app
    >
        <span class="px-4">&copy; {{ new Date().getFullYear() }} {{ copyright }}</span>
    </v-footer>
</template>


<script>
  import { mapState } from 'vuex';
  import globalStore from 'root/store/globalStore';

  export default {
    computed: {
      ...mapState(globalStore.name, [
        'copyright',
        'footer'
      ]),
    },
  }
</script>
