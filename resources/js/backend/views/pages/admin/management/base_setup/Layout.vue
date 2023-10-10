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
            <div @click.prevent="open_nav" class="responsive_setting_nav_trigger">
                <i class="icon-align-left"></i>
            </div>
            <div class="setting_pages_body">
                <div class="left_setting_nav custom_scroll">
                    <div class="left_nav_overlay" @click.prevent="open_nav"></div>
                    <div class="card rounded-none h-100 mb-0">
                        <div class="card-body">
                            <ul>
                                <li>
                                    <router-link :to="{name: `${route_prefix}Meta`}">
                                        <i class="icon-pencil-alt"></i>
                                        Meta Information
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: `${route_prefix}ContactInfo`}">
                                        <i class="icon-headphone-alt"></i>
                                        Contact Information
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: `${route_prefix}SeoInfo`}">
                                        <i class="icon-zoom-in"></i>
                                        SEO Information
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: `${route_prefix}InstituteDetails`}">
                                        <i class="icon-file"></i>
                                        Institute Details
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: `${route_prefix}InstituteSummery`}">
                                        <i class="icon-menu-alt"></i>
                                        Institute Summary
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: `${route_prefix}PrincipalInfo`}">
                                        <i class="icon-user"></i>
                                        Principal Info
                                    </router-link>
                                </li>
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
    }),
    created:function(){
        document.querySelector('#sidebar-toggle').checked = false;
        document.querySelector('.page-body-wrapper').classList.add('sidebar-close');
    },
    methods:{
        open_nav: function(){
            document.querySelector('.left_setting_nav').classList.toggle('active');
        },
    }
}
</script>

<style></style>
