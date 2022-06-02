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

   <div id="grille"></div>
   
  <div v-show="page === '#notes'">
    <notes></notes>
  </div>

  <div v-show="page === '#horaires'">
    <horaires></horaires>
  </div>

  <!-- 
<data-exemple></data-exemple> -->
</template>




<style lang="css">
.userTest {
  margin-left: 15%;
}

body {
  margin-left: 300px; /* Same as the width of the sidenav */
}
</style> 