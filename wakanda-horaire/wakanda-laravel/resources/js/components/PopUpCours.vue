<script setup>
import { ref } from "vue";
const props = defineProps({
  show: Boolean,
  cours: Object,
  modules: Object,
  couleur: String,
});

let heureDebut =
  props.cours.start.split(" ")[1].split(":")[0] +
  ":" +
  props.cours.start.split(" ")[1].split(":")[1];

let heureFin =
  props.cours.end.split(" ")[1].split(":")[0] +
  ":" +
  props.cours.end.split(" ")[1].split(":")[1];

function getDay(date) {
  let day = date.substring(8, 10);
  return day;
}

function getMonth(date) {
  let month = date.substring(5, 7);
  switch (month) {
    case "01":
      month = "janvier";
      break;
    case "02":
      month = "février";
      break;
    case "03":
      month = "mars";
      break;
    case "04":
      month = "avril";
      break;
    case "05":
      month = "mai";
      break;
    case "06":
      month = "juin";
      break;
    case "07":
      month = "juillet";
      break;
    case "08":
      month = "août";
      break;
    case "09":
      month = "septembre";
      break;
    case "10":
      month = "octobre";
      break;
    case "11":
      month = "novembre";
      break;
    case "12":
      month = "décembre";
      break;
    default:
      break;
  }
  return month;
}

function getDayName(dateFr) {
  let date = new Date(dateFr);
  let day = date.getDay();
  if (day === 0) {
    day = 7;
  }
  let dayName = "";
  switch (day) {
    case 1:
      dayName = "Lundi";
      break;
    case 2:
      dayName = "Mardi";
      break;
    case 3:
      dayName = "Mercredi";
      break;
    case 4:
      dayName = "Jeudi";
      break;
    case 5:
      dayName = "Vendredi";
      break;
    case 6:
      dayName = "Samedi";
      break;
    case 7:
      dayName = "Dimanche";
      break;
  }
  return dayName;
}

function getYear(date) {
  let year = date.substring(0, 4);
  return year;
}

// console.log(props.cours);
// console.log(props.modules);

const branches = ref(tabBranches);
let currentBranche;
branches.value.forEach((branche) => {
  if (branche.id === props.cours.branche_id) {
    currentBranche = branche;
  }
});
</script>

<template>
  <div class="popupBackground">
    <div class="popup">
      <h1>{{ cours.label }} - {{ currentBranche.nom }}</h1>
      <p>
        {{
          getDayName(cours.start) +
          " " +
          getDay(cours.start) +
          " " +
          getMonth(cours.start) +
          " " +
          getYear(cours.start)
        }}
        de {{ heureDebut }} à {{ heureFin }}
      </p>
      <p>Salle : {{ cours.room }}</p>
      <h2>Description</h2>
      <p>{{ cours.description }}</p>
      <h2>Modalités d'examen</h2>
      <p>{{ currentBranche.modalite }}</p>
      <button class="close" @click="$emit('close')">Retour</button>
      <!-- <button class="close">Retour</button> -->
    </div>
  </div>
</template>

<style scoped>
.popup {
  position: fixed;
  top: 20%;
  left: 20%;
  right: 20%;
  width: 60%;
  max-height: 60%;
  background-color: #eae9e9;
  border-radius: 20px;
  border-left: 10px solid v-bind("couleur");
  z-index: 9998;
  padding: 15px 20px 15px 20px;
}

.popupBackground {
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}

button.close {
  position: absolute;
  top: 15px;
  right: 20px;
  background-color: transparent;
  border: 0px;
  color: #444444;
}
</style>