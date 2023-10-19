<template>
    <form @submit.prevent="store_employee_role($event.target)">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create employee role</h6>
                    <router-link :to="{ name: `BlogCategory` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            </div>

            <div class="card-body col-md-6">
                <div class="form-group">
                    <label for="">
                        Employee role title
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
import { employee_role_store } from './setup/store';
export default {
    created: function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)
    },
    methods: {
        ...mapActions(employee_role_store, {
            store_employee_role: 'store',
        }),
    }
}
</script>

<style></style>
