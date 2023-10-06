import setup from ".";
import kebabize from "../../../../../../utils/kebabize";
import Layout from "../Layout.vue";

import Banner from "../Banner.vue";

let route_prefix = setup.route_prefix;
const routes =
{
    path: 'banner',
    component: Layout,
    children: [
        {
            path: "",
            name: route_prefix,
            component: Banner,
        },
    ]
};


export default routes;
