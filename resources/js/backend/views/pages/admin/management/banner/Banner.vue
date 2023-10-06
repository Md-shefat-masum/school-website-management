<template>
    <form @submit.prevent="udpate">
        <div class="card">
            <div class="card-header py-2 position-sticky d-flex justify-content-end">
                <button class="btn btn-info btn-sm">update</button>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">
                        Banner Image
                    </label>
                    <div class="mt-1 mb-3">
                        <input type="file" name="background" accept=".jpg,.jpeg,.png,.webp" class="form-control mb-1">
                        <img :src="`/${data.background}`" alt="" style="height: 80px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">
                        Banner Title
                    </label>
                    <div class="mt-1 mb-3">
                        <textarea name="title" :value="data.title" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">
                        Banner Button Text
                    </label>
                    <div class="mt-1 mb-3">
                        <textarea name="button_text" :value="data.button_text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">
                        Banner Button Url
                    </label>
                    <div class="mt-1 mb-3">
                        <textarea name="button_url" :value="data.button_url" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">
                        Breaking News
                    </label>
                    <div class="mt-1 mb-3">
                        <textarea name="breaking_news" :value="data.breaking_news" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import SettingForm from './components/SettingForm.vue';
export default {
    components: { SettingForm },
    data: () => ({
        data: {},
    }),
    created: function () {
        this.get_value();
    },
    methods: {
        get_value: function () {
            axios.get('/banner/first')
                .then(res => {
                    this.data = res.data;
                })
        },
        udpate: function () {
            axios.post('/banner/update-first',new FormData(event.target))
                .then(res => {
                    this.data = res.data;
                    window.s_alert('data updated.')
                })
        },

    }
}
</script>

<style></style>
