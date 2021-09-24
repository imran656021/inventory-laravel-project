<template>
    <div class="container">
        <h1 class="text-center text-primary font-weight-bold mt-4">Employee Details</h1>
        <router-link class="btn btn-primary float-right" to="/allEmployee">All Employee</router-link>
        <br><br>
        <h2>Name: <span>{{ form.name }}</span> </h2>
        <h2>Email: <span>{{ form.email }}</span> </h2>
        <h2>Phone: <span>{{ form.phone }}</span> </h2>
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
                sallary:'',
                employee_id:'',
            }
        }

        
},
created(){

            let id = this.$route.params.id;
            axios.get('/api/employee/'+id)
            .then(({data}) => (this.form = data) )
            .catch()

        
        }
   
   
   
   
   }
</script>