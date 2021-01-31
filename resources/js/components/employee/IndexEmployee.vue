<template>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Photo</th>
                            <th>Emp Name</th>
                            <th>NID Num</th>
                            <th>Email</th>
                            <th>Cell Num</th>
                            <th>Salary</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="employees.length > 0">
                        <tr v-for="employee in filterSearch" :key="employee.id">
                            <td>
                                <img :src="employee.photo" alt="No image uploaded" id="em_photo">
                            </td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.nid }}</td>
                            <td>{{ employee.email }}</td>
                            <td>{{ employee.phone }}</td>
                            <td>{{ employee.salary }}</td>
                            <td>{{ employee.joining_date | myDate }}</td>
                            <td>
                                <router-link :to="{name: 'edit-employees', params:{id:employee.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                                
                                <a href="javascript:void(0)" v-on:click="destroy(employee.id)" class="btn btn-sm btn-danger">Delete</a>
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
            employees: [],
            searchTerm: ''
        }
    },

    computed:{
        filterSearch(){
            return this.employees.filter(employee => {
                return employee.phone.match(this.searchTerm)
            })
        }
    },

    methods:{
        index: function(){
            axios.get("/api/employee/")
                .then((response)=>{
                    this.employees = response.data
                    // console.log(this.employees)
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

                axios.delete("/api/employee/" + id)
                    .then(()=>{
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        Fire.$emit('AfterCreate');
                    })
                    .catch(()=>{
                        this.$router.push({name: 'employees'})
                    })
                }
            })
        }
    }
}
</script>

<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>