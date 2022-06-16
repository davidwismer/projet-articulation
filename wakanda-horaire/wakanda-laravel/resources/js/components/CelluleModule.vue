<script setup>
import CelluleBranchesParModule from "./CelluleBranchesParModule.vue";
import { ref } from "vue";
const props = defineProps(["module"]);

const branches = ref(tabBranches);
//les branches concernées par le module
let branchesConcernees = [];
branches.value.forEach((branche) => {
  if (branche.module_id == props.module.id) branchesConcernees.push(branche);
});
</script>

<template>
  <div>
    <div id="title">
      <h2><span>•  </span>{{ module.nom }}</h2>
    </div>
    <cellule-branches-par-module
      v-for="branche of branchesConcernees"
      v-show="branche.module_id === module.id"
      :branche="branche"
      :module="module"
    >
    </cellule-branches-par-module>
  </div>
</template>

<style scoped>
span {
        margin: 0% 1% 0% 2%;
   color: v-bind("module.couleur");
}

h2 {
  text-transform: uppercase;
  width: 90%;
}
</style>