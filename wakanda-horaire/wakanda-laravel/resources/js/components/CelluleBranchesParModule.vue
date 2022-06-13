<script setup>
import { ref } from "vue"
const props = defineProps(['branche', 'module'])
const notes = ref(tabNotes)
//Notes concernees par les branches
let notesConcernees = []
notes.value.forEach(note => {
    if (note.branche_id == props.branche.id) notesConcernees.push(note)
})

const toggle = ref(true);

function toPercent(number) {
  let countNotes = 0;
  notes.value.forEach(note => {
    if (note.branche_id === props.branche.id) {
      countNotes++;
    }
  });
  return ((number * 100)/countNotes).toFixed(2);
}

function average(brancheId) {
  let sum = 0;
  let countNotes = 0;
  notes.value.forEach(note => {
    if (note.branche_id === brancheId) {
      sum += note.valeur * note.coefficient;
      countNotes++;
    }
  });
  return (sum/countNotes).toFixed(1);
}
</script>

<template>
    <div>
        <div id="divMom" :id="branche.id">
            <button @click="toggle = !toggle">
                <!-- or viewLess -->
                <img v-if="toggle" class="viewMoreImg" src="./assets/vectorNotesViewMore.svg" />
                <img v-if="!toggle" class="viewMoreImg" src="./assets/vectorNotesViewLess.svg" />
            </button>
            <table id="tableNotes" style="width: 100%">
                <tr>
                    <th class="titreLigne" id="titreBranche">{{ branche.dimin }}</th>
                    <th v-for="note of notesConcernees" v-show="note.branche_id === branche.id && note.isExam === 0">Note</th>
                    <th v-for="note of notesConcernees" v-show="note.branche_id === branche.id && note.isExam != 0">Examen</th>
                    <!-- eventually add note 3 -->
                </tr>
                <tr>
                    <td class="titreLigne" id="titreNotes">Notes :</td>
                    <th v-for="note of notesConcernees" v-show="note.branche_id === branche.id">{{ note.valeur }}</th>
                    <td>{{ average(branche.id) }}</td>
                </tr>
                <tr v-if="!toggle">
                    <td class="titreLigne">Pondérations :</td>
                    <td v-for="note of notesConcernees" v-show="note.branche_id === branche.id">{{ toPercent(note.coefficient) }}%
                    </td>
                    <!-- eventually add ponderation -->
                    <td>Coefficiant : {{ branche.coefficient }}</td>
                </tr>
            </table>
        </div>
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
}

/* table, th, td {
  border: 1px solid;
} */

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