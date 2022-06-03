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
    <h1>{{ branche.dimin }}</h1>
  </div>
</template>