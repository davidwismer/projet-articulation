<script setup>
import { ref } from "vue"

const props = defineProps(['cours', 'modules']);
//Avoir la couleur du module
let couleurModule
props.modules.forEach(evt => {
    if (evt.id == props.cours.module_id) couleurModule = evt.couleur
})
const dureePeriode = props.cours.periodeDuree
const theme = {
    color: couleurModule,
    duree: dureePeriode
}
//Avoir l'heure de début du cours
const heureDebut = props.cours.start.split(' ')[1].split(':')[0] + ':' + props.cours.start.split(' ')[1].split(':')[1];
const heureFin = props.cours.end.split(' ')[1].split(':')[0] + ':' + props.cours.end.split(' ')[1].split(':')[1];
const room = props.cours.room
</script>

<template>
    <div class="cours">
        <span class="nom element">{{ props.cours.label }}</span>
        <span class="heure element"> {{ heureDebut }} - {{ heureFin }}</span>
        <span class="room element">{{ room }}</span>
    </div>
</template>

<style scoped>
.cours {
    border-radius: 20px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    background-color: #EAE9E9;
    font-size: 10px;
    border-left: 4px solid v-bind('theme.color');
    height: 200px;

    display: flex;
    flex-direction: column;
    justify-content: center;

    z-index: 9999;
    position: relative;
}

.nom {
    font-size: 15px;
    font-weight: 600;
    text-align: center;
}
.element {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>