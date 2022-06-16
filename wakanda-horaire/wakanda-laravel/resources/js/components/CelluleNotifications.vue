
<!-- Ce fichier gère l'affichage de la section des notifications -->

<script setup>
import { ref } from "vue";

const props = defineProps(["notification"]);
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

function getYear(date) {
  let year = date.substring(0, 4);
  return year;
}

function showClass(aMotif, aDate) {
  let theClasses = "";
  if (aMotif === 'Changement de salle') {
    theClasses = "couleurSalle";
  }else if (aMotif === 'Mise à jour de rendus') {
    theClasses = "couleurRendu";
  }else if (aMotif === 'Changement horaire') {
    theClasses = "couleurHoraire";
  }

if (new Date(aDate) <=  new Date()) {
    theClasses += " sombre";
  }

  return theClasses;
}

</script>


<template>
  <div>
    <div>
      <div id="divMom" :id="notification.id" :class="showClass(notification.motif, notification.date)">
        <table id="tableNotifications" style="width: 100%">
          <tr class="notif">
            <td class="bold titre" style="width: 50%">
              {{ notification.description }}
            </td>
            <td class="motif">{{ notification.motif }}</td>
            <td class="bold date">
              {{
                getDay(notification.date) +
                " " +
                getMonth(notification.date) +
                " " +
                getYear(notification.date)
              }}
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>







<style scoped>



.sombre{
   opacity: 0.33;
}


tr {
  height: 20px;
}

td {
  font-size: 18px;
}

#divMom {
  width: 90%;
  padding: 15px;
  border-radius: 25px;
  margin: 25px 25px 50px;
  box-shadow: 0.2em 0em 1em silver;
}

.couleurSalle {
  border-left: 10px solid #71a0ba;
}

.couleurHoraire {
  border-left: 10px solid #ebc2bd;
}

.couleurRendu {
  border-left: 10px solid #c83c2b;
}

.notif {
  width: 300px;
  text-align: left;
}

.bold {
  font-weight: bold;
}

.titre {
  width: 55%;
  padding-right: 5%;
}

.modif {
  width: 30%;
  padding-right: 5%;
}

.date {
  width: 15%;
  text-align: right;
  padding-right: 1%;
}
</style>