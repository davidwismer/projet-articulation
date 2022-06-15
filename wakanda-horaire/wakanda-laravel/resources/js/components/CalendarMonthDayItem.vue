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

    isCurrentMonth: {
      type: Boolean,
      default: false
    },

    isToday: {
      type: Boolean,
      default: false
    },

    isEventsChecked: {
      type: Boolean,
      default: false
    },

    isCoursChecked: {
      type: Boolean,
      default: false
    },

    isRendusChecked: {
      type: Boolean,
      default: false
    },
  },

  computed: {
    label() {
      return dayjs(this.day.date).format("D");
    },
    dateCase() {
      return dayjs(this.day.date).format("YYYY-MM-DD")
    },
    getCoursClasseJour() {
      let coursClasseJour = []
      cours.value.forEach(evt => {
        if (evt.classe_id == this.getUserClasseId && evt.start.split(' ')[0] === this.day.date) coursClasseJour.push(evt)
      })
      return coursClasseJour
    },
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
    getRendusJour() {
      let rendusJour = []
      rendus.value.forEach(rendu => {
        if (rendu.date === this.day.date) rendusJour.push(rendu)
      })
      return rendusJour
    },
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
    getUserClasseId() {
      if (user.value !== null && user.value.role_id == 3) {
        return user.value.classe_id
      }
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
    }" v-for="evt of getCoursClasseJour" :cours="evt" :modules="getModulesJour" :isCurrentMonth="day.isCurrentMonth" v-show="getIsCours"></cours-horaire>
    <rendu-horaire class="cours-day" :class="{
      'cours-day--not-current': !day.isCurrentMonth
    }" v-for="evt of getRendusClasseJour" :rendu="evt" :isCurrentMonth="day.isCurrentMonth" v-show="getIsRendus"></rendu-horaire>
    <event-horaire class="cours-day" :class="{
      'cours-day--not-current': !day.isCurrentMonth
    }" v-for="evt of getEventsJour" :evenement="evt" v-show="getIsEvents"></event-horaire>
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
