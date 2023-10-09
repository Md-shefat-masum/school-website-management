<template>
    <div>
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="page-header py-2">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- <h5>
                            {{ page_title }}
                        </h5> -->
                    </div>
                    <div class="col-lg-6">
                        <!-- <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Sample Page</li>
                        </ol> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends -->
        <div>
            <div class="setting_pages_body">
                <div class="left_setting_nav " style="overflow: hidden;">
                    <div class="card rounded-none h-100 mb-0">
                        <div class="card-body p-2 custom_scroll" style="overflow-y: scroll;">
                            <ul>
                                <!-- <li>
                                    <router-link :to="{name: `${route_prefix}Campus`}">
                                        <i class="icon-pencil-alt"></i>
                                        Campus Information
                                    </router-link>
                                </li> -->
                                <template v-for="menu in menus" :key="menu.id">
                                    <li v-if="menu.sub_menus.length">
                                        <a href="" @click.prevent="() => ''" class="bn">
                                            <!-- <i class="icon-pencil-alt"></i> -->
                                            <img :src="`/${menu.icon_image}`" style="height: 18px;" alt="">
                                            {{ menu.title }}
                                        </a>
                                        <ul>
                                            <li v-for="submenu in menu.sub_menus" :key="submenu.id">
                                                <router-link
                                                    :to="{ name: `ContentPageDetails`, params: { slug: submenu.slug } }"
                                                    class="bn">
                                                    <i class="icon-hand-point-right"></i>
                                                    {{ submenu.title }}
                                                </router-link>
                                            </li>
                                        </ul>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right_settings_outlet">
                    <div class="conatiner-fulid">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import setup from "./setup";

let page_title = setup.page_title;
export default {
    data: () => ({
        page_title,
        route_prefix: setup.route_prefix,
        menus: [],
    }),
    created: function () {
        document.querySelector('#sidebar-toggle').checked = false;
        document.querySelector('.page-body-wrapper').classList.add('sidebar-close');

        this.get_value();
    },
    watch: {
        ["$route"]: {
            handler: function (v) {
                setTimeout(() => {
                    this.track_route(v)
                }, 500);
            },
            deep: true,
        }
    },
    methods: {
        get_value: function () {
            axios.get('/navbar-menu/get-all')
                .then(res => {
                    // console.log(res.data);
                    this.menus = res.data;
                })
        },
        track_route: function (v) {
            let links = document.querySelectorAll(".setting_pages_body ul li a");
            links = [...links];

            links.forEach(e => {
                e.classList.remove('router-link-active');
                e.classList.remove('router-link-exact-active');
            })

            links.forEach(e => {
                if (e.hash.length) {
                    let check = e.hash.includes(`#${v.matched[1]['path']}/${v.params.slug}`);
                    if (check) {
                        e.classList.add('router-link-active');
                        e.classList.add('router-link-exact-active');
                        e.scrollIntoView({ behavior: "smooth", block: "center" });
                    }
                }
            })
        }
    }
}
</script>

<style></style>
