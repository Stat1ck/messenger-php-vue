Vue.createApp({
    data() {
        return {
            
        }
    },

    methods: {
        async onRegister(e) {
            let url = e.target.action
            let method = e.target.method
            let body = new FormData(e.target)

            let res = await request(url, body, method)
            console.log(res)
        },

        getCurrentUrl() {
            return window.location.pathname
        },

        getPageContent() {
            this.request(this.getCurrentUrl())
        },

        async request(url = '/', body = {}, method = 'POST', headers = {}) {

            let res = await fetch(url, {
                method: method,
                headers: headers,
                body: body
            })

            if (res.status === 200 && res.ok) {
                let data = res.json()
                return data
            }

            return { "error": res.status }
        }
    },

    beforeMount() {
        this.getPageContent()
    }
}).mount('#app')