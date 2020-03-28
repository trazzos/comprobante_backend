import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from 'root/components/Home'
import CompanyListComponent from 'companyModule/components/CompanyListComponent'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/company',
            name: 'company',
            component: CompanyListComponent,
        },
    ],
});

Vue.use(VueRouter);

export default router;
