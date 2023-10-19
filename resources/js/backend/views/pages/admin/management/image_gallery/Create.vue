<template>
    <form @submit.prevent="store" ref="adminForm">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create video gallery </h6>
                    <router-link :to="{ name: `ImageGallery` }" class="btn btn-info btn-sm">Back</router-link>
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
                                <select class="form-control" name="gallery_photo_categories_id"
                                    v-if="all_gallery_photo_category?.data">
                                    <option v-for="item in all_gallery_photo_category.data" :value="item.id" :key="item.id">
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
                            <label for="">Image</label>

                            <image-component :name="`image`" :multiple="false"
                                :accept="`.jpg,.jpeg,.png`"></image-component>
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
import { gallery_photo_store } from './setup/store';
import { gallery_photo_category_store } from '../image_gallery_category/setup/store';
export default {
    created: function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        this.fetch_all_gallery_photo_category();
    },
    methods: {
        ...mapActions(gallery_photo_store, {
            store_gallery_photo: 'store',
        }),
        ...mapActions(gallery_photo_category_store, {
            fetch_all_gallery_photo_category: 'all',
        }),
        store: function () {
            console.log('store called', event);
            let form_data = new FormData(this.$refs.adminForm);
            form_data.append('tags', JSON.stringify(this.tags));
            form_data.append('description', this.description);
            this.store_gallery_photo(form_data)
        },
    },
    computed: {
        ...mapState(gallery_photo_category_store, {
            all_gallery_photo_category: 'all_data'
        })
    },

}
</script>

<style></style>
