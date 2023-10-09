import setup from ".";
import kebabize from "../../../../../../utils/kebabize";
import Layout from "../Layout.vue";

import Content from "../Content.vue";
import All from "../All.vue";
import Create from "../Create.vue";
import Edit from "../Edit.vue";

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
        {
            path: ":slug/all",
            name: "ContentPageDetailsAll",
            props: true,
            component: All,
        },
        {
            path: ":slug/create",
            name: "ContentPageDetailsCreate",
            props: true,
            component: Create,
        },
        {
            path: ":slug/edit/:id",
            name: "ContentPageDetailsEdit",
            props: true,
            component: Edit,
        },

    ]
};


export default routes;
