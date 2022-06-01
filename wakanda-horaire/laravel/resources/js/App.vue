<script setup >
import { ref } from "vue";
import logo from "./components/logo.vue";
import grille from "./components/grille.vue";
import DataExemple from "./components/DataExemple.vue";
import sidebar from "./components/sidebar.vue";
</script>



<template>
  <logo></logo>
  <sidebar></sidebar>
  <div id="grille"></div>
  <grille></grille>
  <data-exemple></data-exemple>
  
</template>


    
<style lang="css">
</style> 