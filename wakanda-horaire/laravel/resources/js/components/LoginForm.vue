<script>
import { useLocalstorage } from '../composables/localstorage';
import { user } from '../state';



export default {
  data() {
    return {
      form: { email: null, password: null },
      errors: {},
    };
  },


  methods: {
    async handleLogin() {
      
      try {
        await axios.get("/sanctum/csrf-cookie");
        const userdata = await axios.post("/mylogin", this.form); //a faire en global et en mode ref pour que ça change
        // window.location = "/"

        user.value = (userdata.data);
      } catch (error) {
        // this.errors = error.response.data.errors;
        console.log(error);
      }
    },
  },
  
};


</script>



<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form @submit.prevent="handleLogin">
          <input type="email" v-model="form.email" required />
          <span class="text-danger" v-if="errors.email">{{
            errors.email[0]
          }}</span>

          <input type="password" v-model="form.password" required />
          <span class="text-danger" v-if="errors.password">{{
            errors.password[0]
          }}</span>

          <button type="submit">Se connecter</button>
        </form>
      </div>
    </div>
  </div>
</template>



    
<style lang="css" scoped>
</style>