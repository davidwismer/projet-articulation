<script setup>
import { ref } from "vue";

const props = defineProps(['day']);
const toggle = ref(true);
</script>

<template>
    <div class="menuJour">
        <p class="jour">{{ day }}</p>
        <button class="deroulement" @click="toggle = !toggle">
            <img v-if="toggle" class="viewMoreImg" src="./assets/vectorMenuViewMore.svg" />
            <img v-if="!toggle" class="viewMoreImg" src="./assets/vectorMenuViewLess.svg" />
        </button>
    </div>
</template>

<style scoped>
.menuJour {
    background-color: #444444;
}

.deroulement {
  cursor: pointer;
  border: 0px;
  background-color: transparent;
  position: relative;
  float: right;
}
</style>