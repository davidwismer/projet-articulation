<script>
import dayjs from "dayjs";
import { ref } from "vue";
import CoursHoraire from './CoursHoraire.vue';
import EventHoraire from './EventHoraire.vue'
import { user } from "../state.js";

//Test qui est connecté
let classeId
const events = ref(tabEvents);
const rendus = ref(tabRendus);
const cours = ref(tabCours);
const modules = ref(tabModules);

export default {
  name: "CalendarMonthDayItem",

  components: {
    CoursHoraire,
    EventHoraire
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
        if (evt.classe_id == classeId && evt.start.split(' ')[0] === this.day.date) coursClasseJour.push(evt)
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
    getModules() {
      //Avoir les modules que la classe suit (lien avec branche du cours)
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
        classeId = user.value.classe_id
      }
    },
    getIsEvents(){
      console.log(this.isEventsChecked)
      return this.isEventsChecked
    },
    getIsCours(){
      console.log(this.isCoursChecked)
      return this.isCoursChecked
    },
    getIsRendus(){
      console.log(this.isRendusChecked)
      return this.isRendusChecked
    },
  }
};
</script>

<template>
  {{ getUserClasseId }}
  <li class="calendar-day" :class="{
    'calendar-day--not-current': !day.isCurrentMonth,
    'calendar-day--today': isToday
  }">
    <span>{{ label }}</span>
    <cours-horaire class="cours-day" :class="{
      'cours-day--not-current': !day.isCurrentMonth
    }" v-for="evt of getCoursClasseJour" :cours="evt" :modules="getModules" v-show="getIsCours"></cours-horaire>
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
  opacity: 50%;
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
