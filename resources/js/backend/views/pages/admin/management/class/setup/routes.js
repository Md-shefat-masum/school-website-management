import setup from ".";
import Layout from "../Layout.vue";


import All from "../All.vue"
import Create from "../Create.vue"
import Edit from "../Edit.vue"

let route_prefix = setup.route_prefix;
const routes =
{
    path: 'class',
    component: Layout,
    children: [
        {
            path: '',
            name: route_prefix,
            component: All
        },

        {
            path:"create",
            name: route_prefix + "Create",
            component: Create
        },
        {
            path: "edit/:id",
            name: route_prefix + "Edit",
            props: true,
            component: Edit
        },

    ]
};


export default routes;
