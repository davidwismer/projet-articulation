<script setup>
import { ref } from "vue";
const props = defineProps({
  branche: {
    type: Object,
    required: true,
  },
});
</script>
 
<template>
  <div :id="branche.id">
    <h3>{{ branche.dimin }}</h3>
  </div>
</template>

<style scoped>

</style>