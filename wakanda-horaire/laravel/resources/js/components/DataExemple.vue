<script setup>
import { ref } from 'vue';
const users = ref(usersNoms);
    
    </script>
 
<template>
  <div v-for="user of users" :key="user">
    <h1>{{ user }}</h1>
  </div>
</template>