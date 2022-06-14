<script>
import CalendarMonth from "./components/CalendarMonth";
import ProchainsRendus from './components/ProchainsRendus.vue';
import FiltresHoraire from './components/FiltresHoraire.vue';
import {ref} from 'vue'

export default {
  name: "App",

  components: {
    CalendarMonth,
    ProchainsRendus,
    FiltresHoraire
  },
  data() {
    return {
      checked: []
    }
  },
  methods: {
    getChecked(checked){
      this.checked = checked
    }
  },
};
</script>

<template>
  <button class="semaine">Semaine</button>
  <button class="month">Mois</button>
  <CalendarMonth :tabChecked="checked"></CalendarMonth>
  <filtres-horaire @getChecked="getChecked"></filtres-horaire>
</template>

<style scoped>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

body {
  font-family: sans-serif;
  font-weight: 100;
  --grey-100: #e4e9f0;
  --grey-200: #cfd7e3;
  --grey-300: #b5c0cd;
  --grey-800: #3e4e63;
  --grid-gap: 1px;
  --day-label-size: 20px;
}

.calendar-month-header {
  display: flex;
  justify-content: space-between;
  background-color: #fff;
  padding: 10px;
}
</style>
