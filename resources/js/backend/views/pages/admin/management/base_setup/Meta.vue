<template>
    <div class="">
        <div class="card rounded-none">
            <div class="card-header">
                <h4> Meta Informations</h4>
            </div>
            <div class="card-body px-4 pt-4 form_area custom_scroll">

                <div v-for="field in fields" :key="field.title" class="form-group setting_form">
                    <label :for="field.title">{{ field.title.replaceAll('_',' ') }}</label>
                    <div>
                        <input v-if="field.type === 'file'" type="file" class="form-control" name="header_logo">
                        <img :src="`/${field.value}`" v-if="field.type === 'file'" style="height: 60px;" alt="">

                        <textarea v-if="field.type === 'text'" :id="field.title" :name="field.title" :value="field.value" class="form-control"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        fields: [
            {
                title: 'institue_name_bangla',
                type: 'text',
            },
            {
                title: 'institue_name_english',
                type: 'text',
            },
            {
                title: 'institue_name_arabic',
                type: 'text',
            },
            {
                title: 'header_logo',
                type: 'file',
            },
            {
                title: 'footer_logo',
                type: 'file',
            },

            {
                title: 'address_bangla',
                type: 'text',
            },
            {
                title: 'address_english',
                type: 'text',
            },


            {
                title: 'map_link',
                type: 'text',
            },
            {
                title: 'copy_right',
                type: 'text',
            },

        ],
    }),
    created: function(){
        this.get_value();
    },
    methods: {
        get_value: function(){
            axios.post('/setting-title-value/selected',{
                titles: this.fields.map(i=>i.title),
            })
                .then(res=>{
                    // console.log(res.data);
                    this.fields.map(e=>{
                        let item = res.data.find(i=>i.title==e.title);
                        e.value = item.value;
                        e.id = item.id;
                    });
                })
        }
    }
}
</script>

<style></style>
