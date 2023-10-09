<template>
    <div class="" :id="slug">
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="bn" style="font-size: 22px!important;">সকল {{ data.title }} </h4>
                </div>
                <div class="d-flex justify-content-between">
                    <!-- <label class="switch">
                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                        <input v-else type="checkbox" @change="toggle">
                        <span class="switch-state" style="background-color: #4c6887;"></span>
                    </label> -->

                    <div v-if="data.is_multiple" class="ps-3">
                        <router-link :to="{ name: 'ContentPageDetailsCreate', params: { slug: data.slug } }"
                            class="btn btn-sm btn-info"> Create </router-link>
                    </div>
                </div>
            </div>
            <div class="card-body px-4 py-2 form_area custom_scroll ">
                <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-start" style="width: 400px;">
                                    Notice Title
                                </th>
                                <th style="width: 200px;">
                                    Source Title
                                </th>
                                <th style="width: 200px;">
                                    Source Url
                                </th>
                                <th style="width: 200px;">
                                    Source File
                                </th>
                                <th style="width: 200px;">
                                    Date
                                </th>
                                <th style="width: 200px;" class="text-end">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in list_data.data" :key="item.id">
                                <td class="text-start">{{ item.title }}</td>
                                <td class="">{{ item.source_title }}</td>
                                <td class="">
                                    <a v-if="item.source_url" :href="item.source_url" target="_blank">Source Url</a>
                                </td>
                                <td class="">
                                    <a v-if="item.source_file" :href="item.source_file" target="_blank">Source File</a>
                                </td>
                                <td>{{ new Date(item.created_at).toLocaleString() }}</td>
                                <td class="text-end" >
                                    <div class="d-flex justify-content-end gap-3">
                                        <router-link
                                            class="btn btn-sm btn-outline-info"
                                            :to="{ name: 'ContentPageDetailsEdit', params: { slug: data.slug, id: item.id } }">
                                            Edit
                                        </router-link>
                                        <a href="#" @click.prevent="destroy(item.id)" class="btn btn-sm btn-outline-danger"> delete </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-2">
                <nav aria-label="Page navigation example" class="">
                    <ul class="pagination pagination-warning">
                        <template v-for="(link, index) in list_data.links" :key="index">
                            <li class="page-item" :class="{ active: link.active }">
                                <a class="page-link"
                                    @click.prevent="() => link.url ? get_all_menu_details(link.url) : ''"
                                    :href="link.url" v-html="`<span>${link.label}</span>`">
                                </a>
                            </li>
                        </template>
                    </ul>
                </nav>
            </div>
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
    }),
    created: function () {
        this.default_url = '/navbar-menu-details/all?sub_menu_slug=' + this.slug +`&orderByType=DESC`;
        this.get_value();
        this.get_all_menu_details(this.default_url);
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
        get_all_menu_details: function (url) {
            axios.get(url)
                .then(res => {
                    this.list_data = res.data;
                })
        },
        destroy: async function(id){
            let confirm = await window.s_confirm("sure want to delete?");
            if(confirm){
                axios.post('/navbar-menu-details/destroy?id='+id)
                    .then(res => {
                        // console.log(res.data);
                        this.get_all_menu_details(this.default_url);
                    })
            }
        },
    }
}
</script>

<style></style>
