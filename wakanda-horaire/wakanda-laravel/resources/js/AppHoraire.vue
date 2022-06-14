<script>
import CalendarMonth from "./components/CalendarMonth";
import FiltresHoraire from './components/FiltresHoraire.vue';
import {ref} from 'vue'

export default {
  name: "App",

  components: {
    CalendarMonth,
    FiltresHoraire
  },
  data() {
    return {
      choice: []
    }
  },
  methods: {
    getChecked(choice){
      this.choice = choice
    },
  },
};
</script>

<template>
  <input type="button" class="semaine" value="Semaine">
  <input type="button" class="mois" value="Mois">
  <CalendarMonth :tabChecked="choice"></CalendarMonth>
  <filtres-horaire @getChecked="getChecked"></filtres-horaire>
</template>

<style scoped>
.semaine {
  border-radius: 20px 0 0 20px;
  width: 150px;
  margin-right: 2.5px;
  margin-left: 40px;
  margin-top: 20px;
  font-size: 24px;
  font-weight: 600;
}

.mois {
  border-radius: 0 20px 20px 0;
  width: 150px;
  margin-left: 2.5px;
  font-size: 24px;
  font-weight: 600;
}

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
