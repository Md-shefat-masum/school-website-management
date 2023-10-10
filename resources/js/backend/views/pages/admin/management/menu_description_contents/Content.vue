<template>
    <div class="" :id="slug">
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="bn" style="font-size: 22px!important;"> {{ data.title }} </h4>
                </div>
                <div class="d-flex justify-content-between">
                    <label class="switch">
                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                        <input v-else type="checkbox" @change="toggle">
                        <span class="switch-state" style="background-color: #4c6887;"></span>
                    </label>
                    <div v-if="data.is_multiple" class="ps-3">
                        <router-link :to="{ name: 'ContentPageDetailsAll', params: { slug: data.slug } }"
                            class="btn btn-sm btn-info bn"> সকল {{ data.title }}</router-link>
                    </div>
                </div>
            </div>
            <form @submit.prevent="update">
                <div v-if="data.details" class="card-body px-4 py-2 form_area custom_scroll">
                    <div class="row">
                        <div class="col-lg-8">
                            <editor api-key="no-api-key" v-model="data.details.description" :init="{
                                height: 500,
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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Content Title</label>
                                <input type="text" v-model="data.details.title" name="title"
                                    class="form-control mt-1 mb-2">
                            </div>
                            <div class="form-group">
                                <label for="">Source Title</label>
                                <input type="text" v-model="data.details.source_title" name="source_title"
                                    class="form-control mt-1 mb-2">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Source URL</label>
                                <input type="text" v-model="data.details.source_url" name="source_url"
                                    class="form-control mt-1 mb-2">
                                <a v-if="data.details.source_url" :href="data.details.source_url" target="_blank">source
                                    file url</a>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Source File</label>
                                <input type="file" name="source_file" class="form-control mt-1 mb-2">
                                <a v-if="data.details.source_file" :href="'/' + data.details.source_file"
                                    target="_blank">source file link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-2">
                    <button class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import SettingForm from './components/SettingForm.vue';
import Editor from '@tinymce/tinymce-vue'
export default {
    components: { SettingForm, Editor },
    props: ['slug'],
    data: () => ({
        data: {},
    }),
    created: function () {
        this.get_value();
    },
    watch: {
        slug: {
            handler: function () {
                this.get_value();
            }
        }
    },
    methods: {
        get_value: function () {
            // console.log(this.$route.params);
            axios.get('/navbar-menu-item/' + this.slug + `?with_details=1`)
                .then(res => {
                    // console.log(res.data);
                    this.data = res.data;
                })
        },
        update: function () {
            // console.log(this.$route.params);
            let form_data = new FormData(event.target);
            form_data.append('id', this.data.details.id);
            form_data.append('description', this.data.details.description);
            axios.post('/navbar-menu-details/update', form_data)
                .then(res => {
                    // console.log(res.data);
                    // this.data = res.data;
                    window.s_alert('data updated');
                })
        },
        toggle: function () {
            let value = event.target.checked;
            axios.post('/navbar-menu-item/disable', { id: this.data.id, status: value })
                .then(res => {
                    window.s_alert('data updated');
                })
        }
    }
}
</script>

<style></style>
