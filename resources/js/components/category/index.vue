<template>
    <div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="text-primary font-weight-bold text-center ">Category Management And Category lists</h1>
        </div>
        <div class="col-4">
            <router-link to="/addCategory" class="btn btn-primary d-block mt-2">Add Category</router-link>
        </div>   
    </div><br>
    <div class="tableHeader row">
        <div class="col-6">
            <h1 class="text-primary  font-weight-bold">Category <span class="text-damger">Table</span></h1>
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
       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="category in filterSearch" :key="category.id">
        
        <td>{{category.name}}</td>
        
        <td>
            <router-link :to="{name: '/showCategory', params: {id: category.id} }" class="btn btn-sm btn-success">show</router-link>
            <router-link :to="{name: '/editeCategory', params:{id: category.id} }" class="btn btn-sm btn-info">Edit</router-link>
            <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      
    </tbody>
  </table>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return{
            categories:[],
            searchTerm:'',
        }
    },
    methods: {
        deleteCategory(id){
            axios.delete('/api/category/'+id)
            .then(()=>{
                this.categories = this.categories.filter( categorie =>{
                   return categorie.id != id
                })
                })
            .catch()
        }
    },
    computed:{
        filterSearch(){
            return this.categories.filter( categories =>{
                return categories.name.match(this.searchTerm)
            })
        }
    },
    created(){
        axios.get('/api/category')
        .then(({data}) => (this.categories = data))
        .catch('something wrong')
    }
}
</script>