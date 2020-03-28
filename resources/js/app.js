require('./bootstrap');

import Vue from 'vue'
import store from "root/plugins/vuex";
import vuetify from "root/plugins/vuetify";
import router from "root/plugins/router";
import App from 'root/components/App'

const app = new Vue({
    el: '#app',
    store,
    vuetify,
    router,
    render: h => h(App),
});

export default app;
