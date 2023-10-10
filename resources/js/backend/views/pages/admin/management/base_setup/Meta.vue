<template>
    <div class="">
        <div class="card rounded-none">
            <div class="card-header">
                <h4> Meta Informations</h4>
            </div>
            <div class="card-body px-4 pt-4 form_area custom_scroll">

                <setting-form :fields="fields"></setting-form>

            </div>
        </div>
    </div>
</template>

<script>
import SettingForm from './components/SettingForm.vue';
export default {
    components: { SettingForm },
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
                title: 'institute_code',
                type: 'text',
            },
            {
                title: 'eiin',
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
                title: 'fabicon',
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
        },

    }
}
</script>

<style></style>
