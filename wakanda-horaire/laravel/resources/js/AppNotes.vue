<script setup >
import DataExemple from "./components/DataExemple.vue";
import CelluleNotesParBranche from "./components/CelluleNotesParBranche.vue";
import { ref } from "vue";

const branches = ref(userBranches);
const modules = ref(userModules);

console.log("NOTES");
</script>

<template>
  <p>Nous sommes dans NOTES</p>
  <div v-for="module of modules">
    <h1>{{ module.nom }}</h1>
    <div v-for="branche of branches" v-show="branche.module_id === module.id">
      <!--Ici la valeur sera choisie par l'utilisateur. -->
      <cellule-notes-par-branche :branche="branche"></cellule-notes-par-branche>
    </div>
    <hr>
  </div>
</template>