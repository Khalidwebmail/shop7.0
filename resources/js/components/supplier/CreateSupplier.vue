<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Supplier</h1>
                                </div>

                                <form class="user" v-on:submit.prevent="create" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="exampleName" placeholder="Supplier Name" v-model="form.name" autocomplete="off">
                                                <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="email" class="form-control" id="examplePhone" placeholder="Email address" v-model="form.email" autocomplete="off">
                                                <small class="text-danger" v-if="errors.name"> {{ errors.email[0] }} </small>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <textarea class="form-control" id="exampleAddress" placeholder="Address" cols="30" rows="10" v-model="form.address" autocomplete="off"></textarea>
                                                <small class="text-danger" v-if="errors.address"> {{ errors.address[0] }} </small>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="exampleShopName" placeholder="Enter shop name" v-model="form.shop_name" autocomplete="off">
                                                <small class="text-danger" v-if="errors.shop_name"> {{ errors.shop_name[0] }} </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Your phone Number" v-model="form.phone">
                                                <small class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <input type="file" class="custom-file-input" id="customFile" v-on:change="onFileSelected">
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
        if (!User.loggedIn()) {
            this.$router.push({name: '/'})
        }
    },
    data(){
        return{
            form:{
                name: null,
                email: null,
                phone: null,
                address: null,
                photo: null,
                shop_name: null
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
        create: function(){
            axios.post("/api/supplier", this.form)
                .then(()=>{
                    this.$router.push({ name: 'suppliers' })
                    Notification.success()
                })
                .catch((error)=>{
                    this.errors = error.response.data
                })
        }
    }
}
</script>
