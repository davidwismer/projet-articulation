
<!-- Ce fichier gère chacune des case pour la vue de l'horaire au mois -->

<script>
import dayjs from "dayjs";
import { ref } from "vue";
import CoursHoraire from './CoursHoraire.vue';
import EventHoraire from './EventHoraire.vue'
import RenduHoraire from './RenduHoraire.vue'
import { user } from "../state.js";

const events = ref(tabEvents);
const rendus = ref(tabRendus);
const cours = ref(tabCours);
const modules = ref(tabModules);
const moduleUser = ref(tabModuleUser);
const classes = ref(tabClasses);

export default {
  name: "CalendarMonthDayItem",

  components: {
    CoursHoraire,
    EventHoraire,
    RenduHoraire
  },

  props: {
    day: {
      type: Object,
      required: true
    },
    //Définit si le jour est dans le mois actuel ou non (Pour les jours apparaissants quand même dans la grille, mais pas du mois en question)
    isCurrentMonth: {
      type: Boolean,
      default: false
    },
    //Définit si la case est celle du jour actuel
    isToday: {
      type: Boolean,
      default: false
    },
    //Si les evenements sont cochés dans filtre
    isEventsChecked: {
      type: Boolean,
      default: false
    },
    //Si les cours sont cochés dans filtre
    isCoursChecked: {
      type: Boolean,
      default: false
    },
    //Si les rendus sont cochés dans filtre
    isRendusChecked: {
      type: Boolean,
      default: false
    },
    //Quelle classe est selectionnée pour l'horaire
    classeSelected: {
      type: Number
    }
  },

  computed: {
    //Jour de la case (Pour l'afficher dans la grille)
    label() {
      return dayjs(this.day.date).format("D");
    },
    //Date de la case
    dateCase() {
      return dayjs(this.day.date).format("YYYY-MM-DD")
    },
    //Retourne les cours qui sont propres à la case (Pour trier un peu)
    getCoursClasseJour() {
      let coursClasseJour = []
      cours.value.forEach(evt => {
        if (evt.classe_id == this.getUserClasseId && evt.start.split(' ')[0] === this.day.date) coursClasseJour.push(evt)
      })
      return coursClasseJour
    },
    //Retourne les events qui sont propres à la case (Pour trier un peu)
    getEventsJour() {
      let eventsJour = []
      const date1 = new Date(this.day.date)
      events.value.forEach(evt => {
        const date2 = new Date(evt.dateDebut)
        const date3 = new Date(evt.dateFin)
        if (date1 >= date2 && date1 <= date3) eventsJour.push(evt)
      })
      return eventsJour
    },
    //Retourne les rendus qui sont propres à la case (Pour trier un peu)
    getRendusJour() {
      let rendusJour = []
      rendus.value.forEach(rendu => {
        if (rendu.date === this.day.date) rendusJour.push(rendu)
      })
      return rendusJour
    },
    //On trie encore plus, en retournant des rendus propres à la case, les rendus propres à la classe selectionnée.
    getRendusClasseJour() {
      let rendusClasseJour = []
      this.getRendusJour.forEach(rendu => {
        let coursId = rendu.cour_id
        cours.value.forEach(cours => {
          if (coursId == cours.id) {
            if (cours.classe_id == this.getUserClasseId) rendusClasseJour.push(rendu)
          }
        })
      })
      return rendusClasseJour
    },
    //Retourne les modules propres à la case et à la classe
    getModulesJour() {
      //Avoir les modules que la classe suit pour ce jour (lien avec branche du cours)
      let modulesCours = []
      const coursClasseJour = this.getCoursClasseJour
      modules.value.forEach(module => {
        coursClasseJour.forEach(evt => {
          if (evt.module_id == module.id) modulesCours.push(module)
        })
      })
      return modulesCours
    },
    //Retourne l'id de la classe de laquelle on affiche l'horaire
    getUserClasseId() {
      let classeId = this.classeSelected
      if (user.value !== null && user.value.role_id == 3) {
        if (this.classeSelected === null) {
          classeId = user.value.classe_id
        }
      }
      return classeId
    },
    getIsEvents() {
      return this.isEventsChecked
    },
    getIsCours() {
      return this.isCoursChecked
    },
    getIsRendus() {
      return this.isRendusChecked
    },
  }
};
</script>

<template>
  <li class="calendar-day" :class="{
    'calendar-day--not-current': !day.isCurrentMonth,
    'calendar-day--today': isToday
  }">
    <span>{{ label }}</span>
    <cours-horaire class="cours-day" :class="{
      'cours-day--not-current': !day.isCurrentMonth
    }" v-for="evt of getCoursClasseJour" :cours="evt" :modules="getModulesJour" :isCurrentMonth="day.isCurrentMonth"
      v-show="getIsCours"></cours-horaire>
    <rendu-horaire class="cours-day" :class="{
      'cours-day--not-current': !day.isCurrentMonth
    }" v-for="evt of getRendusClasseJour" :rendu="evt" :isCurrentMonth="day.isCurrentMonth" v-show="getIsRendus">
    </rendu-horaire>
    <event-horaire class="cours-day" :class="{
      'cours-day--not-current': !day.isCurrentMonth
    }" v-for="evt of getEventsJour" :evenement="evt" :isCurrentMonth="day.isCurrentMonth" v-show="getIsEvents">
    </event-horaire>
  </li>
</template>

<style scoped>
ol,
li {
  padding: 0;
  margin: 0;
  list-style: none;
}

.cours-day--not-current {
  opacity: 75%;
}

.calendar-day {
  position: relative;
  min-height: 100px;
  font-size: 16px;
  border: 1px dashed #999999;
  padding: 5px;
}

.calendar-day>span {
  justify-content: center;
  align-items: center;
  width: var(--day-label-size);
  height: var(--day-label-size);
}

.calendar-day--not-current>span {
  color: #999999;
}

.calendar-day--today {
  padding-top: 4px;
}

.calendar-day--today>span {
  color: #ff0000;
  border-radius: 9999px;
}
</style>
