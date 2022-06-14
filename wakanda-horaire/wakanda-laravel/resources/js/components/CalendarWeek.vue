<script>
import dayjs from "dayjs";
import weekday from "dayjs/plugin/weekday";
import weekOfYear from "dayjs/plugin/weekOfYear";
import CalendarDateIndicatorWeek from './CalendarDateIndicatorWeek.vue'
import CalendarWeekDayItem from './CalendarWeekDayItem.vue'
import CalendarWeekNumbers from "./CalendarWeekNumbers.vue"
import CalendarWeekdaysSemaine from './CalendarWeekdaysSemaine.vue'

dayjs.extend(weekday);
dayjs.extend(weekOfYear);

export default {
    name: "CalendarWeek",

    components: {
        CalendarDateIndicatorWeek,
        CalendarWeekdaysSemaine,
        CalendarWeekDayItem,
        CalendarWeekNumbers
    },

    data() {
        return {
            selectedDate: dayjs(),
        };
    },

    computed: {
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
            <calendar-week-day-item v-for="day in days" />
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

.day-of-week {
    height: auto;
    display: grid;
    grid-template-columns: 60px 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
    justify-content: center;
}
</style>