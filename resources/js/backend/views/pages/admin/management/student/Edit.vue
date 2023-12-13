<template>
    <form @submit.prevent="update">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Update {{ setup.page_title }} </h6>
                    <router-link :to="{ name: `${setup.route_prefix}` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">
                                Full Name
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text" name="full_name" class="form-control mb-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Select Class
                            </label>
                            <div class="mt-1 mb-3">
                                <select class="form-control" name="student_class_id" v-if="all_class">
                                    <option v-for="item in all_class" :value="item.id" :key="item.id">
                                        {{ item.title }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Department
                            </label>
                            <div class="mt-1 mb-3">
                                <select name="department" class="form-select" id="">
                                    <option value="Generel">Generel</option>
                                    <option value="Science">Science</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Hafez">Hafez</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Personal Phone Number
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text"
                                    :value="single_data.information?.personal_phone_number"
                                    name="personal_phone_number" class="form-control mb-1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Parent Phone Number
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text"
                                    :value="single_data.information?.parent_phone_number"
                                    name="parent_phone_number" class="form-control mb-1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">
                                Parent Details
                            </label>
                            <div class="mt-1 mb-3">
                                <textarea type="text"
                                :value="single_data.information?.parent_details"
                                name="parent_details" class="form-control mb-1"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">
                                Address
                            </label>
                            <div class="mt-1 mb-3">
                                <textarea type="text"
                                :value="single_data.information?.address"
                                rows="4" name="address" class="form-control mb-1"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <image-component :name="`image`" :images="[single_data.image]"
                                :multiple="false"
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
import { store } from './setup/store';
import { employee_role_store } from '../employee_role/setup/store';
import Editor from '@tinymce/tinymce-vue'
import setup from './setup';
import { class_store } from '../class/setup/store';
export default {
    components: { Editor },
    data: () => ({
        tags: [],
        setup,
        description: '',
    }),
    created: async function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        await this.feth_all_classes();
        await this.get_data(this.$route.params.id)

    },
    methods: {
        ...mapActions(store, {
            update_data: 'update',
            get_data: 'get',
        }),
        ...mapActions(class_store, {
            feth_all_classes: 'all_class',
        }),

        update: function () {
            let form_data = new FormData(event.target);
            form_data.append('id', this.$route.params.id);
            form_data.append('user_id', this.single_data.id);
            form_data.append('tags', this.tags);
            form_data.append('description', this.description);
            this.update_data(form_data)
        },

        setTags: function (v) {
            this.tags = v
        },

    },
    computed: {
        ...mapState(class_store, {
            all_class: 'all_data'
        }),
        ...mapState(store, {
            single_data: 'single_data'
        })
    },

}
</script>

<style></style>
