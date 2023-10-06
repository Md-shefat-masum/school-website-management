<template>
    <div class="">
        <div class="card rounded-none">
            <div class="card-header pt-3 pb-1">
                <h4 class="bn" style="font-size: 22px!important;"> {{ data.title }} </h4>
            </div>
            <div class="card-body px-4 pt-4 form_area custom_scroll">
                
            </div>
        </div>
    </div>
</template>

<script>
import SettingForm from './components/SettingForm.vue';
export default {
    components: { SettingForm },
    data: () => ({
        data: {},
    }),
    created: function(){
        this.get_value();
    },
    methods: {
        get_value: function(){
            // console.log(this.$route.params);
            axios.get('/navbar-menu-item/'+this.$route.params.slug)
            .then(res=>{
                console.log(res.data);
                this.data = res.data;
            })
        },

    }
}
</script>

<style></style>
