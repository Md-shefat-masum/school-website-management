<template>
    <form @submit.prevent="update">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create video gallery </h6>
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
                                <select class="form-control" name="gallery_photo_categories_id" v-if="all_category?.data">
                                    <option v-for="item in all_category.data" :value="item.id" :key="item.id">
                                        {{ item.title }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                title
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text" name="title" class="form-control mb-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>

                            <image-component :images="[single_data.image]" :name="`image`" :multiple="false"
                                :accept="`.jpg,.jpeg,.png`"></image-component>
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
import { gallery_photo_store } from './setup/store';
import { gallery_photo_category_store } from '../image_gallery_category/setup/store';

export default {

    data: () => ({
        tags: [],
        description: '',
    }),
    created: async function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        await this.fetch_all_gallery_photo_category();
        await this.get_blog(this.$route.params.id)
        this.description = this.single_data.description
        this.single_data.blog_tags.forEach((item) => {
            this.tags = item.title
        });

    },
    methods: {
        ...mapActions(gallery_photo_store, {
            update_gallery_photo: 'update',
            get_blog: 'get',
        }),
        ...mapActions(gallery_photo_category_store, {
            fetch_all_gallery_photo_category: 'all',
        }),

        update: function () {
            let form_data = new FormData(event.target);
            form_data.append('id', this.$route.params.id);
            this.update_gallery_photo(form_data)
        },

        setTags: function (v) {
            this.tags = v
        },

    },
    computed: {
        ...mapState(gallery_photo_category_store, {
            all_category: 'all_data'
        }),
        ...mapState(gallery_photo_store, {
            single_data: 'single_data'
        })
    },

}
</script>

<style></style>
