<template>
    <div class="container">
    <div class="row">
      <div class="col-8">
        <h1 class="text-primary font-weight-bold text-center">
          Supplier Management And Edit new one
        </h1>
      </div>
      <div class="col-4">
        <router-link to="/suppliers" class="btn btn-primary d-block mt-2"
          >All Supplier</router-link
        >
      </div>
    </div>
    <div class="row">
      <div class="col-10 mx-auto">
        <form @submit.prevent="updateSupplier">
          
          <div class="form-label-group">
            <label for="name">Supplier Name</label>
            <input
              class="form-control"
              type="text"
              v-model="form.name"
              id="name"
              placeholder="Full Name"
            />
          </div>
          <div>
            <label for="email">Supplier email</label>
            <input
              class="form-control"
              type="email"
              v-model="form.email"
              id="email"
              placeholder="Email"
            />
          </div>
          <div>
            <label for="phone">Supplier phone</label>
            <input
              class="form-control"
              type="text"
              v-model="form.phone"
              id="phone"
              placeholder="Valid Phone Number"
            />
          </div>
         
          <div>
            <label for="user_id">User ID</label>
            <input
              class="form-control"
              type="text"
              v-model="form.user_id"
              id="user_id"
              placeholder="Valid Supplier user_id"
            />
          </div>
          <div>
            <label for="shop_name">Shop Name</label>
            <input
              class="form-control"
              type="text"
              v-model="form.shop_name"
              id="shop_name"
              placeholder="Valid Supplier shop_name"
            />
          </div>
          <br />
          <div>
            <input
              class="btn btn-primary float-right"
              type="submit"
              value="update Supplier"
            />
          </div>
        </form>
      </div>
    </div>
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
            }
        }
    },
    methods: {
        updateSupplier(){
             let id = this.$route.params.id;
             axios.patch('/api/supplier/'+id, this.form)
             .then(()=>{
                 this.$router.push({name:'/suppliers'})
             })
             .catch(console.log('error somethings'))
        },
    },
    created(){
        let id = this.$route.params.id;
        axios.get('/api/supplier/'+id)
        .then(({data})=>(this.form = data))
        .catch(console.log('error something'))
    }
}
</script>