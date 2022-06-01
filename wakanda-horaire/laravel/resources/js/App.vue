<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";

const users = ref(usersNoms)

</script>



<template>
  <logo></logo>
<h1>Test</h1>
    <div v-for="user of users">
    <h1> {{user}} </h1>
  </div>

</template>
    

    
<style lang="css">
</style> 