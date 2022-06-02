<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";
import grille from "./components/grille.vue";
import DataExemple from "./components/DataExemple.vue";
import sidebar from "./components/sidebar.vue";
import { page } from "./state.js";
import horaires from "./components/horaires.vue";
import notes from "./components/notes.vue";

const users = ref(usersNoms);

</script>

<template>
  <sidebar></sidebar>
  <logo></logo>

  <div v-show="page === '#horaires'">
    <h1>Horaires</h1>
    <horaires></horaires>
  </div>

  <div v-show="page === '#notes'">
    <h1>Notes</h1>
    <notes></notes>
  </div>

  <div v-show="page === '#infos'">
    <h1>informations</h1>
  </div>

  <div v-show="page === '#notifications'">
    <h1>Notifications</h1>
  </div>

    <div v-show="page === '#user'">
    <h1>Mon compte</h1>
  </div>
</template>

<style lang="css">

body {
  margin-left: 200px; /* Same as the width of the sidenav */
}
</style> 