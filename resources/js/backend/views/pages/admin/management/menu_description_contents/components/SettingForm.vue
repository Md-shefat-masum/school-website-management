<template>
    <div v-for="field in fields" :key="field.title" class="form-group setting_form">
        <label :for="field.title">{{ field.title.replaceAll('_', ' ') }}</label>
        <div>
            <input accept=".jpg,jpeg,.png" v-if="field.type === 'file'"
                @change="update(field.id, $event.target.files[0], field)" type="file" class="form-control"
                name="header_logo">
            <img :src="`/${field.value}`" v-if="field.type === 'file'" style="height: 60px;" alt="">

            <div v-if="field.is_multiple">
                <template v-for="sfield in field.values" :key="sfield.id">
                    <textarea @change="update(sfield.id, $event.target.value, sfield)" :id="sfield.title"
                        :name="sfield.title" :value="sfield.value" class="form-control mb-2"></textarea>
                </template>
            </div>
            <div v-else>
                <textarea @change="update(field.id, $event.target.value, field)" v-if="field.type === 'text'"
                    :id="field.title" :name="field.title" :value="field.value" class="form-control"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['fields'],
    methods: {
        update: function(id,value,item){
            let formData = new FormData(document.createElement('form'));
            formData.append('id',id);
            formData.append('value',value);

            axios.post('/setting-title-value/update-single',formData)
            .then(res=>{
                // console.log(res.data);
                window.s_alert("setting updated")
                if(res.data){
                    item.value = res.data.value;
                }
            })
        }
    }
}
</script>

<style></style>
