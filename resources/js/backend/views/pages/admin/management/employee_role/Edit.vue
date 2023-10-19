<template>
    <form @submit.prevent="update">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Update employee role</h6>
                    <router-link :to="{ name: `EmployeeRole` }" class="btn btn-info btn-sm">Back</router-link>
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
                <button class="btn btn-info btn-sm">Update</button>
            </div>
        </div>
    </form>
</template>

<script>

import { mapActions } from 'pinia'
import { employee_role_store } from './setup/store';
export default {
    created: function () {
        this.get_blog_category(this.$route.params.id)
    },
    methods: {
        ...mapActions(employee_role_store, {
            update_blog_category: 'update',
            get_blog_category: 'get',
        }),
        update: function () {
            let form_data = new FormData(event.target);
            form_data.append('id', this.$route.params.id);
            this.update_blog_category(form_data)
        }
    }
}
</script>

<style></style>
