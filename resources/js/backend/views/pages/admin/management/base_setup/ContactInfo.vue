<template>
    <div class="">
        <div class="card rounded-none">
            <div class="card-header">
                <h4> Contact Informations</h4>
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
                title: 'map_link',
                type: 'text',
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
                title: 'phone_numbers',
                type: 'text',
                is_multiple: true,
                values:[],
            },
            {
                title: 'emails',
                type: 'text',
                is_multiple: true,
                values: [],
            },
            {
                title: 'whatsapp',
                type: 'text',
            },

            {
                title: 'telegram',
                type: 'text',
            },

            {
                title: 'facebook',
                type: 'text',
            },
            {
                title: 'youtube',
                type: 'text',
            },
            {
                title: 'instagram',
                type: 'text',
            },
            {
                title: 'linkedin',
                type: 'text',
            },
            {
                title: 'twitter',
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
                    if(e.is_multiple){
                        let item = res.data.filter(i=>i.title==e.title);
                        e.values = item;
                    }else{
                        let item = res.data.find(i=>i.title==e.title);
                        e.value = item.value;
                        e.id = item.id;
                    }
                });
            })
        },
    }
}
</script>

<style></style>
