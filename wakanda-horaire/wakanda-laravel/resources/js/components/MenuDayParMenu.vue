<script setup>
import { ref } from "vue";
const props = defineProps({
  menu: {
    type: Object,
    required: true,
  },
});

//Afficher les données du menu
</script>
<template>
<div class="divMenu" v-if="menu.starter">
  <h1>Menu</h1>
  <strong v-if="menu.starter">Entrée</strong>
  <p v-if="menu.starter">{{ menu.starter }}</p>
  <strong v-if="menu.mainCourse != null">Plat</strong>
  <p v-if="menu.mainCourse" v-for="aliment of menu.mainCourse">{{ aliment }}</p>
  <strong v-if="menu.dessert">Dessert</strong>
  <p v-if="menu.dessert">{{ menu.dessert }}</p>
  <p class="containsPork" v-if="menu.containsPork">Ce menu contient du porc</p>
</div>
</template>
<style scoped>

.divMenu {
  margin: 0 0 10px 0;
  width: 100%;
  text-align: center;
  padding: 8px 8px 8px 8px;
  border-radius: 10px;
  background-color: #f5f5f5;
}

h1 {
    text-align: left;
    font-size: 1.1em;
    font-weight: bold;
}

.containsPork {
  color: red;
}
</style>