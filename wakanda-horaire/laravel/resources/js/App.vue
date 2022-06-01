<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";

const users = ref(usersNoms)


</script>

<template>
  <logo></logo>

    <div v-for="user of usersNoms">
    <p> {{user}}</p>
  </div>

</template>
    

    
<style lang="css">
</style> 