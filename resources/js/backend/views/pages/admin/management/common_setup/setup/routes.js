import setup from ".";
import Layout from "../Layout.vue";


import All from "../All.vue"
import Create from "../Create.vue"
import Edit from "../Edit.vue"
import Form from "../Form.vue"
import kebabize from "../../../../../../utils/kebabize";

let route_prefix = setup.route_prefix;
const routes =
{
    path: kebabize(route_prefix),
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
        {
            path: "form",
            name: route_prefix + "Form",
            props: true,
            component: Form
        },

    ]
};


export default routes;
