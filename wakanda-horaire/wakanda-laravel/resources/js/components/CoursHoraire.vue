<script setup>
import { ref } from "vue"

const props = defineProps(['cours', 'modules']);
//Avoir la couleur du module
let couleurModule
props.modules.forEach(evt => {
    if (evt.id == props.cours.module_id) couleurModule = evt.couleur
})
const theme = {
    color: couleurModule
}
//Avoir l'heure de début du cours
const heureDebut = props.cours.start.split(' ')[1].split(':')[0] + ':' + props.cours.start.split(' ')[1].split(':')[1];
</script>

<template>
    <div class="cours">
        <span class="heure">{{ heureDebut }}</span>&nbsp;
        <span class="nom">{{ props.cours.label }}</span>
    </div>
</template>

<style scoped>
.cours {
    border-radius: 20px;
    margin-top: 2px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: #EAE9E9;
    font-size: 10px;
    border-left: 4px solid v-bind('theme.color');
}
</style>