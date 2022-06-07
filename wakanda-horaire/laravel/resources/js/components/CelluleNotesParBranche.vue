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
</script>
 
<template>
  <div id="divMom" :id="branche.id">
    <toggle-button></toggle-button>
    <table style="width: 100%">
      <tr>
        <th id="titre">{{ branche.dimin }}</th>
        <th>Note 1</th>
        <th>Note 2</th>
        <th>Note 3</th>
        <!-- eventually add note 3 -->
      </tr>
      <tr>
        <td id="titreNotes">Notes :</td>
        <td>4.0</td>
        <td>4.8</td>
        <td>4.4</td>
        <!-- eventually add note 3 -->
        <td>Moyenne : 4.4</td>
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

#divMom {
  width: 80%;
  padding: 15px;
  border-left: 10px solid v-bind("module.couleur");
  border-radius: 25px;
  margin: 25px 25px 50px;
  box-shadow: 0.2em 0em 1em silver;
}

#titre {
  text-transform: uppercase;
  color: v-bind("module.couleur");
  width: 200px;
  text-align: left;
}

#titreNotes {
  width: 200px;
  text-align: left;
}

td {
  font-style: italic;
}
</style>