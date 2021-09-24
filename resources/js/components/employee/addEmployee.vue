<template>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <h1 class="text-primary font-weight-bold text-center">
          Employee Management Add new one
        </h1>
      </div>
      <div class="col-4">
        <router-link to="allEmployee" class="btn btn-primary d-block mt-2"
          >All Employee</router-link
        >
      </div>
    </div>
    <div class="row">
      <div class="col-10 mx-auto">
        <form @submit.prevent="storeEmployee">
          
          <div class="form-label-group">
            <label for="name">Employee Name</label>
            <input
              class="form-control"
              type="text"
              v-model="form.name"
              id="name"
              placeholder="Full Name"
            />
          </div>
          <div>
            <label for="email">Employee email</label>
            <input
              class="form-control"
              type="email"
              v-model="form.email"
              id="email"
              placeholder="Email"
            />
          </div>
          <div>
            <label for="phone">Employee phone</label>
            <input
              class="form-control"
              type="text"
              v-model="form.phone"
              id="phone"
              placeholder="Valid Phone Number"
            />
          </div>
          <div>
            <label for="salary">Employee salary</label>
            <input
              class="form-control"
              type="text"
              v-model="form.sallary"
              id="salary"
              placeholder="Current Sallary"
            />
          </div>
          <div>
            <label for="employee_id">Employee id</label>
            <input
              class="form-control"
              type="text"
              v-model="form.id"
              id="employee_id"
              placeholder="Valid Employee Id"
            />
          </div>
          <br />
          <div>
            <input
              class="btn btn-primary float-right"
              type="submit"
              value="Save Employee"
            />
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
        name: "",
        email: "",
        phone: "",
        sallary: "",
        id: "",
      },
      errors:{},
    };
  },
  methods: {
    storeEmployee() {
        axios.post('/api/employee', this.form)
        .then(()=>{
          this.$router.push({ name:'/allEmployee' })
          console.log('success');
        })
        .catch(error => this.errors = error.response.data.errors);
    },
  },
};
</script>
