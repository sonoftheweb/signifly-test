import './bootstrap'
import Vue from 'vue'
import App from './App'
import vuetify from './plugins/vuetify'
import router from './router/router'

router.initialize()

const app = new Vue({
    vuetify,
    router,
    render: h => h(App),
}).$mount('#app')
