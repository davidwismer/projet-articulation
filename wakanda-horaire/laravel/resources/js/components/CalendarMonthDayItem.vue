<script>
import dayjs from "dayjs";
import { ref } from "vue";
import CoursHoraire from './CoursHoraire.vue';

const groups = ref(tabGroups);
const cours = ref(tabCours);
const modules = ref(tabModules);
//Avoir la bonne classe selectionnée
let groupId
let groupAnneeDeb
groups.value.forEach(evt => {
  if (evt.id == 3) groupId = evt.id, groupAnneeDeb = evt.anneeDebut
})
console.log()
export default {
  name: "CalendarMonthDayItem",

  components: {
    CoursHoraire
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
    }
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
        if (evt.group_id == groupId && evt.start.split(' ')[0] === this.day.date && this.day.isCurrentMonth) coursClasseJour.push(evt)
      })
      return coursClasseJour
    },
    getModules() {
      //Avoir les modules que la classe suit (lien avec branche du cours)
      let modulesCours = []
      const coursClasseJour = this.getCoursClasseJour
      modules.value.forEach(module => {
        coursClasseJour.forEach(evt => {
          if(evt.module_id == module.id) modulesCours.push(module)
        })
      })
      return modulesCours
    }
  }
};
</script>

<template>
  <li class="calendar-day" :class="{
    'calendar-day--not-current': !day.isCurrentMonth,
    'calendar-day--today': isToday
  }">
    <span>{{ label }}</span>
    <cours-horaire v-for="evt of getCoursClasseJour" :cours="evt" :modules="getModules"></cours-horaire>
  </li>
</template>

<style scoped>
ol,
li {
  padding: 0;
  margin: 0;
  list-style: none;
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
  color: #fff;
  border-radius: 9999px;
  background-color: #ff0000;
}
</style>
