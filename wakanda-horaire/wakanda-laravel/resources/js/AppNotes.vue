
<!-- C'est le fichier parent pour tout ceux qui gèrent les notes -->

<script setup >
import CelluleModule from "./components/CelluleModule.vue";
import Vue from "vue";
import { ref } from "vue";
import { user } from "./state.js";

const branches = ref(tabBranches);
const modules = ref(tabModules);
const moduleUser = ref(tabModuleUser);
const notes = ref(tabNotes);


//Obtenir les modules suivis par l'utilisateur
let modulesSuivis = []
modules.value.forEach(module => {
  moduleUser.value.forEach(connect => {
    if(connect.user_id == user.value.id && connect.module_id == module.id) modulesSuivis.push(module)
  })
})

let count = ref(4);

//définition des fonction plus petit ou plus grand 
function plusPetit() {
  count.value--;
  if (count.value < 1) {
    count.value = 1;
  }
}

function plusGrand() {
  count.value++;
  if (count.value > 6) {
    count.value = 6;
  }
}
</script>

<template>
  <table id="tableIntro">
    <tr>
      <th id="titreUser">
        <h2>Notes de {{ user.prenom }} {{ user.nom }}</h2>
      </th>
      <th id="buttonSem">
        <h2>
          <button class="previous" v-on:click="plusPetit()" v-show="count != 1">&lt;</button>
          Semestre {{ count }}
          <button class="next" v-on:click="plusGrand()" v-if="count != 6">&gt;</button>
          <button class="next invisible" v-on:click="plusGrand()" v-else>
            &gt;
          </button>
        </h2>
      </th>
    </tr>
  </table>
  <cellule-module v-for="module of modulesSuivis" v-show="module.semestreFormation === count" :module="module"></cellule-module>
</template>

<style scoped>
#tableIntro {
  margin: 3% 3% 3% 2%;
  width: 90%;
}

#buttonSem {
  text-align: right;
}

button {
  cursor: pointer;
  border: 0px;
  background-color: transparent;
  color: #888888;
}

.invisible {
  visibility: hidden;
}

.next {
  margin-left: 10px;
}

.previous {
  margin-right: 10px;
}
</style>