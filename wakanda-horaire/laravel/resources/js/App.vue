<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";
import menu from "./components/menu.vue";
import grille from "./components/grille.vue";
import DataExemple from "./components/DataExemple.vue";
import sidebar from "./components/sidebar.vue";

const users = ref(usersNoms);
</script>

<template>
  <menu></menu>
  <logo></logo>
  <h1>Test</h1>
  <div v-for="user of users" :key="user">
    <h1 class="userTest">{{ user }}</h1>
  </div>
  <sidebar></sidebar>
  <div id="grille"></div>
  <grille></grille>
  <data-exemple></data-exemple>
  
</template>

<style lang="css">
.userTest {
  margin-left: 15%;
}
</style> 