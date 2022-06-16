
<!-- Pour le header de l'horaire de semaine, on veut afficher les numéros des jours -->

<script>
import dayjs from 'dayjs';

export default {
    name: "CalendarWeekdays",

    props: {
        //jours de la semaine selectionnée
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
        //Retourne le numéro pour chaque jour de la semaine
        getNumbers() {
            //On instancie le tableau des nums avec une chaine vide (C'est pour la colonne des heures, on ne veut pas de numéro sur celle-ci)
            let numbers = [" "]
            this.currentWeek.forEach(day => {
                let num = Number(dayjs(day.date).format("DD"))
                if(isNaN(num)) num = 30 //Gère le cas du bug
                numbers.push(num)
            })
            return numbers
        },
        //Pour le style, on veut que la date d'aujourd'hui soit en rouge
        getTodayNumber() {
            return Number(dayjs(this.currentDate).format("DD"))
        },
        //Retourne true si la date d'aujourd'hui est dans le tableau des jours de la semaine selectionnée
        isToday() {
            let isToday = false
            this.currentWeek.forEach(day => {
                if(dayjs(this.currentDate).format("YYYY-MM-DD") == day.date) isToday = true
            })
            return isToday
        }
    }

};
</script>

<template>
    <ol class="number-of-week">
        <li class="calendar-number" :class="{
            'today': (isToday && getTodayNumber == number)
        }" v-for="number in getNumbers" :key="number">{{ number }}</li>
    </ol>
</template>

<style scoped>
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