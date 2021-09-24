<template>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <h1 class="text-primary font-weight-bold text-center">
          Category Management Add new one
        </h1>
      </div>
      <div class="col-4">
        <router-link to="/category" class="btn btn-primary d-block mt-2"
          >All Category</router-link
        >
      </div>
    </div>
    <div class="row">
      <div class="col-10 mx-auto">
        <form @submit.prevent="storeCategory">
          <div class="form-label-group">
            <label for="name">Category Name</label>
            <input
              class="form-control"
              type="text"
              v-model="form.name"
              id="name"
              placeholder="Category Name"
            />
          </div>
          <br />
          <div>
            <input
              class="btn btn-primary float-right"
              type="submit"
              value="Save Category"
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
            }
            
        }
    },
    methods: {
        storeCategory(){
            axios.post('/api/category',this.form)
            .then(()=>{
                this.$router.push({name:'/category'})
            })
            .catch(console.log('error somethings'))
        }
    },
};
</script>