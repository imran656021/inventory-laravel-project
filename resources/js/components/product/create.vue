<template>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <h1 class="text-primary font-weight-bold text-center">
          Product Management Add new one
        </h1>
      </div>
      <div class="col-4">
        <router-link to="/product" class="btn btn-primary d-block mt-2"
          >All Product</router-link
        >
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-10 mx-auto">
        <form @submit.prevent="storeProduct" enctype="multipart/form-data">
          <div class="row">
            <div class="form-label-group col-6">
            <label for="product_name">Product Name</label>
            <input
              class="form-control"
              type="text"
              v-model="form.product_name"
              id="product_name"
              placeholder="Product Name"
              required
            />
            <small class="text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</small>
          </div>

          <div class="form-label-group col-6">
            <label for="product_code">Product Code</label>
            <input
              class="form-control"
              type="text"
              v-model="form.product_code"
              id="product_code"
              placeholder="Product Code"
              required
            />
            <small class="text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</small>
          </div>
          </div>
          
          <div class="row">
            <div class="form-label-group col-6">
            <label for="category">Category</label>
            <select name="" id="category" class="form-control" v-model="form.category_id">
              <option :value="category.id" v-for="category in categories" :key="category.id">{{category.name}}</option>
              
            </select>
            <small class="text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</small>
          </div>
          <div class="form-label-group col-6">
            <label for="category">Supplier</label>
            <select name="" id="category" class="form-control" v-model="form.supplier_id">
              <option :value="supplier.id" v-for="supplier in suppliers" :key="supplier.id">{{supplier.name}}</option>
              
            </select>
            <small class="text-danger" v-if="errors.supplier_id">{{ errors.supplier_id[0] }}</small>
          </div>
          </div>

          <div class="row">
            <div class="form-label-group col-4">
            <label for="buying_price">Buying Price</label>
            <input
              class="form-control"
              type="number"
              v-model="form.buying_price"
              id="buying_price"
              placeholder="Buying Price"
              required
            />
            <small class="text-danger" v-if="errors.buying_price">{{ errors.buying_price[0] }}</small>
          </div>

          <div class="form-label-group col-4">
            <label for="selling_price">Selling Price</label>
            <input
              class="form-control"
              type="number"
              v-model="form.selling_price"
              id="selling_price"
              placeholder="Selling Price"
              required
            />
            <small class="text-danger" v-if="errors.selling_price">{{ errors.selling_price[0] }}</small>
          </div>

          <div class="form-label-group col-4">
            <label for="root">Root</label>
            <input
              class="form-control"
              type="text"
              v-model="form.root"
              id="root"
              placeholder="Root"
              required
            />
            <small class="text-danger" v-if="errors.root">{{ errors.root[0] }}</small>
          </div>
         </div>
         <div class="row">
            <div class="form-label-group col-4">
            <label for="root">Product Quantity</label>
            <input
              class="form-control"
              type="number"
              v-model="form.product_quantity"
              id="product_quantity"
              placeholder="Product Quantity"
              required
            />
            <small class="text-danger" v-if="errors.product_quantity">{{ errors.product_quantity[0] }}</small>
          </div>
           <div class="form-label-group col-4">
            <label for="selling_date">Selling Date</label>
            <input
              class="form-control"
              type="date"
              v-model="form.selling_date"
              id="selling_date"
              placeholder="Selling Date"
              required
            />
            <small class="text-danger" v-if="errors.selling_date">{{ errors.selling_date[0] }}</small>
          </div>
           <div class="form-label-group col-4">
            <label for="image">Image</label>
            <input
              class="form-control"
              type="file"
              id="image"
              @change="onFileSelect"
              
            />
            <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
          </div>
         </div>
         <br>
          <div class="container row" v-if="form.image">
            <div class="col-8"></div>
            <div class="col-4">
              <img :src="form.image" alt="Image" style="width:50px; height:50px; float:right; border: 1px solid red">
            </div>
          </div>
          

         
          <br />
          <div>
            <input
              class="btn btn-primary float-right"
              type="submit"
              value="Save Product"
            />
          </div>
          <div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        product_name: "",
        product_code: "",
        buying_price: "",
        selling_price: "",
        image: "",
        category_id: "",
        supplier_id: "",
        root: "",
        product_quantity: "",
        selling_date: "",
      },
      
      errors: {},
      categories: {},
      suppliers: {},
    };
  },
  methods: {
    onFileSelect(event){
        let file = event.target.files[0];
        let reader = new FileReader();
        reader.onload = event => {
          this.form.image = event.target.result;
          //console.log(event.target.result);
        }
        reader.readAsDataURL(file);
    },
    storeProduct() {
      
        axios.post("/api/product", this.form)
        .then(() => {
          this.$router.push({ name: "/product" });
          console.log("success");
        })
        
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
  created(){
    axios.get('/api/category')
    .then(({data}) => (this.categories = data))
    .catch(console.log('error categories'));

    axios.get('/api/supplier')
    .then(({data}) => (this.suppliers = data))
    .catch(console.log('error supplier'))
  },
};
</script>
