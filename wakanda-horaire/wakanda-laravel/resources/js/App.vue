<script setup >
import { Vue, ref, computed, watchEffect, onMounted } from "vue";
import logo from "./components/logo.vue";
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
  if (userdata.data == "") {
    user.value = null;
  } else {
    user.value = userdata.data;
  }
  loading.value = false;
});

const routes = {
  "#horaires": {
    label: "Horaires",
    id: "horaires",
    component: AppHoraire,
  },
  "#notifications": {
    label: "Notifications",
    id: "notifications",
    component: AppNotifications,
  },
  "#notes": {
    label: "Notes",
    id: "notes",
    component: AppNotes,
  },
  "#infos": {
    label: "Événements Informations",
    id: "informations",
    component: AppInformations,
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
  font-family: 'Inter', sans-serif;
}
</style> 