import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeComponent from "./components/pages/HomeComponent.vue"

Vue.use(VueRouter)

const routes = [
    { path: '/', component: HomeComponent },
]

export default new VueRouter({
    mode: 'history',
    routes
})