<template>
  <ol class="day-of-week">
    <li :class="{
        'heure' : (weekday == 'Heure')
    }" v-for="weekday in weekdays" :key="weekday">{{ weekday }}</li>
  </ol>
</template>

<script>
const WEEKDAYS = ["Heure", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];

export default {
  name: "CalendarWeekdays",

  computed: {
    weekdays() {
      return WEEKDAYS;
    }
  }
};
</script>

<style scoped>
ol,
li {
  padding: 0;
  margin: 0;
  list-style: none;
}
.day-of-week {
  display: grid;
  grid-template-columns: 60px 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  justify-content: center;
}

.day-of-week > * {
  text-align: center;
}

.heure {
    width: 60px;
}

</style>