<script setup>
import { ref } from "vue";
// const props = defineProps(["rendu"]);
const props = defineProps({
  show: Boolean,
});
console.log(props.showModal);
</script>

<template>
  <div class="popupBackground">
    <div class="popup">
      <button @click="$emit('close')">close</button>
    </div>
  </div>
</template>

<style scoped>
.popup {
  position: fixed;
  top: 20%;
  left: 20%;
  right: 20%;
  bottom: 20%;
  width: 60%;
  height: 60%;
  background-color: #c83c2b;
  z-index: 9998;
}

.popupBackground {
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
}
</style>