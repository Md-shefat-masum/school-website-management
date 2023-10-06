import setup from ".";
import kebabize from "../../../../../../utils/kebabize";
import Layout from "../Layout.vue";

import Success from "../Success.vue";

let route_prefix = setup.route_prefix;
const routes =
{
    path: 'success',
    component: Layout,
    children: [
        {
            path: "",
            name: route_prefix,
            component: Success,
        },
    ]
};


export default routes;
