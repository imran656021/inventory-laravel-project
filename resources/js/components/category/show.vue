<template>
    <div class="container">
        <div class="row">
        <div class="col-8">
            
        </div>
        <div class="col-4">
            <router-link to="/Category" class="btn btn-primary d-block mt-2">All Category</router-link>
        </div>   
    </div><br>
        <h1 class="text-center font-weight-bold text-danger mt-5">Category Name: <span class="text-primary">{{category.name}}</span> <span>            <router-link :to="{name: '/editeCategory', params:{id: category.id} }" class="btn btn-sm btn-info">Edit</router-link>
</span></h1>
    </div>
</template>
<script>
export default {
    data(){
        return{
            category:{},
        }
    },
    created(){
        let id = this.$route.params.id;
        axios.get('/api/category/'+id)
        .then(({data})=>(this.category = data))
        .catch()
    }
}
</script>