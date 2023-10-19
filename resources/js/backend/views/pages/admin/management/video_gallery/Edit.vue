<template>
    <form @submit.prevent="update">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Update video gallery </h6>
                    <router-link :to="{ name: `Blog` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">
                                Select Category
                            </label>
                            <div class="mt-1 mb-3">
                                <select class="form-control" name="gallery_video_categories_id" v-if="all_category?.data">
                                    <option v-for="item in all_category.data" :value="item.id" :key="item.id">
                                        {{ item.title }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">
                                Title
                            </label>
                            <div class="mt-1 mb-3">
                                <input class="form-control" type="text" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Link
                            </label>
                            <div class="mt-1 mb-3">
                                <input class="form-control" type="text" name="link">
                            </div>
                        </div>


                        
                    </div>
                </div>
            </div>
            <div class="card-header py-2 position-sticky d-flex justify-content-start">
                <button type="submit" class="btn btn-info btn-sm">Update</button>
            </div>
        </div>
    </form>
</template>

<script>

import { mapActions, mapState } from 'pinia'
import { gallery_video_store } from './setup/store';
import { video_gallery_category_store } from '../video_gallery_category/setup/store';
export default {
    created: async function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        await this.fetch_all_video_gallery_category();
        await this.get_video_gallery(this.$route.params.id)

    },
    methods: {
        ...mapActions(gallery_video_store, {
            update_video_gallery: 'update',
            get_video_gallery: 'get',
        }),
        ...mapActions(video_gallery_category_store, {
            fetch_all_video_gallery_category: 'all',
        }),
        update: function () {
            let form_data = new FormData(event.target);
            form_data.append('id', this.$route.params.id);
            this.update_video_gallery(form_data)
        }
    },
    computed: {
        ...mapState(video_gallery_category_store, {
            all_category: 'all_data'
        }),
        ...mapState(gallery_video_store, {
            single_data: 'single_data'
        })
    },

}
</script>

<style></style>
