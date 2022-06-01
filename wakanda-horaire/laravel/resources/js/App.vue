<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";
import menu from "./components/menu.vue";

const users = ref(usersNoms);
</script>

<template>
  <menu></menu>
  <logo></logo>
  <h1>Test</h1>
  <div v-for="user of users" :key="user">
    <h1>{{ user }}</h1>
  </div>
</template>

    
<style lang="css">
</style> 