<template>
    <div class="container">
        
        
        <div class="row mt-2">
            <div class="col-8"></div>
            <router-link  to="/suppliers" class="btn btn-primary float-right col-4 d-full">All Supplier</router-link>
        
        </div>
        <h1 class="text-center font-weight-bold text-info mt-5">Profile of <span class="text-primary font-weight-bold">{{form.name}}</span></h1>
        <br><hr>
        <h2>Name: {{form.name}}</h2>
        <h2>Email: {{form.email}}</h2>
        <h2>Phone: {{form.phone}}</h2>
    </div>
</template>
<script>
export default {
    data(){
        return{
            form:{
                name:'',
                email:'',
                phone:'',
                user_id:'',
                shop_name:'',
            },
        }
    },
    created(){
        let id = this.$route.params.id;
        axios.get('/api/supplier/'+id)
        .then(({data}) => (this.form = data) )
        .catch(console.log('error'))
    }
}
</script>