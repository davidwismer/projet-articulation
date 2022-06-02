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
<<<<<<< HEAD
    <grille></grille>
  </div>

  <div v-show="page === '#notes'">
    <notes></notes>
  </div>
  
=======
    <horaires></horaires>
  </div>

  <div v-show="page === '#notes'">
    <h1>Notes</h1>
    <notes></notes>
  </div>

  <div v-show="page === '#evenements'">
    <h1>Evenements</h1>
  </div>

  <div v-show="page === '#notifications'">
    <h1>Notifications</h1>
  </div>
>>>>>>> 52072d3bf17b6ef259091138f95673cec6f62a69
</template>

<style lang="css">
.userTest {
  margin-left: 15%;
}

body {
  margin-left: 300px; /* Same as the width of the sidenav */
}
</style> 