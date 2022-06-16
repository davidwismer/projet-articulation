<script>
import { ref } from "vue";
import { user } from "../state";
import dayjs from "dayjs";
import weekday from "dayjs/plugin/weekday";
import weekOfYear from "dayjs/plugin/weekOfYear";
import CalendarDateIndicatorWeek from './CalendarDateIndicatorWeek.vue'
import CalendarWeekDayItem from './CalendarWeekDayItem.vue'
import CalendarWeekNumbers from "./CalendarWeekNumbers.vue"
import CalendarWeekdaysSemaine from './CalendarWeekdaysSemaine.vue'

dayjs.extend(weekday);
dayjs.extend(weekOfYear);

const events = ref(tabEvents);
const rendus = ref(tabRendus);
const cours = ref(tabCours);

export default {
    name: "CalendarWeek",

    components: {
        CalendarDateIndicatorWeek,
        CalendarWeekdaysSemaine,
        CalendarWeekDayItem,
        CalendarWeekNumbers
    },

    props: {
        tabChecked: {
            type: Array,
            default: [1, 2, 3]
        },
        classeSelection: {
            type: Number
        }
    },

    data() {
        return {
            selectedDate: dayjs(),
        };
    },

    computed: {
        eventsChecked() {
            let bool = false
            if (this.tabChecked !== null) {
                this.tabChecked.forEach(evt => {
                    if (evt == 'events') bool = true
                })
            }
            return bool
        },

        coursChecked() {
            let bool = false
            if (this.tabChecked !== null) {
                this.tabChecked.forEach(evt => {
                    if (evt == 'cours') bool = true
                })
            }
            return bool
        },

        rendusChecked() {
            let bool = false
            if (this.tabChecked !== null) {
                this.tabChecked.forEach(evt => {
                    if (evt == 'rendus') bool = true
                })
            }
            return bool
        },

        getEventsWeek() {
            let eventsWeek = []
            let lundi
            if (this.currentWeekDays[0].date == 'Invalid Date') {
                console.log()
                const year = this.currentWeekDays[1].date.split('-')[0]
                const month = this.currentWeekDays[1].date.split('-')[1]
                lundi = new Date(year + '-' + month + '-' + '30')
            } else {
                lundi = new Date(this.currentWeekDays[0].date)
            }
            const dimanche = new Date(this.currentWeekDays[6].date)
            events.value.forEach(event => {
                const dateDeb = new Date(event.dateDebut)
                const dateFin = new Date(event.dateFin)
                if (dateDeb <= dimanche && dateFin >= lundi) eventsWeek.push(event)
            })
            return eventsWeek
        },

        getRendusWeekUser() {
            let rendusWeekUser = []
            let rendusWeek = []
            let lundi
            if (this.currentWeekDays[0].date == 'Invalid Date') {
                console.log()
                const year = this.currentWeekDays[1].date.split('-')[0]
                const month = this.currentWeekDays[1].date.split('-')[1]
                lundi = new Date(year + '-' + month + '-' + '30')
            } else {
                lundi = new Date(this.currentWeekDays[0].date)
            }
            const dimanche = new Date(this.currentWeekDays[6].date)
            rendus.value.forEach(rendu => {
                const date = new Date(rendu.date)
                if (date <= dimanche && date >= lundi) rendusWeek.push(rendu)
            })
            rendusWeek.forEach(rendu => {
                let coursId = rendu.cour_id
                cours.value.forEach(cours => {
                    if (coursId == cours.id) {
                        if (cours.classe_id == this.getUserClasseId) rendusWeekUser.push(rendu)
                    }
                })
            })
            return rendusWeekUser
        },

        getCoursWeekUser() {
            let coursWeekClasse = []
            let coursWeek = []
            let lundi
            if (this.currentWeekDays[0].date == 'Invalid Date') {
                console.log()
                const year = this.currentWeekDays[1].date.split('-')[0]
                const month = this.currentWeekDays[1].date.split('-')[1]
                lundi = new Date(year + '-' + month + '-' + '30')
            } else {
                lundi = new Date(this.currentWeekDays[0].date)
            }
            const dimanche = new Date(this.currentWeekDays[6].date)
            cours.value.forEach(cours => {
                const date = new Date(cours.start.split(' ')[0])
                if (date <= dimanche && date >= lundi) coursWeek.push(cours)
            })
            coursWeek.forEach(cours => {
                let classeId = this.getUserClasseId
                if (cours.classe_id == classeId) coursWeekClasse.push(cours)
            })
            return coursWeekClasse
        },

        getGridWeek() {
            let tab = []
            let hIndex = 8
            for (let nbLigne = 0; nbLigne < 12; nbLigne++) {
                tab.push(dayjs().hour(hIndex).minute(0).format("HH:mm"))
                for (let nbColumn = 1; nbColumn < 8; nbColumn++) {
                    tab.push("" + nbColumn + "/" + nbLigne + "$" + this.currentWeekDays[nbColumn - 1].date)
                }
                hIndex++
            }
            return tab
        },

        getUserClasseId() {
            let classeId = this.classeSelection
            if (user.value !== null && user.value.role_id == 3) {
                if (this.classeSelection === null) {
                    classeId = user.value.classe_id
                }
            }
            return classeId
        },

        days() {
            return [
                ...this.currentWeekDays,
            ];
        },

        today() {
            return dayjs().format("YYYY-MM-DD");
        },

        month() {
            return Number(this.selectedDate.format("M"));
        },

        year() {
            return Number(this.selectedDate.format("YYYY"));
        },

        firstDayDate() {
            let jour = Number(this.selectedDate.format("DD"))
            let nbJourDansSemaine = this.getWeekday(this.selectedDate)
            let premierJour = jour - nbJourDansSemaine + 1
            return dayjs(`${this.year}-${this.month}-${premierJour}`).format('YYYY-MM-DD');
        },

        lastDayDate() {
            let jour = Number(this.selectedDate.format("DD"))
            let nbJourDansSemaine = this.getWeekday(this.selectedDate)
            let premierJour = jour - nbJourDansSemaine + 1
            return dayjs(`${this.year}-${this.month}-${premierJour + 6}`).format('YYYY-MM-DD');
        },

        currentWeekDays() {
            let jour = Number(this.selectedDate.format("DD"))
            let nbJourDansSemaine = this.getWeekday(this.selectedDate)
            let premierJour = jour - nbJourDansSemaine + 1
            return [...Array(7)].map((day, index) => {
                return {
                    date: dayjs(`${this.year}-${this.month}-${index + premierJour}`).format(
                        "YYYY-MM-DD"
                    ),
                    isCurrentWeek: true,
                };
            });
        },
    },

    methods: {
        getWeekday(date) {
            return dayjs(date).weekday();
        },

        selectDate(newSelectedDate) {
            this.selectedDate = newSelectedDate;
        },
    },
}


