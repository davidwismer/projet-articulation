<script setup>
import { useLocalstorage } from "../composables/localstorage";
import { user } from "../state";
import { ref, reactive } from "vue";

let messageError = ref(false);
const form = reactive({ email: null, password: null });
const errors = reactive({});
async function handleLogin() {  
  await axios.get("/sanctum/csrf-cookie");
  const userdata = await axios.post("/mylogin", form);
  if (userdata.data === "error") {
    messageError.value = true;
    form.email = null;
    form.password = null;
  } else {
    window.location = "/";
  }    
}

//Formulaire de login
</script>

<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8" id="divMom">
        <h1 id="title">Se connecter</h1>
        <p>Veuillez utiliser votre adresse HEIG-VD</p>
        <form @submit.prevent="handleLogin">
          <div id="email" class="element">
            <svg
              width="20"
              height="16"
              viewBox="0 0 20 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M18 0H2C0.9 0 0.00999999 0.9 0.00999999 2L0 14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM18 4L10 9L2 4V2L10 7L18 2V4Z"
                fill="#9C9898"
              />
            </svg>

            <input
              id="inputEmail"
              type="email"
              v-model="form.email"
              placeholder="E-mail"
              required
            />
            <span class="text-danger" v-if="errors.email">{{
              errors.email[0]
            }}</span>
          </div>
          <div id="password" class="element">
            <svg
              width="20"
              height="24"
              viewBox="0 0 18 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M15.75 8H14.625V5.71429C14.625 2.56 12.105 0 9 0C5.895 0 3.375 2.56 3.375 5.71429V8H2.25C1.0125 8 0 9.02857 0 10.2857V21.7143C0 22.9714 1.0125 24 2.25 24H15.75C16.9875 24 18 22.9714 18 21.7143V10.2857C18 9.02857 16.9875 8 15.75 8ZM9 18.2857C7.7625 18.2857 6.75 17.2571 6.75 16C6.75 14.7429 7.7625 13.7143 9 13.7143C10.2375 13.7143 11.25 14.7429 11.25 16C11.25 17.2571 10.2375 18.2857 9 18.2857ZM12.4875 8H5.5125V5.71429C5.5125 3.76 7.07625 2.17143 9 2.17143C10.9237 2.17143 12.4875 3.76 12.4875 5.71429V8Z"
                fill="#9C9898"
              />
            </svg>

            <input
              id="inputPassword"
              type="password"
              v-model="form.password"
              placeholder="Mot de passe"
              required
            />
            <span class="text-danger" v-if="errors.password">{{
              errors.password[0]
            }}</span>
          </div>
          <p class="messageError" v-if="messageError">Email ou mot de passe incorrect</p>
          <div id="button" class="element">
            <button type="submit">Se connecter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
    
<style lang="css" scoped>
#divMom {
  text-align: center;
  width: 60%;
  padding: 15px;
  border-radius: 25px;
  margin: 25px 25px 50px;
  box-shadow: 0.2em 0em 1em silver;
  position: relative;
  margin: 10% 0% 10% 0%;
}

#title {
  font-size: 2em;
  font-weight: bold;
  margin: 5%;
}

svg {
  margin-right: 20px;
}

button {
  box-shadow: 0.2em 0em 1em silver;
  cursor: pointer;
  border-radius: 25px;
  border: 0px;
  background-color: #444444;
  color: white;
  position: relative;
  left: 0%;
  bottom: 3%;
  padding: 1% 2% 1% 2%;
}

input {
  border-radius: 25px;
  border: 1px solid #444444;
  padding: 1% 2% 1% 2%;
  background-color: transparent;
  width: 50%;
}

.element {
  margin: 5%;
}

.messageError {
  color: red;
}
</style>