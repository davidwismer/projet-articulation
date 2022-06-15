<script setup>
import { ref } from "vue";
const props = defineProps({
  show: Boolean,
  rendu: Object,
  coursNom: String,
});

let branches = ref(tabBranches);
let cours = ref(tabCours);

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
      dayName = "lundi";
      break;
    case 2:
      dayName = "mardi";
      break;
    case 3:
      dayName = "mercredi";
      break;
    case 4:
      dayName = "jeudi";
      break;
    case 5:
      dayName = "vendredi";
      break;
    case 6:
      dayName = "samedi";
      break;
    case 7:
      dayName = "dimanche";
      break;
  }
  return dayName;
}

function getYear(date) {
  let year = date.substring(0, 4);
  return year;
}
</script>

<template>
  <div class="popupBackground">
    <div class="popup">
      <h1>{{ coursNom }}</h1>
      <p class="dayDate">
        Remise du travail le
        {{
          getDayName(rendu.date) +
          " " +
          getDay(rendu.date) +
          " " +
          getMonth(rendu.date) +
          " " +
          getYear(rendu.date)
        }}
      </p>
      <h2>Consignes</h2>
      <p><strong>« </strong>{{ rendu.consignes }}<strong> »</strong></p>
      <button @click="$emit('close')">Retour</button>
    </div>
  </div>
</template>

<style scoped>
.popup {
  position: fixed;
  top: 5%;
  left: 20%;
  right: 20%;
  width: 60%;
  max-height: 90%;
  background-color: #ebc2bd;
  border-radius: 20px;
  border-left: 10px solid #e17c70;
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

button {
  position: absolute;
  top: 15px;
  right: 20px;
  background-color: transparent;
  border: 0px;
  color: #444444;
}

h1, h2 {
  margin-bottom: 20px;
}

p {
  /* font-size: 14px; */
  margin-top: -10px;
  line-height: 1.3em;
}
</style>