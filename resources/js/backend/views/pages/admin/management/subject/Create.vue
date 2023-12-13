<template>
    <form @submit.prevent="store" ref="adminForm">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Create New Subject </h6>
                    <router-link :to="{ name: `Subject` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-7">
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
                                Select Teacher
                            </label>
                            <div class="mt-1 mb-3">
                                <select class="form-control" name="teacher_id" v-if="all_employee">
                                    <option v-for="item in all_employee" :value="item.id" :key="item.id">
                                        {{ item.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Title
                            </label>
                            <div class="mt-1 mb-3">
                                <input type="text" name="title" class="form-control mb-1">
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
import { subject_store as store } from './setup/store';
import { employee_store } from '../employee/setup/store';
import { class_store } from '../class/setup/store';
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

        this.feth_all_classes();
        this.fetch_all_teachers();
    },
    methods: {
        ...mapActions(store, {
            store_class: 'store',
        }),
        ...mapActions(employee_store, {
            fetch_all_teachers: 'all_teachers',
        }),
        ...mapActions(class_store, {
            feth_all_classes: 'all_class',
        }),
        store: function () {
            let form_data = new FormData(this.$refs.adminForm);
            form_data.append('description', this.description);
            this.store_class(form_data)
        },
        setTags: function (v) {
            this.tags = v
        },
    },
    computed: {
        ...mapState(class_store, {
            all_class: 'all_data'
        }),
        ...mapState(employee_store, {
            all_employee: 'all_data'
        }),
    },

}
</script>

<style></style>
