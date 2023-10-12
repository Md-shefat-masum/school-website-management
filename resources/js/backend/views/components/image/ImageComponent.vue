<template>
    <div>
        <input @change="preview" type="file" ref="input_files" :accept="accept" :class="classNames" :name="name" :multiple="multiple">
        <div class="uploaded_image_preview my-2 d-flex gap-1 flex-wrap">
            <img v-for="i in images" :key="i" :src="i" class="img-fulid img-thumbnail" style="width: 80px; height: 80px;
                object-fit: contain;">
        </div>
    </div>
</template>

<script>
export default {
    props: {
        name: {
            required: true,
            default: 'selected_images'
        },
        multiple: {
            default: false,
        },
        classNames: {
            default: "form-control",
        },
        accept: {
            required: true,
        }
    },
    data: () => ({
        images: [],
    }),
    methods: {
        preview: function () {
            let that = this;
            that.images = [];
            [...that.$refs.input_files.files].forEach(el => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const base64String = e.target.result;
                    that.images.push(base64String);
                };
                reader.readAsDataURL(el);
            })
        }
    }
}
</script>

<style></style>
