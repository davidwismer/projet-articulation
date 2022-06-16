<script setup>
import { ref } from "vue";
const props = defineProps({
  show: Boolean,
  titre: String,
  description: String,
  lieu: String,
  dateDebut: String,
  dateFin: String,
  annee: String,
});

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
  <div class="popupBackground">
    <div class="popup">
      <img
        class="imgEvent"
        src="https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
      />
      <div class="zoneTxt">
        <h1 class="titreEvent">{{ titre }}</h1>
        <h2 class="dateEvent">
          <span v-if="sameDate">Uniquement le </span
          ><span v-if="!sameDate">Du </span>{{ getDay(dateDebut) }}
          {{ getMonth(dateDebut) }} <span v-if="sameDate">{{ getYear(dateDebut) }}</span>
          <span v-if="!sameDate"> au {{ getDay(dateFin) }} {{getMonth(dateFin)}} {{ getYear(dateFin) }}</span>
        </h2>
        <h2 class="lieuEvent">{{ lieu }}</h2>
        <p class="descriptionEvent">{{ description }}</p>
      </div>
      <button class="close" @click="$emit('close')">Retour</button>
      <a href="https://forms.gle/v48GEVC11ftEt9od9" target=”_blank” class="inscriptionButton">S'inscrire</a>
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
  background-color: #eae9e9;
  border-radius: 20px;
  border-left: 10px solid v-bind("couleur");
  z-index: 9998;
  padding: 0px 0px 15px 0px;
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

.zoneTxt {
  padding: 30px;
}

button.close {
  position: absolute;
  top: 15px;
  right: 20px;
  background-color: white;
  border-radius: 50px;
  border: 0px;
  padding: 5px 10px 5px 10px;
  color: #444444;
}

button.absence {
  position: relative;
  margin-left: 50%;
  width: 50%;
  border-radius: 25px;
  cursor: pointer;
  background-color: transparent;
  color: #e17c70;
  border: 2px solid #e17c70;
}

h1 {
  margin-bottom: 20px;
  font-size: 2rem;
}

h2 {
  font-size: 1rem;
}

.lieuEvent, .descriptionEvent {
  margin-bottom: 30px;
}

p {
  /* font-size: 14px; */
  margin-top: -10px;
  line-height: 1.3em;
}

.imgEvent {
  width: 100%;
  height: 10%;
  border-radius: 20px 20px 0px 0px;
}

.inscriptionButton {
  position: absolute;
  bottom: 0px;
  left: 0px;
  right: 0px;
  margin: 15px 0px 0px 0px;
  width: 100%;
  border-radius: 0px 0px 20px 20px;
  background-color: #e17c70;
  color: white;
  font-size: 1.2rem;
  padding: 10px;
  text-align: center;
  text-decoration: none;
}
</style>