
<!-- Ce fichier gère le selecteur de date pour la vue des semaines de l'horaire -->

<script>
import dayjs from "dayjs";

//déclaration des propriétés
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

    //Obtenir le mois sélectionné
    computed: {
        selectedWeek() {
            //avoir le premier jour de la semaine
            let firstDate
            if (this.firstDay == 'Invalid Date') { //Ici on gère un cas spécial de bug, où l'avant dernier jour du mois bug
                const month = parseInt(this.lastDay.split('-')[1])
                const monthCurrent = '' + (month - 1) + ''
                const year = this.lastDay.split('-')[0]
                firstDate = new Date(year + '-' + monthCurrent + '-' + '30')
            } else {
                firstDate = new Date(this.firstDay)
            }
            const lastDate = new Date(this.lastDay)
            const date = new Date(this.selectedDate);
            const firstMonth = ["janvier", "février", "mars", "avril", "mai", "juin",
                "juillet", "aout", "septembre", "octobre", "novembre", "décembre"][firstDate.getMonth()];
            const lastMonth = ["janvier", "février", "mars", "avril", "mai", "juin",
                "juillet", "aout", "septembre", "octobre", "novembre", "décembre"][lastDate.getMonth()];
            return Number(dayjs(firstDate).format("DD")) + ' ' + firstMonth +
                ' au ' +
                Number(dayjs(lastDate).format("DD")) + ' ' + lastMonth +
                ' ' + date.getFullYear();
        },
    },

    //mois d'avant et après

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