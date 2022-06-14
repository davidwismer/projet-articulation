<script>
import dayjs from "dayjs";

export default {
    props: {
        selectedDate: {
            type: Object,
            required: true,
        },
        firstDay: {
            type: String,
            required: true,
        },
        lastDay: {
            type: String,
            required: true,
        },
    },

    computed: {
        selectedWeek() {
            const firstDate = new Date(this.firstDay)
            const lastDate = new Date(this.lastDay)
            const date = new Date(this.selectedDate);
            const firstMonth = ["janvier", "février", "mars", "avril", "mai", "juin",
                "juillet", "aout", "septembre", "octobre", "novembre", "décembre"][firstDate.getMonth()];
            const lastMonth = ["janvier", "février", "mars", "avril", "mai", "juin",
                "juillet", "aout", "septembre", "octobre", "novembre", "décembre"][lastDate.getMonth()];
            return dayjs(firstDate).format("DD") + ' ' + firstMonth +
                ' au ' +
                dayjs(lastDate).format("DD") + ' ' + lastMonth +
                ' ' + date.getFullYear();
        },
    },

    methods: {
        selectPrevious() {
            let newSelectedDate = dayjs(this.selectedDate).subtract(7, "day");
            this.$emit("dateSelected", newSelectedDate);
        },

        selectNext() {
            let newSelectedDate = dayjs(this.selectedDate).add(7, "day");
            this.$emit("dateSelected", newSelectedDate);
        }
    }
};
</script>

<template>
    <table class="calendar-date-indicator-week">
        <th class="previous" @click="selectPrevious">&lt</th>
        <th class="week">{{ selectedWeek }}</th>
        <th class="next" @click="selectNext">></th>
    </table>
</template>

<style scoped>
.calendar-date-indicator-week {
    font-size: 24px;
    font-weight: 600;
    color: var(--grey-00);

    display: flex;
    justify-content: right;

    margin-bottom: 37px;
}

.previous {
    cursor: pointer;
    display: flex;
    justify-content: right;
    color: #888888;
}

.week {
    display: flex;
    justify-content: center;
    width: 450px;
}

.next {
    cursor: pointer;
    display: flex;
    justify-content: left;
    color: #888888;
}
</style>