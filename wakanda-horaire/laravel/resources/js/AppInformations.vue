<script setup>
import EventDetails from './components/EventDetails.vue';
import { ref } from 'vue';

const evenements = ref(eventsTab).value;
console.log(evenements);
</script>

<template>
  <h1>Evénements à la HEIG</h1>
  <div class='block-tout'>
    <div class="event">
      <event-details v-for="evenement of evenements" :key="evenements" :titre="evenement.titre" :description="evenement.description"></event-details>
    </div>
    <div class="menu">
    </div>
  </div>
</template>

<style scoped>
.block-tout {
  display: flex;
}

.event {
  height: 100%;
  width: 50%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.menu {
  background-color: grey;
  height: 100%;
  width: 50%;
}
</style>