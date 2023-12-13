import { defineStore } from "pinia"

export const store = defineStore('student_store', {
    state: () => ({
        all_data: {},
        single_data: {},
    }),
    getters: {

    },
    actions: {
        all: async function (url) {
            let response
            if (url) {
                response = await axios.get(url)
            } else {
                response = await axios.get('user/all-students')
            }
            // console.log(response.data);
            this.all_data = response.data;
        },
        get: async function (id) {
            let response = await axios.get('user/student/' + id);
            response = response.data
            this.single_data = response
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
            let response = await axios.post('user/store-student', form)
            window.s_alert("Data created")
            console.log("res", response.data);
        },
        update: async function (form) {
            let response = await axios.post('user/update-student', form)
            window.s_alert("Data  updated")
        },
        delete: async function (id) {
            var data = await window.s_confirm()
            if (data) {
                let response = await axios.post('user/destroy?id=' + id)
                window.s_alert("Data deleted")
                this.all();
                console.log(response.data);
            }

        },
    },
})
