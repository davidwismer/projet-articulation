<template>
  <table class="calendar-date-indicator">
    <th class="previous" @click="selectPrevious">&lt</th>
    <th class="month">{{selectedMonth}}</th>
    <th class="next" @click="selectNext">></th>
  </table>
</template>

<script>
import dayjs from "dayjs";

export default {
  //normalement il y a le model-value
  props: {
    selectedDate: {
      type: Object,
      required: true,
    },
  },

  //Donnée réactive, normalement il y a le get et set et le emit...
  computed: {
    //selectedMonth est une fonction mais pas besoin de mettre les parenthèses dans la variable double
    selectedMonth() {
      const date = new Date(this.selectedDate);
      const month = ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin",
    "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"][date.getMonth()];
      return month + ' ' + date.getFullYear();
    },
  },

  methods: {
    selectPrevious() {
      let newSelectedDate = dayjs(this.selectedDate).subtract(1, "month");
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
.calendar-date-indicator {
  font-size: 24px;
  font-weight: 600;
  color: var(--grey-00);

  display:flex;
  justify-content: right;

  margin-bottom: 60px;
}

.previous {
  cursor: pointer;
  display: flex;
  justify-content: right;
  color: #888888;
}

.month {
  display: flex;
  justify-content: center;
  width: 200px;
}

.next {
  cursor: pointer;
  display: flex;
  justify-content: left;
  color: #888888;
}
</style>

