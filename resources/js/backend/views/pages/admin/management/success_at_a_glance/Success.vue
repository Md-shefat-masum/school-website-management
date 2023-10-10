<template>
    <form @submit.prevent="update">
        <div class="card">
            <div class="card-header py-2 position-sticky d-flex justify-content-end">
                <button class="btn btn-info btn-sm">update</button>
            </div>
            <div class="card-body success_info_card">
                <div v-for="(item, index) in data" :key="item.id" class="form-group border rounded-1 p-2 mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <label for="" >
                            Title
                        </label>
                        <div class="mt-1" style="flex: 1;">
                            <input type="hidden" v-model="item.id" :name="`items[${index}][id]`">
                            <textarea v-model="item.title" :name="`items[${index}][title]`" class="form-control"
                                rows="1"></textarea>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <label for="" >
                            Details
                        </label>
                        <div class="mt-1" style="flex: 1;">
                            <textarea v-model="item.description" :name="`items[${index}][description]`" class="form-control"
                                rows="1"></textarea>
                        </div>
                    </div>
                    <div class="text-end pt-1">
                        <button @click.prevent="delete_data(item.id, index)" type="button"
                            class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
            <div class="card-footer py-2">
                <button @click.prevent="add_new" class="btn btn-primary">Add New</button>
            </div>
        </div>
    </form>
</template>

<script>
import SettingForm from './components/SettingForm.vue';
export default {
    components: { SettingForm },
    data: () => ({
        data: [],
    }),
    created: function () {
        this.get_value();
    },
    methods: {
        get_value: function () {
            axios.get('/success-at-a-glance/get-all')
                .then(res => {
                    this.data = res.data;
                })
        },
        update: function () {
            axios.post('/success-at-a-glance/update-list', new FormData(event.target))
                .then(res => {
                    this.data = res.data;
                    window.s_alert('data updated.');
                    this.get_value();
                })
        },
        add_new: function () {
            this.data.push({
                id: this.data[this.data.length - 1].id + 1,
                title: '',
                description: '',
            })
        },
        delete_data: async function(id, index){
            let con = await window.s_confirm("delete data");
            if(con){
                axios.post('/success-at-a-glance/destroy', {id})
                    .then(res => {
                        this.get_value();
                    })
            }
        }

    }
}
</script>

<style></style>
