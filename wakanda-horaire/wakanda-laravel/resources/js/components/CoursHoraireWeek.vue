<script setup>
import { ref } from "vue"

const props = defineProps(['cours']);
const modules = ref(tabModules)
//Avoir la couleur du module
let couleurModule
modules.value.forEach(evt => {
    if (evt.id == props.cours.module_id) couleurModule = evt.couleur
})
const style = {
    color: couleurModule
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

    height: 200px;

    display: flex;
    flex-direction: column;
    justify-content: center;

    z-index: 9997;
    position: relative;
    border-left: 4px solid v-bind('style.color');
}

.nom {
    font-size: 15px;
    font-weight: 600;
}

.element {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>