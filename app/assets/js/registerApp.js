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
        }
    }
}).mount('#app')

async function request(url, body, method) {

    let res = await fetch(url, {
        method: method,
        headers: {},
        body: body
    })

    if (res.status === 200 && res.ok) {
        let data = res.json()
        return data
    }
    return { "error": res.status }
}