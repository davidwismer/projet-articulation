<script setup>
import { ref } from "vue";
import PopUpRendu from "./PopUpRendu.vue";
const props = defineProps(["rendu"]);

const cours = ref(tabCours);
let coursNom;
cours.value.forEach((cours) => {
  if (props.rendu.cour_id == cours.id) coursNom = cours.label;
});

const showModal = ref(false);
</script>

<template>
  <div class="rendu">
    <button @click="showModal = true">
      <span class="nom">{{ coursNom }}</span>
    </button>
    <pop-up-rendu v-if="showModal" :show="showMedal" @close="showModal = false"></pop-up-rendu>
  </div>
</template>

<style scoped>
button {
  width: 100%;
  border-radius: 20px;
  padding-left: 5px;
  padding-right: 5px;
  background-color: #ebc2bd;
  font-size: 10px;
  text-align: left;
  border: 0px;
  border-left: 4px solid #c83c2b;
}
</style>