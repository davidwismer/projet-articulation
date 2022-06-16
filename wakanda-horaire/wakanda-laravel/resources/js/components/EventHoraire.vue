<script setup>
import { ref } from "vue";
<<<<<<< HEAD
const props = defineProps(["evenement"]);

//Affichage event
=======
import PopUpEvent from "./PopUpEvent.vue";

const props = defineProps({
  evenement: {
    type: Object
  },
  isCurrentMonth: {
    type: Boolean,
    default: false
  }
});
const showModal = ref(false);
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
>>>>>>> 9c09dd9c6f4b91a6d73fc85114edf9352130a82a
</script>

<template>
  <div class="evenement">
    <button @click="showModal = true" :disabled="!isCurrentMonth">
      <span class="nom">{{ evenement.titre }}</span>
    </button>
    <pop-up-event
      v-if="showModal"
      :show="showMedal"
      :titre="evenement.titre"
      :description="evenement.description"
      :lieu="evenement.lieu"
      :dateDebut="evenement.dateDebut"
      :dateFin="evenement.dateFin"
      :annee="evenement.annee"
      @close="showModal = false"
    ></pop-up-event>
  </div>
</template>

<style scoped>
button {
  height: 18px;
  width: 100%;
  border-radius: 20px;
  padding-left: 5px;
  padding-right: 5px;
  background-color: #c9bbe7;
  font-size: 10px;
  text-align: left;
  border: 0px;
  border-left: 4px solid #6a24ff;
}
</style>