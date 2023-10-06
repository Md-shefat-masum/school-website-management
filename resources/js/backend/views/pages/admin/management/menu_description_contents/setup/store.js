import { defineStore } from 'pinia'

export const content_store = defineStore('content_store', {
    state: () => ({
        data: {},
    }),
    getters: {
    },
    actions: {
        get_content: function(){
            console.log('called');
        }
    },
})
