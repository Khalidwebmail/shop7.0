<template>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form v-on:submit.prevent="register">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" id="exampleInputName" placeholder="Customer Name" v-model="form.name">
                                        <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small> 
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" v-model="form.email">
                                        <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>  
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password">
                                        <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>  
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                                        placeholder="Repeat Password" v-model="form.password_confirmation">
                                        <small class="text-danger" v-if="errors.password_confirmation"> {{ errors.password_confirmation[0] }} </small> 
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <router-link class="font-weight-bold small" to="/">Already have an account?</router-link>
                                </div>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created(){
            if (User.loggedIn()) {
                this.$router.push({name: 'home'})
            }
        },
        data(){
            return{
                form:{
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                },
                errors:{}
            }
        },
        methods:{
            register: function(){
                axios.post("/api/auth/signup", this.form)
                    .then((response)=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Signup Complete'
                        })
                        this.$router.push({ name: 'register' })
                        this.form.name = ''
                        this.form.email = ''
                        this.form.password = ''
                        this.form.password_confirmation = ''
                    })
                    .catch((error)=>{
                        this.errors = error.response.data
                    })
            }
        }
    }
</script>
