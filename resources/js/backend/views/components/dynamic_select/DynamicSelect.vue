<template>
    <div>
        <ul class="d-flex mb-1 flex-wrap gap-2">
            <li class="btn btn-sm btn-outline-info px-1" v-for="(item, index) in data" :key="index">
                <div class="d-flex gap-3 align-items-baseline px-1 justify-content-between">
                    <span>
                        {{ item.title }}
                    </span>
                    <i @click="remove(index)" class="icon-close text-danger"></i>
                </div>
            </li>
        </ul>
        <input v-on:keyup.enter="onEnter" type="text" class="form-control " name=""  id="">
    </div>
</template>

<script>
export default {
    props: ['setValue'],
    data: () => ({
        data: []
    }),

    methods: {
        onEnter: function () {
            let value = event.target.value
            if (value.length) {
                this.data.push({
                    title: value
                });
                event.target.value = ''
                this.setValue(this.data.map(i => i.title))
            }
        },
        remove: function(index){
            this.data.splice(index,1);
        }

    }
}
</script>

