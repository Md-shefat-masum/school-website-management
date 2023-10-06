import Layout from "./Layout.vue"
import Dashboard from "./Dashboard.vue"

import contact_message_routes from "./management/contact_messages/setup/routes";
import base_setup_routes from "./management/base_setup/setup/routes";
import banner_routes from "./management/banner/setup/routes";
import success_at_a_glance_routes from "./management/success_at_a_glance/setup/routes";

const routes = {
    path: '/admin',
    component: Layout,
    children: [
        {
            path: '',
            component: Dashboard
        },
        contact_message_routes,
        base_setup_routes,
        banner_routes,
        success_at_a_glance_routes,
    ]
};


export default routes;
