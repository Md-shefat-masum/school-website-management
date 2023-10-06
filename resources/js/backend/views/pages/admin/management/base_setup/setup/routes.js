import setup from ".";
import kebabize from "../../../../../../utils/kebabize";
import Layout from "../Layout.vue";

import Meta from "../Meta.vue";
import ContactInfo from "../ContactInfo.vue";
import SeoInfo from "../SeoInfo.vue";
import InstituteSummery from "../InstituteSummery.vue";
import PrincipalInfo from "../PrincipalInfo.vue";
import InstituteDetails from "../InstituteDetails.vue";

let route_prefix = setup.route_prefix;
const routes =
{
    path: 'base-setup',
    component: Layout,
    children: [
        {
            path: '',
            name: route_prefix,
            redirect: () => {
                return { name: route_prefix + "Meta" }
            },
        },
        {
            path: kebabize(route_prefix + "Meta"),
            name: route_prefix + "Meta",
            component: Meta,
        },
        {
            path: kebabize(route_prefix + "ContactInfo"),
            name: route_prefix + "ContactInfo",
            component: ContactInfo,
        },
        {
            path: kebabize(route_prefix + "SeoInfo"),
            name: route_prefix + "SeoInfo",
            component: SeoInfo,
        },
        {
            path: kebabize(route_prefix + "InstituteSummery"),
            name: route_prefix + "InstituteSummery",
            component: InstituteSummery,
        },
        {
            path: kebabize(route_prefix + "InstituteDetails"),
            name: route_prefix + "InstituteDetails",
            component: InstituteDetails,
        },
        {
            path: kebabize(route_prefix + "PrincipalInfo"),
            name: route_prefix + "PrincipalInfo",
            component: PrincipalInfo,
        },
    ]
};


export default routes;
