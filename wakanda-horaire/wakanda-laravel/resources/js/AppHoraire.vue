
<!-- C'est le fichier parent pour tout ceux qui gèrent les horaires -->

<script>
import CalendarMonth from "./components/CalendarMonth";
import CalendarWeek from "./components/CalendarWeek.vue"
/* import ProchainsRendus from './components/ProchainsRendus.vue'; */
import FiltresHoraire from './components/FiltresHoraire.vue';
import { ref } from 'vue'

export default {
  name: "App",

  components: {
    CalendarMonth,
    FiltresHoraire,
    CalendarWeek
  },
  data() {
    return {
      choice: [],
      classe: null,
      isShowingMonth: true,
    }
  },

  methods: {
    //Renvoie les cases cochées dans le filtre
    getChecked(choice) {
      this.choice = choice
    },
    //Renvoie la classe selectionnée
    getClasse(classe) {
      this.classe = classe
    },
    //Change la vue à la semaine
    changeToWeek() {
      if(this.isShowingMonth){
        this.isShowingMonth = !this.isShowingMonth
      }
    },
    //Change la vue au mois
    changeToMonth() {
      if(!this.isShowingMonth){
        this.isShowingMonth = !this.isShowingMonth
      }
    }
  },
};
</script>

<template>
  <input :class="{
    'active' : !isShowingMonth,
    'inactive' : isShowingMonth
  }" type="button" class="semaine" value="Semaine" @click="changeToWeek">
  <input :class="{
    'active' : isShowingMonth,
    'inactive' : !isShowingMonth
  }" type="button" class="mois" value="Mois" @click="changeToMonth">
  <CalendarMonth :tabChecked="choice" :classeSelection="classe" v-show="isShowingMonth"></CalendarMonth>
  <CalendarWeek :tabChecked="choice" :classeSelection="classe" v-show="!isShowingMonth"></CalendarWeek>
  <filtres-horaire @getChecked="getChecked" @getClasse="getClasse"></filtres-horaire>
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

.active {
  background-color: black;
  color: white;
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
