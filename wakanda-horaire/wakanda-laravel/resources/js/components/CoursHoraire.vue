<script setup>
import { ref} from "vue";
import PopUpCours from "./PopUpCours.vue";

const props = defineProps(["cours", "modules", 'isCurrentMonth']);
//Avoir la couleur du module
let couleurModule;
props.modules.forEach((evt) => {
  if (evt.id == props.cours.module_id) couleurModule = evt.couleur;
});
const theme = {
  color: couleurModule,
};
//Avoir l'heure de début du cours
const heureDebut =
  props.cours.start.split(" ")[1].split(":")[0] +
  ":" +
  props.cours.start.split(" ")[1].split(":")[1];
const showModal = ref(false);
</script>

<template>
  <div class="cours">
    <button @click="showModal = true" :disabled="!isCurrentMonth">
      <span class="heure">{{ heureDebut }}</span>&nbsp;
      <span class="nom">{{ props.cours.label }}</span>
    </button>
    <pop-up-cours v-if="showModal" :show="showModal" :cours="props.cours" :modules="props.modules"
      :couleur="couleurModule" @close="showModal = false"></pop-up-cours>
  </div>
</template>

<style scoped>
button {
  height: 18px;
  line-height: 18px;
  width: 100%;
  border-radius: 20px;
  padding-left: 5px;
  padding-right: 5px;
  background-color: #eae9e9;
  font-size: 10px;
  text-align: left;
  border: 0px;
  border-left: 4px solid v-bind("theme.color");
}
</style>