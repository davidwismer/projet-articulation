<script setup>
import CelluleBranchesParModule from "./CelluleBranchesParModule.vue";
import { ref } from "vue"
const props = defineProps(["module"])

const branches = ref(tabBranches)
//les branches concernées par le module
let branchesConcernees = []
branches.value.forEach(branche => {
    if (branche.module_id == props.module.id) branchesConcernees.push(branche)
})
</script>

<template>
    <div>
        <h2>{{ module.nom }}</h2>
        <cellule-branches-par-module v-for="branche of branchesConcernees" v-show="branche.module_id === module.id" :branche="branche" :module="module">
        </cellule-branches-par-module>
        <hr />
    </div>
</template>

<style scoped>
</style>