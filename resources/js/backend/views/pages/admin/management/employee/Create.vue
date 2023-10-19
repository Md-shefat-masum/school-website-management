<template>
    <form @submit.prevent="store" ref="adminForm">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create employee </h6>
                    <router-link :to="{ name: `Employee` }" class="btn btn-info btn-sm">Back</router-link>
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
                                    height: 350,
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
                                Select role
                            </label>
                            <div class="mt-1 mb-3">
                                <select class="form-control" name="employee_roles_id" v-if="all_employee_role?.data">
                                    <option v-for="item in all_employee_role.data" :value="item.id" :key="item.id">
                                        {{ item.title }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Name
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text" name="name" class="form-control mb-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Designation
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text" name="designation" class="form-control mb-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Join Date
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="date" name="joining_date" class="form-control mb-1">
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
import { employee_store } from './setup/store';
import { employee_role_store } from '../employee_role/setup/store';
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

        this.fetch_all_employee_role();
    },
    methods: {
        ...mapActions(employee_store, {
            store_employee: 'store',
        }),
        ...mapActions(employee_role_store, {
            fetch_all_employee_role: 'all',
        }),
        store: function () {
            console.log('store called', event);
            let form_data = new FormData(this.$refs.adminForm);
            form_data.append('description', this.description);
            this.store_employee(form_data)
        },
        setTags: function (v) {
            this.tags = v
        },
    },
    computed: {
        ...mapState(employee_role_store, {
            all_employee_role: 'all_data'
        })
    },

}
</script>

<style></style>
