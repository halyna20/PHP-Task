const app = {
    data() {
        return {
            visible: false,
            errors: [],
            employees: [],
            name: '',
            phone: '',
            department: '',
            id: 0
        }
    },
    methods: {
        addEmployee() {
            this.errors = []
            if (this.name == "" || this.phone == "" || this.department == "") {
                this.errors.push("Заповніть, будь ласка, всі поля даними")
            }

            const regex = /^\+?38\s?(\(|\s)?\d{3}(\)|\s)?\s?\d{3}(\s|-)?\d{2}(\s|-)?\d{2}$/
            if (!regex.test(String(this.phone))) {
                this.errors.push("Введіть вірний номер телефону")
            }

            if (!this.errors.length) {
                this.id++
                this.employees.push({ id: this.id, name: this.name, phone: this.phone, department: this.department })
                this.name = ''
                this.phone = ''
                this.department = ''
            }
        },
    }
}
Vue.createApp(app).mount('#app')