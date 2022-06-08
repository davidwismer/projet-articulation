<script setup>
import ToggleButton from "./ToggleButton.vue";

import { ref } from "vue";

const props = defineProps({
  branche: {
    type: Object,
    required: true,
  },
  module: {
    type: Object,
    required: true,
  },
});

const toggle = ref(true);
</script>
 
<template>
  <div id="divMom" :id="branche.id">
    <button @click="toggle = !toggle">
      <!-- or viewLess -->
      <img
        v-if="toggle"
        class="viewMoreImg"
        src="./assets/vectorNotesViewMore.svg"
      />
      <img
        v-if="!toggle"
        class="viewMoreImg"
        src="./assets/vectorNotesViewLess.svg"
      />
    </button>
    <table id="tableNotes" style="width: 100%">
      <tr>
        <th class="titreLigne" id="titreBranche">{{ branche.dimin }}</th>
        <th>Note 1</th>
        <th>Note 2</th>
        <th>Note 3</th>
        <!-- eventually add note 3 -->
      </tr>
      <tr>
        <td class="titreLigne" id="titreNotes">Notes :</td>
        <td>4.0</td>
        <td>4.8</td>
        <td>4.4</td>
        <!-- eventually add note -->
        <td>Moyenne : 4.4</td>
      </tr>
      <tr v-if="!toggle">
        <td class="titreLigne">Pondérations :</td>
        <td>10%</td>
        <td>40%</td>
        <td>50%</td>
        <!-- eventually add ponderation -->
        <td>Coefficiant : 50</td>
      </tr>
    </table>
  </div>
</template>

<style scoped>
/* table, th, td {
  border:1px solid black;
} */

tr {
  height: 50px;
}

table {
  text-align: center;
}

#tableNotes {
  margin: -3% 0% 0% 0%;
}

#divMom {
  width: 80%;
  padding: 15px;
  border-left: 10px solid v-bind("module.couleur");
  border-radius: 25px;
  margin: 25px 25px 50px;
  box-shadow: 0.2em 0em 1em silver;
}

.titreLigne {
  width: 200px;
  text-align: left;
}

#titreBranche {
  text-transform: uppercase;
  font-size: 1.5em;
  color: v-bind("module.couleur");
}

td {
  font-style: italic;
}

button {
  cursor: pointer;
  border: 0px;
  background-color: transparent;
  position: relative;
  left: 97%;
  top: 3%;
}
</style>