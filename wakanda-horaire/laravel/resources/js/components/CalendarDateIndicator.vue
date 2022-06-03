<template>
  <div class="calendar-date-indicator">{{ selectedMonth }}</div>
</template>

<script>
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
      return this.selectedDate.format("MMMM YYYY");
    },
  },
};
</script>

<style scoped>
.calendar-date-indicator {
  font-size: 24px;
  font-weight: 600;
  color: var(--grey-00);

  display:flex;
}
</style>

