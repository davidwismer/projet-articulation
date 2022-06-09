<script setup >
import DataExemple from "./components/DataExemple.vue";
import CelluleNotesParBranche from "./components/CelluleNotesParBranche.vue";
import Vue from "vue";
import { ref } from "vue";
import {user} from "./state.js";

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
<table id="tableIntro">
  <tr>
    <th id="titreUser"><h2>Notes de {{user.prenom}} {{user.nom}}</h2></th>
    <th id="buttonSem"><h2>
    <button v-on:click="plusPetit()" v-show="count != 1">&lt;</button>
    Semestre {{ count }}
    <button v-on:click="plusGrand()" v-if="count != 6">&gt;</button>
    <button class="invisible" v-on:click="plusGrand()" v-else>&gt;</button>
  </h2></th>
  </tr>
</table>
  <div v-for="module of modules" v-show="module.semestreFormation === count">
    <h2>{{ module.nom }}</h2>
    <div v-for="branche of branches" v-show="branche.module_id === module.id">
      <cellule-notes-par-branche :module="module" :branche="branche"></cellule-notes-par-branche>
    </div>
    <hr />
  </div>
</template>

<style scoped>
 #tableIntro {
   margin: 3% 0% 3% 0%;
   width: 82%;
 }

 #buttonSem {
    text-align: right;
 }

 button {
  cursor: pointer;
  border: 0px;
  background-color: transparent;
  color : red;
 }

 .invisible {
  visibility: hidden;
 }
</style>