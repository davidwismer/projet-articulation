<template>
  <div class="calendar-date-selector">
    <span @click="selectPrevious">&lt</span>
    <br />
    <span @click="selectCurrent">Aujourd'hui</span>
    <br />
    <span @click="selectNext">></span>
  </div>
</template>

<script>
import dayjs from "dayjs";

export default {
  name: "CalendarModeSelector",

  props: {
    currentDate: {
      type: String,
      required: true
    },

    selectedDate: {
      type: Object,
      required: true
    }
  },

//les fonctions inspirées de days js
  methods: {
    selectPrevious() {
      let newSelectedDate = dayjs(this.selectedDate).subtract(1, "month");
      this.$emit("dateSelected", newSelectedDate);
    },

    selectCurrent() {
      let newSelectedDate = dayjs(this.currentDate);
      this.$emit("dateSelected", newSelectedDate);
    },

    selectNext() {
      let newSelectedDate = dayjs(this.selectedDate).add(1, "month");
      this.$emit("dateSelected", newSelectedDate);
    }
  }
};
</script>



<style scoped>
.calendar-date-selector {
  width:100%;
  display:flex;
  width: 80px;

}

.calendar-date-selector > * {
  cursor: pointer;
  user-select: none;
}
</style>
