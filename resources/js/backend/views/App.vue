<template>
    <div>
        <top-header></top-header>
        <!--Page Body Start-->
        <div class="page-body-wrapper">
            <router-view></router-view>
        </div>
        <!--Page Body Ends-->
    </div>
</template>

<script>
import TopHeader from './components/TopHeader.vue'
import { mapActions, mapState } from 'pinia'
import { use_auth_store } from "../store/auth_store"

export default {
    components: { TopHeader },
    created: async function () {
        console.log('App Started');
        await this.check_is_auth();
    },
    watch: {
        'auth_info': function (v) {
            // console.log(v);
            switch (v.role_sl) {
                case 1:
                    window.location.hash = window.location.hash?window.location.hash:"#/super-admin";
                    break;
                case 2:
                    window.location.hash = window.location.hash?window.location.hash:"#/admin";
                    break;
                default:
                    alert('you have no permission');
                    break;
            }
        }
    },
    methods: {
        ...mapActions(use_auth_store, ['check_is_auth'])
    },
    computed: {
        ...mapState(use_auth_store, ['is_auth', 'auth_info'])
    }
}
</script>
