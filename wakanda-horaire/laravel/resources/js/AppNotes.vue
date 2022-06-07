<script setup >
import DataExemple from "./components/DataExemple.vue";
import CelluleNotesParBranche from "./components/CelluleNotesParBranche.vue";
import Vue from "vue";
import { ref } from "vue";

const users = ref(tabUsers);
const branches = ref(tabBranches);
const modules = ref(tabModules);

console.log("NOTES");

let count = ref(4);

function plusPetit() {
  count.value--;
  if (count.value < 1) {
    count.value = 1;
  }
  console.log(count.value);
}

function plusGrand() {
  count.value++;
  if (count.value > 6) {
    count.value = 6;
  }
  console.log(count.value);
}
</script>

<template>
  <h1>
    <button v-on:click="plusPetit()" v-show="count != 1">&lt;</button>
    Semèstre {{ count }}
    <button v-on:click="plusGrand()" v-show="count != 6">&gt;</button>
  </h1>
  <div v-for="module of modules" v-show="module.semestreFormation === count">
    <h2>{{ module.nom }}</h2>
    <div v-for="branche of branches" v-show="branche.module_id === module.id">
      <cellule-notes-par-branche :module="module" :branche="branche"></cellule-notes-par-branche>
    </div>
    <hr />
  </div>
</template>

<style scoped>
 h1 {
  text-align: center;
 } 
</style>