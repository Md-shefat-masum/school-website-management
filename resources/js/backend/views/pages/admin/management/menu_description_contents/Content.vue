<template>
    <div class="" :id="slug">
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="bn" style="font-size: 22px!important;"> {{ data.title }} </h4>
                </div>
                <div>
                    <label class="switch">
                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                        <input v-else type="checkbox" @change="toggle">
                        <span class="switch-state" style="background-color: #4c6887;"></span>
                    </label>
                </div>
            </div>
            <div v-if="data.details" class="card-body px-4 py-2 form_area custom_scroll">
                <editor api-key="no-api-key"
                v-model="data.details.description"
                :init="{
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
            <div class="card-footer py-2">
                <button @click="update" class="btn btn-info">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
import SettingForm from './components/SettingForm.vue';
import Editor from '@tinymce/tinymce-vue'
export default {
    components: { SettingForm, Editor },
    props:['slug'],
    data: () => ({
        data: {},
    }),
    created: function () {
        this.get_value();
    },
    watch:{
        slug: {
            handler: function(){
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
            axios.post('/navbar-menu-details/update',{id: this.data.details.id, description: this.data.details.description})
                .then(res => {
                    // console.log(res.data);
                    // this.data = res.data;
                    window.s_alert('data updated');
                })
        },
        toggle: function(){
            let value = event.target.checked;
            axios.post('/navbar-menu-item/disable',{id: this.data.id, status: value})
                .then(res => {
                    window.s_alert('data updated');
                })
        }
    }
}
</script>

<style></style>
