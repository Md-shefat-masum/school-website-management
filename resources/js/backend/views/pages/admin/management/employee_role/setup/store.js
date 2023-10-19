import { defineStore } from "pinia"

export const employee_role_store = defineStore('employee_role_store', {
    state: () => ({
        all_data: {},
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
                response = await axios.get('/employee-role/all')
            }
            console.log(response.data);
            this.all_data = response.data;
        },
        get: async function (id) {
            let response = await axios.get('employee-role/' + id);
            response = response.data
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

                    var el = document.querySelector(`select[name='${key}']`);
                    if (el) {
                        el.value = value
                    }
                }
            }

        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post('/employee-role/store', formData)
            window.s_alert("Data created")
            console.log("res", response.data);
        },
        update: async function (form) {
            let response = await axios.post('/employee-role/update', form)
            window.s_alert("Data  updated")
            console.log(response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm()
            if (data) {
                let response = await axios.post('/employee-role/destroy?id=' + id)
                window.s_alert("Data deleted")
                this.all();
                console.log(response.data);
            }

        },
    },
})
