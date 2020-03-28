import Vue from 'vue'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import en from 'vuetify/src/locale/en.ts';
import es from 'vuetify/src/locale/es.ts';

Vue.use(Vuetify);
const opts = {
    theme: {
        dark: false,
    },
    lang: {
        locales: { en, es },
        current: 'es',
    },
};

export default new Vuetify(opts)
