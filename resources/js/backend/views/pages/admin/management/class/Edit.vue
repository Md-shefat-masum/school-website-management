<template>
    <form @submit.prevent="update">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Update Class </h6>
                    <router-link :to="{ name: `Class` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">
                                Title
                            </label>
                            <div class="mt-1 mb-3">
                                <textarea class="form-control" type="text" name="title"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Serial
                            </label>
                            <div class="mt-1 mb-3">
                                <input class="form-control" type="text" name="serial"/>
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
import { class_store } from './setup/store';
import { employee_role_store } from '../employee_role/setup/store';
import Editor from '@tinymce/tinymce-vue'
export default {
    components: { Editor },
    data: () => ({
        tags: [],
        description: '',
    }),
    created: async function () {
        setTimeout(() => {
            window.remove_form_action_classes()
        }, 100)

        await this.fetch_all_employee_role();
        await this.get_blog(this.$route.params.id)
        this.description = this.single_data.description
        this.single_data.blog_tags.forEach((item) => {
            this.tags = item.title
        });

    },
    methods: {
        ...mapActions(class_store, {
            update_blog: 'update',
            get_blog: 'get',
        }),
        ...mapActions(employee_role_store, {
            fetch_all_employee_role: 'all',
        }),

        update: function () {
            let form_data = new FormData(event.target);
            form_data.append('id', this.$route.params.id);
            form_data.append('tags', this.tags);
            form_data.append('description', this.description);
            this.update_blog(form_data)
        },

        setTags: function (v) {
            this.tags = v
        },

    },
    computed: {
        ...mapState(employee_role_store, {
            all_employee_role: 'all_data'
        }),
        ...mapState(class_store, {
            single_data: 'single_data'
        })
    },

}
</script>

<style></style>
