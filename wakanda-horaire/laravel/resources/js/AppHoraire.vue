<!-- <script setup >
import grille from "./components/grille.vue";
console.log('HORAIRE');
</script>

<template>
  <grille></grille>
  <p>Nous sommes dans HORAIRE</p>
</template> -->

<!-- <script setup>
import {reactive} from 'vue'
import '@fullcalendar/core/vdom' 
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import interactionPlugin from '@fullcalendar/interaction'

const options = reactive ({
    plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
    initialView: 'dayGridMonth'
})

</script>

<template>
<FullCalendar v-bind:options ="options"></FullCalendar>
</template>
    

    

<style>

</style>  -->



<script>
import CalendarMonth from "./components/CalendarMonth";

export default {
  name: "App",

  components: {
    CalendarMonth
  }
};
</script>

<template>
  <div id="app">
    <CalendarMonth/>
  </div>
</template>

<style>
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

ol,
li {
  padding: 0;
  margin: 0;
  list-style: none;
}

.calendar-month-header {
  display: flex;
  justify-content: space-between;
  background-color: #fff;
  padding: 10px;
}
</style>
