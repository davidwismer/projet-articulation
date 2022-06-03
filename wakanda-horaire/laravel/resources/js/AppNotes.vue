<script setup >
import DataExemple from "./components/DataExemple.vue";
import CelluleNotesParBranche from "./components/CelluleNotesParBranche.vue";
import Vue from "vue";
import { ref } from "vue";

const users = ref(tabUsers);
const branches = ref(tabBranches);
const modules = ref(tabModules);

console.log("NOTES");

let count = 1;

function plusPetit() {
  count--;
  if (count < 1) {
    count = 1;
  }
  console.log(count);
  document.getElementById("numSem").innerHTML = count;
}

function plusGrand() {
  count++;
  if (count > 6) {
    count = 6;
  }
  console.log(count);
  document.getElementById("numSem").innerHTML = count;
}
</script>

<template>
  <h1>
    <button v-on:click="plusPetit()"> &lt; </button>Semèstre <span id="numSem"> {{ count }} </span><button v-on:click="plusGrand()"> &gt; </button>
  </h1>
  <div v-for="module of modules" v-show="module.semestreFormation === count">
    <h1>{{ module.nom }}</h1>
    <div v-for="branche of branches" v-show="branche.module_id === module.id">
      <cellule-notes-par-branche :branche="branche"></cellule-notes-par-branche>
    </div>
    <hr />
  </div>
</template>