import Layout from "./Layout.vue"
import Dashboard from "./Dashboard.vue"

import contact_message_routes from "./management/contact_messages/setup/routes";
import base_setup_routes from "./management/base_setup/setup/routes";
import banner_routes from "./management/banner/setup/routes";
import success_at_a_glance_routes from "./management/success_at_a_glance/setup/routes";
import menu_description_contents_routes from "./management/menu_description_contents/setup/routes";

import blog_category from "./management/blog_category/setup/routes";
import blog from "./management/blog/setup/routes";
import news_category from "./management/news_category/setup/routes";
import news from "./management/news/setup/routes";

import video_gallery_category from "./management/video_gallery_category/setup/routes";
import video_gallery from "./management/video_gallery/setup/routes";
import image_gallery_category from "./management/image_gallery_category/setup/routes";
import image_gallery from "./management/image_gallery/setup/routes";

import employee_role from "./management/employee_role/setup/routes";
import employee from "./management/employee/setup/routes";
import classs from "./management/class/setup/routes";
import subject from "./management/subject/setup/routes";
import student from "./management/student/setup/routes";

import common_setup from "./management/common_setup/setup/routes";

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
        menu_description_contents_routes,
        blog_category,
        blog,
        news_category,
        news,
        video_gallery_category,
        video_gallery,
        image_gallery_category,
        image_gallery,
        employee_role,
        employee,
        common_setup,
        classs,
        subject,
        student,
    ]
};


export default routes;
