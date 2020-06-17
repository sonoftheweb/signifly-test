import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: routes,
    mode: 'history' // so we do not have that # sign in the url bar when navigating
})

router.initialize = async () => {
    router.beforeEach(async (to, from, next) => {
        return next()
    })
}

export default router
