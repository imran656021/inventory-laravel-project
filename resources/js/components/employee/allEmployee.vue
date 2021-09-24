<template>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="text-primary font-weight-bold text-center ">Employee Management And Employee lists</h1>
        </div>
        <div class="col-4">
            <router-link to="addEmployee" class="btn btn-primary d-block mt-2">Add Employee</router-link>
        </div>   
    </div><br>
    <div class="tableHeader row">
        <div class="col-6">
            <h1 class="text-primary  font-weight-bold">Employees <span class="text-damger">Table</span></h1>
        </div>
        <div class="col-6">
            
            <input class="form-control" type="text"  v-model="searchTerm" placeholder="Search">
           
        </div>
    </div><br>
    <div class="table">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Sallary</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="employee in filterSearch" :key="employee.id">
        <td>{{employee.employee_id}}</td>
        <td>{{employee.name}}</td>
        <td>{{employee.email}}</td>
        <td>{{employee.phone}}</td>
        <td>{{employee.sallary}}</td>
        <td>
            <router-link :to="{name: '/showEmployee', params: {id: employee.id} }" class="btn btn-sm btn-success">show</router-link>
            <router-link :to="{name: '/editeEmployee', params:{id: employee.id} }" class="btn btn-sm btn-info">Edit</router-link>
            <a @click="employeeDelete(employee.id)" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      
    </tbody>
  </table>
    </div>
</div>
    
</template>
<script>
export default {
    mounted(){
       
    },
    
    data(){
        return{
            employees:[],
            searchTerm:'',
            errors:{},
        }
    },
    computed: {
        filterSearch(){
            return this.employees.filter( employee => {
                return employee.phone.match( this.searchTerm )
            })
            
        }
    },
    methods: {
       allEmployees(){
           axios.get('/api/employee')
           .then( ({data}) => (this.employees = data))
           .catch(error => this.errors = error.response.data.errors);
           
       },
       employeeDelete(id){
           axios.delete('/api/employee/'+id)
           .then(()=>{
               this.employees = this.employees.filter(employee =>{
                   return employee.id != id
               })
           })
           .catch(()=>{
               this.router.push('/allEmployee')
           })
       }
      
    },
    created(){
         this.allEmployees();
    }
}
</script>