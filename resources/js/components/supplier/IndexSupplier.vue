<template>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Supplier List</h6>
                    <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th>Photo</th>
                            <th>Supplier Name</th>
                            <th>Shop Name</th>
                            <th>Email</th>
                            <th>Cell Num</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody v-if="suppliers.length > 0">
                        <tr v-for="supplier in filterSearch" :key="supplier.id">
                            <td>
                                <img :src="supplier.photo" alt="No image uploaded" id="supplier_photo">
                            </td>
                            <td>{{ supplier.name }}</td>
                            <td>{{ supplier.shop_name }}</td>
                            <td>{{ supplier.email }}</td>
                            <td>{{ supplier.phone }}</td>
                            <td>{{ supplier.address }}</td>
                            <td>
                                <router-link :to="{name: 'edit-suppliers', params:{id:supplier.id}}" class="btn btn-sm btn-primary">Edit</router-link>

                                <a href="javascript:void(0)" v-on:click="destroy(supplier.id)" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
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
        this.index()
        Fire.$on('AfterCreate', ()=> {
            this.index()
        });
    },

    data(){
        return{
            suppliers: [],
            searchTerm: ''
        }
    },

    computed:{
        filterSearch(){
            return this.suppliers.filter(supplier => {
                return supplier.phone.match(this.searchTerm)
            })
        }
    },

    methods:{
        index: function(){
            axios.get("/api/supplier/")
                .then((response)=>{
                    this.suppliers = response.data
                })
                .catch(()=>{

                })
        },

        destroy: function(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {

                    axios.delete("/api/supplier/" + id)
                        .then(()=>{
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');
                        })
                        .catch(()=>{
                            this.$router.push({name: 'suppliers'})
                        })
                }
            })
        }
    }
}
</script>

<style type="text/css">
#supplier_photo{
    height: 40px;
    width: 40px;
}
</style>
