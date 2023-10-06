import contact_message_routes from "./management/contact_messages/setup/routes";
import base_setup_routes from "./management/base_setup/setup/routes";
import Layout from "./Layout.vue"
import Dashboard from "./Dashboard.vue"
import AdminAllNews from "./management/news/All.vue"
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
        {
            path: 'news',
            name: 'news',
            component: AdminAllNews
        },
    ]
};


export default routes;
