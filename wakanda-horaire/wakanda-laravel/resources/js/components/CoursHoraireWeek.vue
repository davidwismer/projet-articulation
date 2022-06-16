
<!-- Ce fichier gère l'affichage des cours dans l'horaire de la semaine -->

<script setup>
import { ref } from "vue"
import PopUpCours from "./PopUpCours.vue";

const props = defineProps({
    cours:{
        type:Object
    },
    isCurrentMonth: {
        type:Boolean,
        default: true
    }
})

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
//L'heure de fin de cours
const heureFin = props.cours.end.split(' ')[1].split(':')[0] + ':' + props.cours.end.split(' ')[1].split(':')[1];
//La salle dans laquelle se trouve le cours
const room = props.cours.room
const showModal = ref(false);
</script>

<template>
    <div class="cours">
        <button @click="showModal = true" :disabled="!isCurrentMonth">
            <span class="nom element">{{ props.cours.label }}</span>
            <span class="heure element"> {{ heureDebut }} - {{ heureFin }}</span>
            <span class="room element">{{ room }}</span>
        </button>
        <pop-up-cours v-if="showModal" :show="showModal" :cours="props.cours" :modules="props.modules"
            :couleur="couleurModule" @close="showModal = false"></pop-up-cours>
    </div>
</template>

<style scoped>
button{
    border-radius: 20px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    background-color: #EAE9E9;
    font-size: 10px;
    border: 0px;

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