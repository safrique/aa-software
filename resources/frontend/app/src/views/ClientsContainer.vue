<template>
    <div class="clients-container">

    </div>
</template>

<script>
const axios = require('axios')

export default {
    name: 'ClientsContainer',

    data () {
        return {
            loading: false,
            clients: {},
        }
    },

    methods: {
        getClients () {
            this.loading = true

            return axios
                .get('clients/get')
                .then(response => {
                    console.log(`/clients/get...`, response.data)
                    // TODO: Handle exception/status != 200
                    if (response.status === 200 && response.data) {
                        this.clients = response.data
                    }
                })
                .catch(e => console.log('/clients/get error...', e))
                .finally(() => this.loading = false)
        },
    },

    created () { this.getClients() },
}
</script>

<style scoped>

</style>
