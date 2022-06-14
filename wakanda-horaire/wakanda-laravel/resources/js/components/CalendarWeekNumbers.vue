<script>
import dayjs from 'dayjs';

export default {
    name: "CalendarWeekdays",

    props: {
        currentWeek: {
            type: Array,
            require: true
        }
    },

    computed: {
        getNumbers() {
            let numbers = []
            this.currentWeek.forEach(day => {
                numbers.push(Number(dayjs(day.date).format("DD")))
            })
            return numbers
        }
    }

};
</script>

<template>
    <ol class="number-of-week">
        <li v-for="number in getNumbers" :key="number">{{ number }}</li>
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
    grid-template-columns: repeat(7, 1fr);
}

.number-of-week>* {
    text-align: center;
}

.day-of-week {
    margin-top: 0;
}
</style>