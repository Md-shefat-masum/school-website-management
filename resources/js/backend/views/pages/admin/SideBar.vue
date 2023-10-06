<template>
    <div class="page-sidebar custom-scrollbar">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div>
                <img class="img-50 rounded-circle" src="/backend/assets/1.jpg" alt="#">
            </div>
            <h6 class="mt-3 f-12">Admin</h6>
        </div>
        <ul class="sidebar-menu">
            <li>
                <router-link :to="{name: `BaseSetup`}" class="sidebar-header">
                    <i class="icon-settings"></i>
                    <span>Base Setup</span>
                </router-link>
            </li>
            <li>
                <a href="#" class="sidebar-header">
                    <i class="icon-settings"></i><span> Maintenance</span>
                </a>
            </li>
            <li>
                <a href="/" target="_blank" class="sidebar-header">
                    <i class="icon-world"></i><span> Website</span>
                </a>
            </li>
            <li>
                <a href="/logout" @click.prevent="logout_submit" class="sidebar-header">
                    <i class="icon-lock"></i><span> Logout</span>
                </a>
            </li>

            <!-- <li>
                <div class="sidebar-title">Mangement</div>
                <a href="#" @click.prevent="$event.currentTarget.parentNode.classList.toggle('active')" class="sidebar-header">
                    <i class="icon-desktop"></i><span>Dashboard</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu menu-open">
                    <li>
                        <a href="#">
                            <i class="fa fa-angle-right"></i>
                            Default
                        </a>
                    </li>
                </ul>
            </li> -->

            <!-- <li>
                <router-link :to="{ name: `news` }" class="sidebar-header">
                    <i class="icon-anchor"></i><span> news</span>
                </router-link>
            </li> -->

            <!-- <li>
                <div class="sidebar-title">Layout</div>
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-palette"></i> <span>Color Version</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li><a href="http://admin.pixelstrap.com/universal/default/layout-light.html"><i
                                class="fa fa-angle-right"></i>Layout Light</a></li>
                    <li><a href="http://admin.pixelstrap.com/universal/default/layout-dark.html"><i
                                class="fa fa-angle-right"></i>Layout Dark</a></li>
                </ul>
            </li> -->
        </ul>

        <!--Page Sidebar Ends-->
    </div>
</template>

<script>
import { mapActions } from 'pinia'
import { use_auth_store } from '../../../store/auth_store';
export default {
    created: function(){
        setTimeout(() => {
            // sidebar_action_init();
        }, 1000);
    },
    methods: {
        ...mapActions(use_auth_store, ['log_out']),
        logout_submit: function () {
            let confirm = window.confirm('logout');
            if(confirm){
                this.log_out();
            }
        }
    }
}
</script>

<style></style>
