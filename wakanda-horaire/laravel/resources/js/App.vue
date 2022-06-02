<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";
import grille from "./components/grille.vue";
import DataExemple from "./components/DataExemple.vue";
import sidebar from "./components/sidebar.vue";
import { page } from "./state.js";
import notes from "./components/notes.vue";

const users = ref(usersNoms);
</script>

<template>

  <sidebar></sidebar>
  <logo></logo>

  <div v-show="page === '#horaires'">
    <h1>Horaires</h1>
    <grille></grille>
  </div>

  <div v-show="page === '#notes'">
    <notes></notes>
  </div>
  
</template>




<style lang="css">
.userTest {
  margin-left: 15%;
}

body {
  margin-left: 300px; /* Same as the width of the sidenav */
}
</style> 