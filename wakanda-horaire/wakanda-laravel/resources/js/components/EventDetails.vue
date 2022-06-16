<script setup>
import { ref, watchEffect } from "vue";
import PopUpEvent from "./PopUpEvent.vue";
const showModal = ref(false);
const props = defineProps([
  "titre",
  "description",
  "lieu",
  "dateDebut",
  "dateFin",
]);
//Description format
const shortDesc = props.description.substr(0, 100);
//Date Debut format
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
let sameDate = false;
if (props.dateDebut.substring(8, 10) === props.dateFin.substring(8, 10)) {
  sameDate = true;
}
</script>

<template>
  <div class="block" width="200px">
    <img
      class="imgEvent"
      src="https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
    />
    <div class="contenu">
      <h2>{{ titre }}</h2>
      <ul class="liste">
        <li>
          <span v-if="!sameDate">Du </span
          ><span v-if="sameDate">Uniquement le </span>{{ getDay(dateDebut) + ' ' + getMonth(dateDebut)}} <span v-if="!sameDate">au {{ getDay(dateFin) + ' ' + getMonth(dateFin)}} </span>
        {{getYear(dateFin)}}
        </li>
        <li>{{ lieu }}</li>
      </ul>
      <p>
        {{ shortDesc }}...
        <button @click="showModal = true" class="lireSuite">
          Lire la suite
        </button>
      </p>
      <pop-up-event
        v-if="showModal"
        :show="showMedal"
        :titre="titre"
        :description="description"
        :lieu="lieu"
        :dateDebut="dateDebut"
        :dateFin="dateFin"
        :annee="annee"
        @close="showModal = false"
      ></pop-up-event>
    </div>
  </div>
</template>

<style scoped>
button {
  background-color: transparent;
  border: 0px;
  margin: 0px;
  padding: 0px;
}
.block {
  background-color: #eae9e9;
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  margin-bottom: 50px;
}
h2 {
  margin-top: 0;
}
.liste {
  list-style-type: "- ";
}
.contenu {
  margin: 20px;
  display: flex;
  flex-direction: column;
  align-items: left;
}
.imgEvent {
  width: 100%;
  height: 150px;
  border-radius: 20px 20px 0px 0px;
}
.lireSuite {
  color: #c83c2b;
}
</style>