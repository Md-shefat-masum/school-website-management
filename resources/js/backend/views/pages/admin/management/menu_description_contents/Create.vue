<template>
    <div class="" :id="slug">
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="bn" style="font-size: 22px!important;">নতুন {{ data.title }} </h4>
                </div>
                <div class="d-flex justify-content-between">
                    <!-- <label class="switch">
                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                        <input v-else type="checkbox" @change="toggle">
                        <span class="switch-state" style="background-color: #4c6887;"></span>
                    </label> -->

                    <div v-if="data.is_multiple" class="ps-3">
                        <router-link :to="{ name: 'ContentPageDetailsAll', params: { slug: data.slug } }"
                            class="btn btn-sm btn-info"> All </router-link>
                    </div>
                </div>
            </div>
            <form @submit.prevent="store">
                <div class="card-body px-4 py-2 form_area custom_scroll">
                    <div class="row">
                        <div class="col-lg-8">
                            <div>
                                <div id="description"></div>
                            </div>
                            <editor api-key="no-api-key" v-model="description" :init="{
                                height: 500,
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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Notice Title</label>
                                <div>
                                    <input type="text" name="title" id="title"
                                        class="form-control mt-1 mb-2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Source Title</label>
                                <input type="text" name="source_title"
                                    class="form-control mt-1 mb-2">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Source URL</label>
                                <input type="text" name="source_url" class="form-control mt-1 mb-2">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Source File <sub>(only .jpeg, .png, .jpg, .pdf)</sub></label>
                                <input type="file" accept=".jpeg,.png,.jpg,.pdf" name="source_file" class="form-control mt-1 mb-2">
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
        list_data: {},
        default_url: '',
        description: "",
    }),
    created: function () {
        this.default_url = '/navbar-menu-details/all?sub_menu_slug=' + this.slug;
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
        store: function () {
            let form_data = new FormData(event.target);
            form_data.append('navbar_menus_id', this.data.navbar_menus_id);
            form_data.append('navbar_menu_items_id', this.data.id);
            form_data.append('description', this.description);

            axios.post('/navbar-menu-details/store', form_data)
                .then(res => {
                    // console.log(res.data);
                    this.$router.push({name: 'ContentPageDetailsAll', params: { slug: this.data.slug } })
                })
        }
    }
}
</script>

<style></style>
