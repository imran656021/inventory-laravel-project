<template>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="text-primary font-weight-bold text-center ">Supplier Management And Supplier lists</h1>
        </div>
        <div class="col-4">
            <router-link to="addSupplier" class="btn btn-primary d-block mt-2">Add Supplier</router-link>
        </div>   
    </div><br>
    <div class="tableHeader row">
        <div class="col-6">
            <h1 class="text-primary  font-weight-bold">Supplier <span class="text-damger">Table</span></h1>
        </div>
        <div class="col-6">
            
            <input class="form-control" type="text"  v-model="searchTerm" placeholder="Search">
           
        </div>
    </div><br>
    <div class="table">
        <table class="table table-bordered">
    <thead>
      <tr>
        
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Shop Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="supplier in filterSearch" :key="supplier.id">
        
        <td>{{supplier.name}}</td>
        <td>{{supplier.email}}</td>
        <td>{{supplier.phone}}</td>
        <td>{{supplier.shop_name}}</td>
        <td>
            <router-link :to="{name: '/showSuppier', params: {id: supplier.id} }" class="btn btn-sm btn-success">show</router-link>
            <router-link :to="{name: '/editeSupplier', params:{id: supplier.id} }" class="btn btn-sm btn-info">Edit</router-link>
            <a @click="supplierDelete(supplier.id)" class="btn btn-sm btn-danger">Delete</a>
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
            suppliers:[],
            searchTerm:'',
            errors:{},
        }
    },
    computed: {
        filterSearch(){
            return this.suppliers.filter( suppliers => {
                return suppliers.phone.match( this.searchTerm )
            })
            
        }
    },
    methods: {
       allsupplier(){
           axios.get('/api/supplier')
           .then( ({data}) => (this.suppliers = data))
           .catch(error => this.errors = error.response.data.errors);
           
       },
       supplierDelete(id){
           axios.delete('/api/supplier/'+id)
           .then(()=>{
               this.suppliers = this.suppliers.filter(supplier =>{
                   return supplier.id != id
               })
           })
           .catch(()=>{
               this.router.push('/suppliers')
           })
       }
      
    },
    created(){
         this.allsupplier();
    }
}
</script>