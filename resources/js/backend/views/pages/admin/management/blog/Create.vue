<template>
    <form @submit.prevent="store" ref="adminForm">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create blog </h6>
                    <router-link :to="{ name: `Blog` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">
                                Description
                            </label>
                            <div class="mt-1 mb-3">
                                <div id="description"></div>
                                <editor api-key="no-api-key" v-model="description" :init="{
                                    height: 600,
                                    menubar: false,
                                    plugins: [
                                        'advlist autolink lists link image charmap print preview anchor',
                                        'searchreplace visualblocks code fullscreen',
                                        'insertdatetime media table paste code help wordcount'
                                    ],
                                    toolbar:
                                        'undo redo | formatselect | bold italic backcolor | \
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        alignleft aligncenter alignright alignjustify | \
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         bullist numlist outdent indent | removeformat | help'
                                }" />

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">
                                Select Category
                            </label>
                            <div class="mt-1 mb-3">
                                <select class="form-control" name="blog_categories_id" v-if="all_blog_category?.data">
                                    <option v-for="item in all_blog_category.data" :value="item.id" :key="item.id">
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
                            <label for="">
                                Writer
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text" name="writer" class="form-control mb-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Publised Date
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="date" name="published_date" class="form-control mb-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Short Description
                            </label>
                            <div class="mt-1 mb-3">
                                <textarea class="form-control" name="short_description" id="" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Tags
                            </label>
                            <div class="mt-1 mb-3">
                                <dynamicSelect :setValue="setTags"></dynamicSelect>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">
                                Image alt title
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text" class="form-control" name="image_alt">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>

                            <image-component  :name="`image`" :multiple="false"
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
import { blog_store } from './setup/store';
import { blog_category_store } from '../blog_category/setup/store';
import Editor from '@tinymce/tinymce-vue'
export default {
    components: { Editor },
    data: () => ({
        tags: [],
        shouldSubmitForm: true,
        description: '',
    }),
    created: function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        this.fetch_all_blog_category();
    },
    methods: {
        ...mapActions(blog_store, {
            store_blog: 'store',
        }),
        ...mapActions(blog_category_store, {
            fetch_all_blog_category: 'all',
        }),
        store: function () {
            console.log('store called', event);
            let form_data = new FormData(this.$refs.adminForm);
            form_data.append('tags', JSON.stringify(this.tags));
            form_data.append('description', this.description);
            this.store_blog(form_data)
        },
        setTags: function (v) {
            this.tags = v
        },
    },
    computed: {
        ...mapState(blog_category_store, {
            all_blog_category: 'all_data'
        })
    },

}
</script>

<style></style>
