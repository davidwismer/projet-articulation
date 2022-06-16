<script setup>

import { ref } from 'vue';

const branches = ref(tabBranches);
    //Composant test pour récupérer les données depuis la vue.blade
    </script>
 
<template>
  <div v-for="branche of branches">
     <h1>{{branche.dimin}}</h1> <!-- diminutif -->
  </div>
</template>