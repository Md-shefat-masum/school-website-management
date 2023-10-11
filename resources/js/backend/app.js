import './bootstrap';
import './plugins/axios_setup.js';
import './plugins/sweet_alert.js';
import { createApp } from 'vue';
import Dashbord from './views/App.vue';

import DynamicSelect from '../backend/views/components/dynamic_select/DynamicSelect.vue';

import { createRouter, createWebHashHistory } from 'vue-router';
import { createPinia } from 'pinia'

import SuperAdminLayout from "./views/pages/superadmin/Layout.vue";
import SuperAdminDashboard from "./views/pages/superadmin/Dashboard.vue";
import SuperAdminReportAll from "./views/pages/superadmin/management/reports/All.vue";
import SuperAdminUserAll from "./views/pages/superadmin/management/users/All.vue";

import App from "./views/App.vue"
import admin_routes from "./views/pages/admin/routes"

const routes = [
    {
        path: '/',
        component: App,
    },
    admin_routes,

    {
        path: '/super-admin',
        component: SuperAdminLayout,
        children: [
            {
                path: '',
                component: SuperAdminDashboard
            },
            {
                path: 'report',
                name: 'report',
                component: SuperAdminReportAll
            },
            {
                path: 'user',
                name: "user",
                component: SuperAdminUserAll
            },
        ]
    },

];


const router = createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
});
router.beforeEach((to, from, next) => {
    to.href.length > 2 &&
        window.sessionStorage.setItem('prevurl', to.href);
    next();
});

const pinia = createPinia()
const app = createApp({});

app.component('dahsboard', Dashbord);
app.component('dynamicSelect', DynamicSelect);

app.use(pinia)
app.use(router);
app.mount('#app')

