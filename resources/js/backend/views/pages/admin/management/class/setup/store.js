import { defineStore } from "pinia"

export const class_store = defineStore('class_store', {
    state: () => ({
        all_data: {},
        single_data: {},
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        all: async function (url) {
            let response
            if (url) {
                response = await axios.get(url)
            } else {
                response = await axios.get('/academic-class/all')
            }
            // console.log(response.data);
            this.all_data = response.data;
        },
        all_class: async function (url) {
            let response
            if (url) {
                response = await axios.get(url)
            } else {
                response = await axios.get('/academic-class/all?get_all=1')
            }
            // console.log(response.data);
            this.all_data = response.data;
        },
        get: async function (id) {
            let response = await axios.get('academic-class/' + id);
            response = response.data
            this.single_data = response
            console.log("sngdata",  this.single_data)
            for (const key in response) {
                if (Object.hasOwnProperty.call(response, key)) {
                    const value = response[key];
                    var el = document.querySelector(`input[name='${key}']`);
                    if (el && (el.type == 'text')) {
                        el.value = value
                    }
                    var el = document.querySelector(`textarea[name='${key}']`);
                    if (el && (el.type == 'textarea')) {
                        el.value = value
                    }
                    var el = document.querySelector(`input[name='${key}']`);
                    if (el && (el.type == 'date')) {
                        el.value = value
                    }
                    var el = document.querySelector(`select[name='${key}']`);
                    if (el) {
                        el.value = value
                    }
                }
            }

        },
        store: async function (form) {
            let response = await axios.post('/academic-class/store', form)
            window.s_alert("Data created")
        },
        update: async function (form) {
            let response = await axios.post('/academic-class/update', form)
            window.s_alert("Data  updated")
        },
        delete: async function (id) {
            var data = await window.s_confirm()
            if (data) {
                let response = await axios.post('/academic-class/destroy?id=' + id)
                window.s_alert("Data deleted")
                this.all();
                console.log(response.data);
            }

        },
    },
})
