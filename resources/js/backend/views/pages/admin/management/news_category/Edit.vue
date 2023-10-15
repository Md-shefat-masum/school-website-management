<template>
    <form @submit.prevent="update">
        <div class="card">
            <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Update news category</h6>
                    <router-link :to="{ name: `NewsCategory` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">
                        Category Name
                    </label>
                    <div class="mt-1 mb-3">
                        <input type="text" name="title" class="form-control mb-1">
                    </div>
                </div>
            </div>
            <div class="card-header py-2 position-sticky d-flex justify-content-start">
                <button class="btn btn-info btn-sm">Update</button>
            </div>
        </div>
    </form>
</template>

<script>

import { mapActions } from 'pinia'
import { news_category_store } from './setup/store';
export default {
    created: function () {
        this.get_news_category(this.$route.params.id)
    },
    methods: {
        ...mapActions(news_category_store, {
            update_news_category: 'update',
            get_news_category: 'get',
        }),
        update: function () {
            let form_data = new FormData(event.target);
            form_data.append('id', this.$route.params.id);
            this.update_news_category(form_data)
        }
    }
}
</script>

<style></style>
