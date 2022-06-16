
<!-- Ce fichier gère chacune des cases de la grille d'horaire de semaine -->

<script>
import { ref } from "vue"
import dayjs from 'dayjs'
import RenduHoraire from './RenduHoraire.vue'
import CoursHoraireWeek from './CoursHoraireWeek.vue'
import EventHoraire from './EventHoraire.vue'

export default {
    name: "CalendarWeekDayItem",

    components: {
        RenduHoraire,
        EventHoraire,
        CoursHoraireWeek
    },

    props: {
        case: {
            type: String
        },
        //Si les evenements sont checkés dans le filtre
        isEventsChecked: {
            type: Boolean,
            default: false
        },
        //Si les cours sont checkés dans le filtre
        isCoursChecked: {
            type: Boolean,
            default: false
        },
        //Si les rendus sont checkés dans le filtre
        isRendusChecked: {
            type: Boolean,
            default: false
        },
        //Les evenements propres à la semaine
        eventsWeek: {
            type: Array
        },
        //Les rendus propres à la semaine
        rendusWeek: {
            type: Array
        },
        //Les cours propres à la semaine
        coursWeek: {
            type: Array
        },
        //Les jours de la semaine selectionnée
        weekDays: {
            type: Array
        }
    },

    computed: {
        //Retourne la ligne de la case (L'heure)
        getCaseLigne() {
            let firstSplit = this.case.split('/')[1]
            if (firstSplit !== undefined) return firstSplit.split('$')[0]
        },
        //Retourne la colonne de la case (Le jour)
        getCaseColumn() {
            return this.case.split('/')[0]
        },
        //Retourne la date de la case (Pour le jour)
        getCaseDate() {
            let date = this.case.split('$')[1]
            if (date == 'Invalid Date') {
                const year = this.weekDays[1].date.split('-')[0]
                const month = this.weekDays[1].date.split('-')[1]
                date = year + '-' + month + '-' + '30'
            }
            return date
        },
        //Retourne l'heure pour la première colonne qui va afficher les heures
        getHourCase() {
            let tab = []
            if (this.case.split(':')[1] == '00') tab.push(this.case)
            return tab[0]
        },
        //Retourne les evenements pour la bonne case (Les events sont tout en haut)
        getEventsCase() {
            let eventsCase = []
            const dateCase = new Date(this.getCaseDate)
            this.eventsWeek.forEach(evt => {
                const dateDeb = new Date(evt.dateDebut)
                const dateFin = new Date(evt.dateFin)
                if (dateCase >= dateDeb && dateCase <= dateFin && this.getCaseLigne == 0) eventsCase.push(evt)
            })
            return eventsCase
        },
        //Retourne les rendus pour la bonne case (Les rendus sont tout en haut)
        getRendusCase() {
            let rendusCase = []
            this.rendusWeek.forEach(evt => {
                if (evt.date == this.getCaseDate && this.getCaseLigne == 0) rendusCase.push(evt)
            })
            return rendusCase
        },
        //Retourne les cours pour la bonne case, au bon emplacement propre à la valeur "periodeStart" dans la table de la bd.
        //On a divisé les journées en différentes périodes, pour les cours qui commencent à 8:30 c'est 0 et pour les cours qui commencent à 13:15 c'est 6.
        getCoursCase() {
            let coursCase = []
            this.coursWeek.forEach(cours => {
                let startP = cours.periodeStart
                if (cours.start.split(' ')[0] == this.getCaseDate && this.getCaseLigne == startP) coursCase.push(cours)
            })
            return coursCase
        },
        //Retourne si la case est une des cases qui montre l'heure
        isHour() {
            return this.case.split(':')[1] == '00'
        },
        getIsEvents() {
            return this.isEventsChecked
        },
        getIsCours() {
            return this.isCoursChecked
        },
        getIsRendus() {
            return this.isRendusChecked
        },
        getEventsWeek() {
            return this.eventsWeek
        },
        getWeekDays() {
            return this.weekDays
        }
    },

    methods: {
        getWeekday(date) {
            return dayjs(date).weekday();
        },
    }
}

</script>

<template>
    <li class="calendar-case" :class="{
        'hour': isHour
    }">
        <span>{{ getHourCase }}</span>
        <cours-horaire-week class="cours-day" v-for="evt of getCoursCase" :isCurrentMonth="true" :cours="evt"
            v-show="getIsCours">
        </cours-horaire-week>
        <rendu-horaire class="rendu-day" v-for="evt of getRendusCase" :isCurrentMonth="true" :rendu="evt"
            v-show="getIsRendus"></rendu-horaire>
        <event-horaire class="event-day" v-for="evt of getEventsCase" :isCurrentMonth="true" :evenement="evt"
            v-show="getIsEvents">
        </event-horaire>
    </li>
</template>

<style scoped>
ol,
li {
    padding: 0;
    margin: 0;
    list-style: none;
}

.calendar-case {
    position: relative;
    min-height: 50px;
    font-size: 16px;
    border-bottom: 1px dashed #999999;
    padding: 0 5px 0 5px;
}

.hour {
    font-size: 12px;
    border-bottom: 0px;
    display: flex;
    flex-direction: column-reverse;
    text-align: center;
}
</style>