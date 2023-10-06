import setup from ".";
import kebabize from "../../../../../../utils/kebabize";
import Layout from "../Layout.vue";

import Content from "../Content.vue";

let route_prefix = setup.route_prefix;
const routes =
{
    path: kebabize(route_prefix),
    component: Layout,
    name: route_prefix,
    children: [
        {
            path: ":slug",
            name: "ContentPageDetails",
            props: true,
            component: Content,
        },

    ]
};


export default routes;
