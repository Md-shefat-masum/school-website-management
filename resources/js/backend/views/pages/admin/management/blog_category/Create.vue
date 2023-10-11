<template>
    <form @submit.prevent="store_blog_category($event.target)">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create blog category</h6>
                    <router-link :to="{ name: `BlogCategory` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
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
                <button class="btn btn-info btn-sm">Create</button>
            </div>
        </div>

    </form>
</template>

<script>

import { mapActions } from 'pinia'
import { blog_category_store } from './setup/store';
export default {
    created: function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)
    },
    methods: {
        ...mapActions(blog_category_store, {
            store_blog_category: 'store',
        }),
    }
}
</script>

<style></style>
