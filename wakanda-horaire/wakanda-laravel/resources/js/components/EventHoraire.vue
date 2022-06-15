<script setup>
import { ref } from "vue";
const props = defineProps(["evenement"]);
</script>

<template>
  <div class="evenement">
    <span class="nom">{{ props.evenement.titre }}</span>
  </div>
</template>

<style scoped>
.evenement {
  height: 18px;
  line-height: 18px;
  border-radius: 20px;
  margin-top: 5px;
  padding-left: 5px;
  padding-right: 5px;
  background-color: #c9bbe7;
  font-size: 10px;
  border-left: 4px solid #6a24ff;
}
</style>