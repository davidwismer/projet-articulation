<script setup>
import { ref } from "vue"
const props = defineProps(['rendu']);

const cours = ref(tabCours);
let coursNom
cours.value.forEach(cours => {
    if(props.rendu.cour_id == cours.id) coursNom = cours.label
})

</script>

<template>
    <div class="rendu">
        <span class="nom">{{ coursNom }}</span>
    </div>
</template>

<style scoped>
.rendu {
    border-radius: 20px;
    margin-top: 2px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: #EBC2BD;
    font-size: 10px;
    border-left: 4px solid #C83C2B;
}
</style>