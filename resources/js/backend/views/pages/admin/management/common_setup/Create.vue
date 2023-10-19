<template>
    <form @submit.prevent="store($event.target)">
        <Form></Form>
    </form>
</template>

<script>

import { mapActions, mapState } from 'pinia'
import { common_setup_store } from './setup/store';
import { video_gallery_category_store } from '../video_gallery_category/setup/store';
import Form from "./Form.vue";
export default {
    components: {Form},
    created: function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        this.fetch_all_category();
    },
    methods: {
        ...mapActions(common_setup_store, {
            store: 'store',
        }),
        ...mapActions(video_gallery_category_store, {
            fetch_all_category: 'all',
        }),


    },
    computed: {
        ...mapState(video_gallery_category_store, {
            all_category_data: 'all_data'
        })
    },

}
</script>

<style></style>
