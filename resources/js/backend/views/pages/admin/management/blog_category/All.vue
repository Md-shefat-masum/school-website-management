<template>
    <div>
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="bn" style="font-size: 22px !important;">All Blog Category</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <!-- <label class="switch">
                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                        <input v-else type="checkbox" @change="toggle">
                        <span class="switch-state" style="background-color: #4c6887;"></span>
                    </label> -->
                    <div class="ps-3"><router-link :to="{ name: `BlogCategoryCreate` }" class="btn btn-sm btn-info"> Create
                        </router-link></div>
                </div>
            </div>
            <div class="card-body px-4 py-2 form_area custom_scroll">
                <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-start" style="width: 5px;"><input type="checkbox"></th>
                                <th class="text-start" style="width: 50px;"> Sl</th>
                                <th class="text-start" style="width: 400px;"> Title</th>
                                <th style="width: 200px;">Date</th>
                                <th style="width: 200px;">Status</th>
                                <th class="text-center" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in all_blog_category?.data" :key="item.id">
                                <td class="text-start"> <input type="checkbox" name="" id=""></td>
                                <td class="text-start"> {{ index + 1 }}</td>
                                <td class="text-start">{{ item.title }}</td>
                                <td class="">{{ new Date(item.created_at).toLocaleString() }}</td>

                                <td> <span class="badge badge-success">{{ item.status }}</span></td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-3">
                                        <router-link :to="{ name: `BlogCategoryEdit`, params: { id: item.id } }"
                                            class="btn btn-sm btn-outline-info"> Edit </router-link>
                                        <a @click.prevent="blog_category_delete(item.id)" href="#"
                                            class="btn btn-sm btn-outline-danger"> delete </a>
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
                        <li class="page-item">
                            <a class="page-link"><span>« Previous</span></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link"
                                href="http://127.0.0.1:8000/api/v1/navbar-menu-details/all?orderByType=DESC&amp;sub_menu_slug=vrti-notis-82634719&amp;page=1"><span>1</span></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"><span>Next »</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { blog_category_store } from './setup/store';
export default {
    created: function () {
        this.fetch_all_blog_category();
    },
    methods: {
        ...mapActions(blog_category_store, {
            fetch_all_blog_category: 'all',
            blog_category_delete: 'delete',
        })
    },
    computed: {
        ...mapState(blog_category_store, {
            all_blog_category: 'all_data'
        })
    },
}
</script>

<style></style>
