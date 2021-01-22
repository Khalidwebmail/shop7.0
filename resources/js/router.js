import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeComponent from "./components/pages/HomeComponent.vue"
import LoginComponent from "./components/pages/auth/LoginComponent.vue"
import RegisterComponent from "./components/pages/auth/RegisterComponent.vue"
import ForgetPasswordComponent from "./components/pages/auth/ForgetPasswordComponent.vue"
import LogoutComponent from "./components/pages/auth/LogoutComponent.vue"
/**
 * Employee modules
 */
import IndexEmployee from "./components/employee/IndexEmployee.vue"
import CreateEmployee from "./components/employee/CreateEmployee.vue"
import EditEmployee from "./components/employee/EditEmployee.vue"

Vue.use(VueRouter)

const routes = [
    { path: '/home', component: HomeComponent, name: "home" },
    { path: '/', component: LoginComponent, name: '/' },
    { path: '/register', component: RegisterComponent, name: 'register' },
    { path: '/forget-password', component: ForgetPasswordComponent, name: 'forget' },
    { path: '/logout', component: LogoutComponent, name: 'logout' },
    { path: '/employees', component: IndexEmployee, name: 'employees' },
    { path: '/store-employees', component: CreateEmployee, name: 'store-employees' },
    { path: '/edit-employees', component: EditEmployee, name: 'edit-employees' },
]

export default new VueRouter({
    mode: 'history',
    routes
})