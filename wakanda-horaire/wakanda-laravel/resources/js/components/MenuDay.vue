
<!-- Ce fichier gère l'affichage du menu pour les menus de chaque jour de la semaine -->

<script setup>
import { ref } from "vue";
import MenuDayParMenu from "./MenuDayParMenu.vue";
const toggle = ref(true);

const props = defineProps({
  day: {
    type: Object,
    required: true,
  },
});

//Fonction pour formater la date
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
};

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


</script>

<template>
  <div class="menuJour">
    <button @click="toggle = !toggle">
            <img
        v-if="toggle"
        class="viewMoreImg"
        src="./assets/vectorMenuViewMore.svg"
      />
      <img
        v-if="!toggle"
        class="viewMoreImg"
        src="./assets/vectorMenuViewLess.svg"
      />
      <p class="dayDate">{{getDayName(day.day) + ' ' + getDay(day.day) + ' ' + getMonth(day.day) + ' ' + getYear(day.day)}}</p>
    </button>
  </div>
  <div class="descMenu" v-if="!toggle">
      <menu-day-par-menu v-for="menu of day.menus" :menu="menu"></menu-day-par-menu>
    </div>
</template>

<style scoped>

.dayDate {
    color: white;
}

.viewMoreImg {
  width: 15px;
  height: 15px;
  position: inherit;
  margin: 3px 15px 3px 3px;
  justify-content: right;
}

button {
  display: flex;
   justify-content: space-between;
  cursor: pointer;
  border: 0px;
  background-color: transparent;
}
</style>