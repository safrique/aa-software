import Vue from 'vue'
import App from './App.vue'
import router from './router/routes'

const axios = require('axios').default
window.axios = require('axios')

Vue.config.productionTip = false

new Vue({
    router,
    axios,
    render: h => h(App)
}).$mount('#app')
