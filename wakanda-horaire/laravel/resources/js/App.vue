<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";
import menu from "./components/menu.vue";
import grille from "./components/grille.vue";

const users = ref(usersNoms);

</script>

<template>
  <menu></menu>
  <logo></logo>
  <h1>Test</h1>
  <div v-for="user of users" :key="user">
    <h1>{{ user }}</h1>
  </div>
  <div id="grille"></div>
  <grille></grille>
</template>

<style lang="css">
</style> 