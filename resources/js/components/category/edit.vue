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
        <form @submit.prevent="updateCategory">
          <div class="form-label-group">
            <label for="name">Category Name</label>
            <input
              class="form-control"
              type="text"
              v-model="category.name"
              id="name"
              placeholder="Category Name"
            />
          </div>
          <br />
          <div>
            <input
              class="btn btn-primary float-right"
              type="submit"
              value="Update Category"
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
            category:{},

        }
    },
    methods:{
        updateCategory(){
            let id = this.$route.params.id;
            axios.patch('/api/category/'+id, this.category)
            .then(()=>{
                this.$router.push('/category')
            })
            .catch(console.log('error'))
        }
    },

    created(){
        let id = this.$route.params.id;
        axios.get('/api/category/'+id)
        .then(({data}) => (this.category = data))
        .catch(console.log('error something'))
    }
}
</script>