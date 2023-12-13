<template>
    <form @submit.prevent="store($event.target)">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create video gallery </h6>
                    <router-link :to="{ name: `VideoGallery` }" class="btn btn-info btn-sm">Back</router-link>
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
                                <select class="form-control" name="gallery_video_categories_id"
                                    v-if="all_category_data?.data">
                                    <option v-for="item in all_category_data.data" :value="item.id" :key="item.id">
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
                                <textarea class="form-control" type="text" name="link"></textarea>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="card-header py-2 position-sticky d-flex justify-content-start">
                <button type="submit" class="btn btn-info btn-sm">Create</button>
            </div>
        </div>
    </form>
</template>

<script>

import { mapActions, mapState } from 'pinia'
import { gallery_video_store } from './setup/store';
import { video_gallery_category_store } from '../video_gallery_category/setup/store';
export default {


    created: function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        this.fetch_all_category();
    },
    methods: {
        ...mapActions(gallery_video_store, {
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
