<script setup>
import EventDetails from './components/EventDetails.vue';
import MenuWeek from './components/MenuWeek.vue';
import { ref } from 'vue';

const evenements = ref(tabEvents);

const url = "https://top-chef-intra-api.blacktree.io/weeks/current";
fetch(url, {
  method: "GET",
  withCredentials: true,
  headers: {
    "x-api-key": "xY79sN6FDiN6PXucrsBiQBeWkasTLCEn9hcD@dGBcH2Q22f*zs9LHzsfdshT_JBV.Td_ZRdCqQdm4RNFY8JTE!tLK@.GA!2YLNoo",
    "Content-Type": "application/json"
  }
})
  .then(resp => resp.json())
  .then(function (data) {
    console.log(data);
    const MONDAY = data.monday;
    const FRIDAY = data.friday;
  })
  .catch(function (error) {
    console.log(error);
  });
</script>

<template>

  <div class='block-tout'>
    <div class="event">
      <h1>Evénements à la HEIG</h1>
      <button class="propose">PROPOSER UN EVENEMENT</button>
      <div class="evenements">
        <event-details class="eventDetails" v-for="evenement of evenements" :key="evenement" :titre="evenement.titre"
          :description="evenement.description" :lieu="evenement.lieu" :dateDebut="evenement.dateDebut"
          :dateFin="evenement.dateFin"></event-details>
      </div>
      <a href="" class="affichePlus">Afficher plus</a>
    </div>
    <div class="menu">
      <h1>Menus de la semaine</h1>
      <menu-week></menu-week>
    </div>
  </div>
</template>

<style scoped>
.block-tout {
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

button {
  background-color: #C83C2B;
  color: white;
  border: 0px;
  border-radius: 20px;
  padding: 5px 10px;
}

.event {
  width: 75%;
  height: 100%;
}

.menu {
  background-color: #EAE9E9;
  height: 100%;
  width: 25%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  border-radius: 20px 0 0 20px;
  text-align: center;
}

.propose {
  float: right;
  bottom: 20px;
}

.affichePlus {
  text-align: center;
  display: block;
  color: #C83C2B;
}

* {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>