</script>

<template>
    <div class="calendar-week">
        <div class="calendar-week-header">
            <CalendarDateIndicatorWeek :selected-date="selectedDate" :first-day="firstDayDate" :last-day="lastDayDate"
                @dateSelected="selectDate" :current-date="today" class="calendar-week-header-selected-week" />
        </div>
        <calendar-week-numbers :current-week="currentWeekDays" :current-date="today"></calendar-week-numbers>
        <CalendarWeekdaysSemaine />
        <ol class="days-grid">
            <CalendarWeekDayItem v-for="day in getGridWeek" :case="day" :isEventsChecked="eventsChecked"
                :isCoursChecked="coursChecked" :isRendusChecked="rendusChecked" :eventsWeek="getEventsWeek"
                :weekDays="currentWeekDays" :rendusWeek="getRendusWeekUser" :coursWeek="getCoursWeekUser" />
        </ol>
    </div>
</template>

<style scoped>
.calendar-week {
    block-size: 140px;
    width: 75%;
    position: relative;
    margin-left: 60px;
}

.day-of-week {
    font-size: 18px;
    padding-bottom: 5px;
}

.calendar-week-header {
    background-color: #f6f6f6;
}

.day-of-week,
.days-grid {
    height: 50px;
    display: grid;
    grid-template-columns: 60px 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
    justify-content: center;
}
</style>