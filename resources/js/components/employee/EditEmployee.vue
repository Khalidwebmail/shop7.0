<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
            <div class="card-body p-0">
                <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Employee</h1>
                    </div>

                        <form class="user" v-on:submit.prevent="update" enctype="multipart/form-data">

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Name" v-model="form.name" autocomplete="off">
                                        <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                                    </div>


                                    <div class="col-md-6">
                                        <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Your Email" v-model="form.email" autocomplete="off">
                                        <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Address" v-model="form.address" autocomplete="off">
                                        <small class="text-danger" v-if="errors.address"> {{ errors.address[0] }} </small>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Salary" v-model="form.salary" autocomplete="off">
                                        <small class="text-danger" v-if="errors.salary"> {{ errors.salary[0] }} </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Joining Date" v-model="form.joining_date" autocomplete="off">
                                        <small class="text-danger" v-if="errors.joining_date"> {{ errors.joining_date[0] }} </small>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Nid" v-model="form.nid" autocomplete="off">
                                        <small class="text-danger" v-if="errors.nid"> {{ errors.nid[0] }} </small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Your phone Number" v-model="form.phone">
                                        <small class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </small>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input type="file" class="custom-file-input" id="customFile" v-on:change="onFileSelected">
                                        <small class="text-danger" v-if="errors.photo"> {{ errors.photo[0] }} </small>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>

                                    <div class="col-md-6">
                                        <img :src="form.photo" style="height: 40px; width: 40px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    <hr>
                        <div class="text-center">
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
            // if (!User.loggedIn()) {
            //     this.$router.push({name: '/'})
            // }
            let id = this.$route.params.id
            axios.get('/api/employee/'+id)
                .then((response)=>{
                    this.form = response.data
                })
                .catch((error)=>{
                    console.log(this.error)
                })
        },
        data(){
            return{
                form:{
                    name: null,
                    email: null,
                    phone: null,
                    salary: null,
                    address: null,
                    photo: null,
                    nid: null,
                    joining_date: null
                },
                errors:{}
            }
        },
        methods:{
            onFileSelected: function(event){
                let file = event.target.files[0]
                if(file.size > 1000)
                {
                    Notification.image_validation()
                }
                else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            update: function(){
                let id = this.$route.params.id
                axios.put("/api/employee/"+id, this.form)
                    .then(()=>{
                        this.$router.push({ name: 'employees' })
                        Notification.success()
                    })
                    .catch((error)=>{
                        this.errors = error.response.data
                    })
            }
        }
    }
</script>
