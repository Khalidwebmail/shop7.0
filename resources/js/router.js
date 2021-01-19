import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeComponent from "./components/pages/HomeComponent.vue"
import LoginComponent from "./components/pages/auth/LoginComponent.vue"
import RegisterComponent from "./components/pages/auth/RegisterComponent.vue"
import ForgetPasswordComponent from "./components/pages/auth/ForgetPasswordComponent.vue"

Vue.use(VueRouter)

const routes = [
    { path: '/home', component: HomeComponent, name: "/home" },
    { path: '/', component: LoginComponent, name: '/' },
    { path: '/register', component: RegisterComponent, name: 'register' },
    { path: '/forget-password', component: ForgetPasswordComponent, name: 'forget' },
]

export default new VueRouter({
    mode: 'history',
    routes
})