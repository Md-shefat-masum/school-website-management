<template>
    <div>
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="bn" style="font-size: 22px !important;">All {{ setup.page_title }}</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <!-- <label class="switch">
                        <input v-if="data.is_visible" type="checkbox" @change="toggle" checked="">
                        <input v-else type="checkbox" @change="toggle">
                        <span class="switch-state" style="background-color: #4c6887;"></span>
                    </label> -->
                    <div class="ps-3 d-flex gap-2">
                        <router-link :to="{ name: `${setup.route_prefix}Create` }" class="btn btn-sm btn-info">
                            Create
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="card-body px-4 py-2 form_area custom_scroll">
                <div class="custom_table nowrap table-responsive w-100 h-100 custom_scroll">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-start" style="width: 5px;"><input type="checkbox"></th>
                                <th class="text-start" style="width: 50px;"> Sl</th>
                                <th class="text-start" style="width: 50px;"> Image</th>
                                <th class="text-start" style="width: 400px;"> Name</th>
                                <th class="text-start" style="width: 400px;"> Class</th>
                                <th class="text-start" style="width: 400px;"> St Number</th>
                                <th class="text-start" style="width: 400px;"> Parent Number</th>
                                <th class="text-center" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item) in all_data?.data" :key="item.id">
                                <td class="text-start"> <input type="checkbox" name="" id=""></td>
                                <td class="text-start"> {{ item.id }}</td>
                                <td class="text-start">
                                    <img :src="'/'+item.image" style="height: 40px;" alt="">
                                </td>
                                <td class="text-start">{{ item.full_name }}</td>
                                <td class="text-start">{{ item.information?.class }}</td>
                                <td class="text-start">{{ item.information?.personal_phone_number }}</td>
                                <td class="text-start">{{ item.information?.parent_phone_number }}</td>

                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-3">
                                        <router-link :to="{ name: `${setup.route_prefix}Edit`, params: { id: item.id } }"
                                            class="btn btn-sm btn-outline-info"> Edit </router-link>
                                        <a @click.prevent="blog_delete(item.id)" href="#"
                                            class="btn btn-sm btn-outline-danger"> delete </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-2">

            </div>
        </div>

    </div>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { store } from './setup/store';
import setup from './setup'
export default {
    data: () => ({
        setup
    }),
    created: function () {
        this.fetch_all();
    },
    methods: {
        ...mapActions(store, {
            fetch_all: 'all',
            blog_delete: 'delete',
        })
    },
    computed: {
        ...mapState(store, {
            all_data: 'all_data'
        })

    },



}
</script>

<style></style>
