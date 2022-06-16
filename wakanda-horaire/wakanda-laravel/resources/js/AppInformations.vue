
<!-- C'est le fichier parent pour tout ceux qui gèrent les informations et evenements -->

<script setup>
import EventDetails from "./components/EventDetails.vue";
import MenuDay from "./components/MenuDay.vue";
import LoaderSection from "./components/LoaderSection.vue";
import { ref } from "vue";
import {user} from "./state.js";

const evenements = ref(tabEvents);

const currentWeek = ref(null);

//Récupérer les informations de l'api pour les menus de la cafet
async function init() {
  const url = "https://top-chef-intra-api.blacktree.io/weeks/current";
  const rep = await fetch(url, {
    method: "GET",
    withCredentials: true,
    headers: {
      "x-api-key":
        "xY79sN6FDiN6PXucrsBiQBeWkasTLCEn9hcD@dGBcH2Q22f*zs9LHzsfdshT_JBV.Td_ZRdCqQdm4RNFY8JTE!tLK@.GA!2YLNoo",
      "Content-Type": "application/json",
    },
  });
  currentWeek.value = await rep.json();
}

init();

</script>

<template>
  <div id="mainDiv" v-if="currentWeek">
    <div class="event">
      <h1>Evénements à la HEIG</h1>
      <a v-if="user != null" class="propose" href="mailto:daniela.oberlojer@heig-vd.ch?subject=Proposition d'un nouvel événement HEIG-VD">PROPOSER UN EVENEMENT</a>
      <div class="evenements">
        <event-details
          class="eventDetails"
          v-for="evenement of evenements"
          :key="evenement"
          :titre="evenement.titre"
          :description="evenement.description"
          :lieu="evenement.lieu"
          :dateDebut="evenement.dateDebut"
          :dateFin="evenement.dateFin"
        ></event-details>
      </div>
    </div>
    <div class="menu">
      <h2 href="https://www.w3schools.com">Menus de la semaine</h2>
      <div id="celluleMenu">
        <menu-day class="menuJour"  v-for="day of currentWeek.days" :day="day"></menu-day>
      </div>
    </div>
  </div>
  <!-- CHARGEMENT -->
  <loader-section id="loader" v-else></loader-section>
</template>

<style scoped>
#mainDiv {
  display: flex;
  margin-left: 100px;
  margin-top: 50px;
  margin-bottom: 50px;
  gap: 100px;
}

.evenements {
  height: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.eventDetails {
  width: 45%;
}

h1 {
  display: inline-block;
}

h2 {
  font-size: 1.5em;
  margin-top: 20px;
}

a {
  background-color: #c83c2b;
  color: white;
  border: 0px;
  border-radius: 20px;
  padding: 5px 10px;
  text-decoration: none;
}

.event {
  width: 75%;
  height: 100%;
}

.menu {
  background-color: #eae9e9;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
  border-radius: 20px;
  width: 300px;
  height: 0%;
  float: right;
  position: relative;
  right: 3%;
}

.propose {
  float: right;
  bottom: 20px;
}

#celluleMenu {
  background-color: #444444;
  margin: 5%;
  padding: 6% 5% 0% 5%;
  align-items: center;
  height: 100%;
  border-radius: 10px;
}

#loader {
  position: relative;
  transform: translateY(400%);
  left: 40%;
}
</style>