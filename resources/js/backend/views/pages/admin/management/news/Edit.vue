<template>
    <form @submit.prevent="store">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Update News </h6>
                    <router-link :to="{ name: `News` }" class="btn btn-info btn-sm">Back</router-link>
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
                                <editor api-key="no-api-key" v-model="description" :init="{
                                    height: 600,
                                    name: `description`,
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
                                <select class="form-control" name="news_categories_id" v-if="all_news_category?.data">
                                    <option v-for="item in all_news_category.data" :value="item.id" :key="item.id">
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
                                <input type="date" name="publised_date" class="form-control mb-1">
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
                                Tag
                            </label>
                            <div class="mt-1 mb-3">
                                <dynamicSelect :setValue="setTags"></dynamicSelect>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="mt-1 mb-3">
                                <input @change="$event.target.files[0]" type="file" name="image" accept=".jpg,jpeg,.png"
                                    class="form-control mb-1">
                                <img style="height: 60px;" alt="">
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
import { news_store } from './setup/store';
import { news_category_store } from '../news_category/setup/store';
import Editor from '@tinymce/tinymce-vue'
export default {
    components: { Editor },
    data: () => ({
        tags: [],
    }),
    created: function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        this.fetch_all_news_category();
        this.get_news(this.$route.params.id)
    },
    methods: {
        ...mapActions(news_store, {
            store_news: 'store',
            get_news: 'get',
        }),
        ...mapActions(news_category_store, {
            fetch_all_news_category: 'all',
        }),

        store: function () {
            let form_data = new FormData(event.target);
            form_data.append('tags', this.tags);
            this.store_news(form_data)
        },

        setTags: function (v) {
            this.tags = v
        },
    },
    computed: {
        ...mapState(news_category_store, {
            all_news_category: 'all_data'
        })
    },

}
</script>

<style></style>
