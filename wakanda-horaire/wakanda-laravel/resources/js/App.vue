<script setup >
<<<<<<< HEAD
import { Vue, ref, computed, watchEffect, onMounted } from "vue";
import VueMq from 'vue-mq';
import logo from "./components/logo.vue";
=======
import { ref, computed, watchEffect, onMounted } from "vue";
>>>>>>> 4a569596993b74004e370cc7bdbfc6858f86e29f
import DataExemple from "./components/DataExemple.vue";
import sidebar from "./components/sidebar.vue";
import { page } from "./state.js";
import AppHoraire from "./AppHoraire.vue";
import AppNotes from "./AppNotes.vue";
import AppInformations from "./AppInformations.vue";
import AppNotifications from "./AppNotifications.vue";
import AppUser from "./AppUser.vue";
import LoginFormVue from "./components/LoginForm.vue";
// import LogoutFormVue from "./components/LogoutForm.vue";
import { user } from "./state.js";


const loading = ref(true);

onMounted(async () => {
  await axios.get("/sanctum/csrf-cookie");
  const userdata = await axios.get("/isLogged");
  if(userdata.data == ""){
    user.value = null;
  }else{
    user.value =userdata.data;
  } 
  loading.value = false;
});

const routes = {
  "#horaires": {
    label: "Horaires",
    id: "horaires",
    component: AppHoraire,
  },
  "#notes": {
    label: "Notes",
    id: "notes",
    component: AppNotes,
  },
  "#infos": {
    label: "Informations",
    id: "informations",
    component: AppInformations,
  },
  "#notifications": {
    label: "Notifications",
    id: "notifications",
    component: AppNotifications,
  },
  "#user": {
    label: "Mon compte",
    id: "moncompte",
    component: AppUser,
  },

};

const routes2 = {
  "#horaires": {
    label: "Horaires",
    id: "horaires",
    component: AppHoraire,
  },

  "#infos": {
    label: "Informations",
    id: "informations",
    component: AppInformations,
  },

  "#login": {
    label: "Se connecter",
    id: "login",
    component: LoginFormVue,
  },
};

const hash = ref(window.location.hash);

window.addEventListener(
  "hashchange",
  () => (hash.value = window.location.hash)
);

const curHash = computed(() => {
  if (user.value === null) {
    return routes2[hash.value] ? hash.value : Object.keys(routes2)[0];
  } else {
    return routes[hash.value] ? hash.value : Object.keys(routes)[0];
  }
});

const curComponent = computed(() => {
  if (user.value === null) {
    return routes2[curHash.value].component;
  } else {
    return routes[curHash.value].component;
  }
});


// Vue.use(VueMq, {
//   breakpoints: { // default breakpoints - customize this
//     sm: 450,
//     md: 1250,
//     lg: Infinity,
//   }
// })


</script>


<template>
  <div v-if="loading">Chargement en cours</div>
<div v-if="loading == false">
<div v-if="user === null">
    <sidebar :routes="routes2" :curHash="curHash"></sidebar>
  </div>
  <div v-else>
    <sidebar :routes="routes" :curHash="curHash"></sidebar>
  </div>

  <component :is="curComponent" />
</div>
  
</template>

<style lang="css">
body {
  margin-left: 200px; /* width of the sidenav + 20px of margin */
  background-color: #f6f6f6;
}

/* @media screen and (min-width: 300px) {
  body {
    margin-left: 100px;
      background-color: red;
  }
} */

</style> 