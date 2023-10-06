<template>
    <div class="">
        <div class="card rounded-none">
            <div class="card-header">
                <h4>Institute Details</h4>
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
    components: {SettingForm},
    data: () => ({
        fields: [
            {
                title: 'institute_short_intro',
                type: 'text',
            },
            {
                title: 'institute_long_intro',
                type: 'text',
            },
        ],
    }),
    created: function () {
        this.get_value();
    },
    methods: {
        get_value: function () {
            axios.post('/setting-title-value/selected', {
                titles: this.fields.map(i => i.title),
            })
                .then(res => {
                    // console.log(res.data);
                    this.fields.map(e => {
                        if (e.is_multiple) {
                            let item = res.data.filter(i => i.title == e.title);
                            e.values = item;
                        } else {
                            let item = res.data.find(i => i.title == e.title);
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
