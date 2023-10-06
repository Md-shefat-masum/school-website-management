import setup from ".";
import kebabize from "../../../../../../utils/kebabize";
import Create from "../Create.vue";
import Details from "../Details.vue";
import Edit from "../Edit.vue";
import Layout from "../Layout.vue";

import Meta from "../Meta.vue";

let route_prefix = setup.route_prefix;
const routes =
{
    path: 'base-setup',
    component: Layout,
    children: [
        {
            path: '',
            name: route_prefix,
            component: Meta,
        },
        {
            path: kebabize(route_prefix + "Meta"),
            name: route_prefix + "Meta",
            component: Meta,
        },
    ]
};


export default routes;
