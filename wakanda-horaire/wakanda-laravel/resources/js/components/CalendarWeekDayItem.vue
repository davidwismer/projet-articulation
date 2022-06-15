<script>
import {ref} from "vue"
import dayjs from 'dayjs'
import RenduHoraire from './RenduHoraire.vue'
import CoursHoraireWeek from './CoursHoraireWeek.vue'
import EventHoraire from './EventHoraire.vue'

const modules = ref(tabModules)

export default {

    components: {
        RenduHoraire,
        EventHoraire,
        CoursHoraireWeek
    },

    props: {
        case: {
            type: String
        },
        isEventsChecked: {
            type: Boolean,
            default: false
        },

        isCoursChecked: {
            type: Boolean,
            default: false
        },

        isRendusChecked: {
            type: Boolean,
            default: false
        },

        eventsWeek: {
            type: Array
        },

        rendusWeek: {
            type: Array
        },

        coursWeek: {
            type: Array
        },

        weekDays: {
            type: Array
        }
    },

    computed: {
        getCaseLigne() {
            let firstSplit = this.case.split('/')[1]
            if (firstSplit !== undefined) return firstSplit.split('$')[0]
        },
        getCaseColumn() {
            return this.case.split('/')[0]
        },
        getCaseDate() {
            return this.case.split('$')[1]
        },

        getHourCase() {
            let tab = []
            if (this.case.split(':')[1] == '00') tab.push(this.case)
            return tab[0]
        },

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

        getRendusCase() {
            let rendusCase = []
            this.rendusWeek.forEach(evt => {
                if (evt.date == this.getCaseDate && this.getCaseLigne == 0) rendusCase.push(evt)
            })
            return rendusCase
        },

        getCoursCase() {
            let coursCase = []
            this.coursWeek.forEach(cours => {
                let startP = cours.periodeStart
                if (cours.start.split(' ')[0] == this.getCaseDate && this.getCaseLigne == startP) coursCase.push(cours)
            })
            return coursCase
        },

        getModulesCase() {
            //Avoir les modules que la classe suit pour ce jour (lien avec branche du cours)
            let modulesCours = []
            const coursClasseCase = this.getCoursCase
            modules.value.forEach(module => {
                coursClasseCase.forEach(evt => {
                    if (evt.module_id == module.id) modulesCours.push(module)
                })
            })
            return modulesCours
        },

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
        <cours-horaire-week class="cours-day" v-for="evt of getCoursCase" :cours="evt" :modules="getModulesCase" v-show="getIsCours">
        </cours-horaire-week>
        <rendu-horaire class="cours-day" v-for="evt of getRendusCase" :rendu="evt" v-show="getIsRendus"></rendu-horaire>
        <event-horaire class="cours-day" v-for="evt of getEventsCase" :evenement="evt" v-show="getIsEvents">
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