<script setup>

import { ref } from 'vue';

const branches = ref(tabBranches);
    
    </script>
 
<template>
  <div v-for="branche of branches">
     <h1>{{branche.dimin}}</h1> <!-- diminutif -->
  </div>
</template>