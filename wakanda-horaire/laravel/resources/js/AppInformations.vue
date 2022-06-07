<script setup>
import EventDetails from './components/EventDetails.vue';
import { ref } from 'vue';

const evenements = ref(eventsTab).value;
console.log(evenements)
</script>

<template>

  <div class='block-tout'>
    <div class="event">
      <h1>Evénements à la HEIG</h1>
      <button class="propose">PROPOSER UN EVENEMENT</button>
      <div class="evenements">
        <event-details v-for="evenement of evenements" :key="evenement" :titre="evenement.titre"
          :description="evenement.description" :lieu="evenement.lieu" :dateDebut="evenement.dateDebut" :dateFin="evenement.dateFin"></event-details>
      </div>
      <a href="" class="suivant">Evénement suivants</a>
    </div>
    <div class="menu">
      <h1>Menus de la semaine</h1>
    </div>
  </div>
</template>

<style scoped>
.block-tout {
  display: flex;
}

.evenements {
  height: 100%;
  display: flex;
  flex-wrap: wrap;
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
}
</style>