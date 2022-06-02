<script setup >
import { ref, computed } from "vue";
import logo from "./components/logo.vue";
import grille from "./components/grille.vue";
import DataExemple from "./components/DataExemple.vue";
import sidebar from "./components/sidebar.vue";
import { page } from "./state.js";
import AppHoraire from "./AppHoraire.vue";
import AppNotes from "./AppNotes.vue";
import AppInformations from "./AppInformations.vue";
import AppNotifications from "./AppNotifications.vue";
import AppUser from "./AppUser.vue";

const users = ref(usersNoms);

const routes = {
  "#horaires": {
    label: "Horaires",
    component: AppHoraire,
  },
  "#notes": {
    label: "Notes",
    component: AppNotes,
  },
  "#infos": {
    label: "Informations",
    component: AppInformations,
  },
  "#notifications": {
    label: "Notifications",
    component: AppNotifications,
  },
  "#user": {
    label: "Mon compte",
    component: AppUser,
  },
};

const hash = ref(window.location.hash);

window.addEventListener(
  "hashchange",
  () => (hash.value = window.location.hash)
);

const curHash = computed(() =>
  routes[hash.value] ? hash.value : Object.keys(routes)[0]
);
const curComponent = computed(() => routes[curHash.value].component);
</script>

<template>
     <logo></logo>

  <sidebar :routes="routes" :curHash="curHash"></sidebar>
 
  <component :is="curComponent" />
</template>

<style lang="css">
body {
  margin-left: 200px; /*  Same as the width of the sidenav */
  background-color: #f6f6f6;
}
</style> 