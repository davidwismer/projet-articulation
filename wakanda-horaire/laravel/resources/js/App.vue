<script setup >
import { ref, computed, watchEffect } from "vue";
import logo from "./components/logo.vue";
import grille from "./components/grille.vue";
import DataExemple from "./components/DataExemple.vue";
import sidebar from "./components/sidebar.vue";
import { page } from "./state.js";
import CelluleNotesParBranche from "./components/CelluleNotesParBranche.vue";
import AppHoraire from "./AppHoraire.vue";
import AppNotes from "./AppNotes.vue";
import AppInformations from "./AppInformations.vue";
import AppNotifications from "./AppNotifications.vue";
import AppUser from "./AppUser.vue";
import LoginFormVue from "./components/LoginForm.vue";
import LogoutFormVue from "./components/LogoutForm.vue";
import { user } from "./state.js";

watchEffect(() => console.log(user.value));


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

  "#logout": {
    label: "Se déconnecter",
    id: "login",
    component: LogoutFormVue,
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


let curHash = null;
let curComponent = null;

if (user.value === null) {
  curHash = computed(() =>
  routes2[hash.value] ? hash.value : Object.keys(routes2)[0]
);

curComponent = computed(() => routes2[curHash.value].component);

} else {
  curHash = computed(() =>
  routes[hash.value] ? hash.value : Object.keys(routes)[0]
);

curComponent = computed(() => routes[curHash.value].component);
}





</script>


<template>
  <logo></logo>

  <div v-if="user.role_id === 3">
    <sidebar :routes="routes" :curHash="curHash"></sidebar>
  </div>
  <div v-else>
    <sidebar :routes="routes2" :curHash="curHash"></sidebar>
  </div>

  <component :is="curComponent" />
</template>

<style lang="css">
body {
  margin-left: 200px; /*  Same as the width of the sidenav */
  background-color: #f6f6f6;
}
</style> 