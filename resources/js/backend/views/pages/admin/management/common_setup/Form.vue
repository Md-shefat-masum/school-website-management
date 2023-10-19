<template>
    <form @submit.prevent="submit_form">
        <div class="card">
            <div>
                <div class="card-header py-3 position-sticky d-flex justify-content-between align-items-center">
                    <h6>Form </h6>
                    <router-link :to="{ name: `Blog` }" class="btn btn-info btn-sm">Back</router-link>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <template v-for="(form_field, index) in form_fields" :key="index">
                            <common-input
                                :label="form_field.label"
                                :type="form_field.type"
                                :name="form_field.name"
                                :multiple="form_field.multiple"
                                :data_list="form_field.data_list"
                            />
                        </template>
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
import { mapActions } from 'pinia';
import { common_setup_store } from './setup/store';
import form_fields from "./setup/from_fields";
export default {
    data: ()=>({
        form_fields,
        param_id: null,
    }),
    created: function () {
        console.log(this.form_fields);
        let status = this.form_fields.find(i=>i.name == "status");
        status.data_list = [
            {
                label: "ok",
                value: true,
            },
            {
                label: "not ok",
                value: false,
            },
        ]

        let id = this.$route.query.id;
        if(id){
            this.param_id = id;
            this.get(id);
        }
    },
    methods: {
        ...mapActions(common_setup_store, [
            'get'
        ]),
        submit_form: function(){
            if(param_id){
                // store
            }else{
                // update
            }
        }
    }
}
</script>

<style></style>
