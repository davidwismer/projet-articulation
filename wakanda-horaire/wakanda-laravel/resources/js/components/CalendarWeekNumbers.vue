<script>
import dayjs from 'dayjs';

export default {
    name: "CalendarWeekdays",

    props: {
        currentWeek: {
            type: Array,
            require: true
        },
        currentDate: {
            type: String,
            require: true
        },
    },

    computed: {
        getNumbers() {
            let numbers = [" "]
            this.currentWeek.forEach(day => {
                numbers.push(Number(dayjs(day.date).format("DD")))
            })
            return numbers
        },

        getTodayNumber() {
            return Number(dayjs(this.currentDate).format("DD"))
        }
    }

};
</script>

<template>
    <ol class="number-of-week">
        <li class="calendar-number" :class="{
            'today': (number == getTodayNumber)
        }" v-for="number in getNumbers" :key="number">{{ number }}</li>
    </ol>
</template>

<style>
ol,
li {
    padding: 0;
    margin: 0;
    list-style: none;
}

.number-of-week {
    display: grid;
    grid-template-columns: 60px 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
    justify-content: center;
}

.number-of-week>* {
    text-align: center;
}

.day-of-week {
    margin-top: 0;
}

.today {
    color: #ff0000;
}
</style>