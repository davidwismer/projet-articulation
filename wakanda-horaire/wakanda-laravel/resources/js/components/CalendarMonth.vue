
<!-- Ce fichier gère la vue pour la section de l'horaire vu au mois -->

<template>
  <div class="calendar-month">
    <div class="calendar-month-header">
      <CalendarDateIndicator :selected-date="selectedDate" @dateSelected="selectDate" :current-date="today"
        class="calendar-month-header-selected-month" />
    </div>
    <CalendarWeekdays />
    <ol class="days-grid">
      <CalendarMonthDayItem v-for="day in days" :key="day.date" :day="day" :is-today="day.date === today"
        :isEventsChecked="eventsChecked" :isCoursChecked="coursChecked" :isRendusChecked="rendusChecked"
        :classeSelected='getClasse' />
    </ol>
  </div>
</template>

<script>
import dayjs from "dayjs";
import weekday from "dayjs/plugin/weekday";
import weekOfYear from "dayjs/plugin/weekOfYear";
import CalendarMonthDayItem from "./CalendarMonthDayItem";
import CalendarDateIndicator from "./CalendarDateIndicator";
import CalendarWeekdays from "./CalendarWeekdays";

dayjs.extend(weekday);
dayjs.extend(weekOfYear);

export default {
  name: "CalendarMonth",

  components: {
    CalendarMonthDayItem,
    CalendarDateIndicator,
    CalendarWeekdays,
  },

  props: {
    //tabChecked fait référence à ce qu'on souhaite afficher dans l'horaire grace au filtre.
    tabChecked: {
      type: Array,
      default: [1, 2, 3]
    },
    //classeSelection définit pour quelle classe on affiche l'horaire
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
    getClasse() {
      return this.classeSelection
    },
    //Si on affiche les evenements
    eventsChecked() {
      let bool = false
      if (this.tabChecked !== null) {
        this.tabChecked.forEach(evt => {
          if (evt == 'events') bool = true
        })
      }
      return bool
    },
    //Si on affiche les cours
    coursChecked() {
      let bool = false
      if (this.tabChecked !== null) {
        this.tabChecked.forEach(evt => {
          if (evt == 'cours') bool = true
        })
      }
      return bool
    },
    //Si on affiche les rendus
    rendusChecked() {
      let bool = false
      if (this.tabChecked !== null) {
        this.tabChecked.forEach(evt => {
          if (evt == 'rendus') bool = true
        })
      }
      return bool
    },
    //Retourne les jours à afficher dans la grille du mois
    days() {
      return [
        ...this.previousMonthDays,
        ...this.currentMonthDays,
        ...this.nextMonthDays,
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

    numberOfDaysInMonth() {
      return dayjs(this.selectedDate).daysInMonth();
    },
    //Retourne les jours du mois selectionné
    currentMonthDays() {
      return [...Array(this.numberOfDaysInMonth)].map((day, index) => {
        return {
          date: dayjs(`${this.year}-${this.month}-${index + 1}`).format(
            "YYYY-MM-DD"
          ),
          isCurrentMonth: true,
        };
      });
    },
    //On récolte les jours du mois précédents que l'on a quand même dans la grille affichée (Ceux qui sont en début de semaine avant le 1er)
    previousMonthDays() {
      const firstDayOfTheMonthWeekday = this.getWeekday(
        this.currentMonthDays[0].date
      );
      const previousMonth = dayjs(`${this.year}-${this.month}-01`).subtract(
        1,
        "month"
      );

      //On couvre le premier jour du mois étant un dimanche (firstDayOfTheMonthWeekday === 0)
      const visibleNumberOfDaysFromPreviousMonth = firstDayOfTheMonthWeekday
        ? firstDayOfTheMonthWeekday - 1
        : 6;

      const previousMonthLastMondayDayOfMonth = dayjs(
        this.currentMonthDays[0].date
      )
        .subtract(visibleNumberOfDaysFromPreviousMonth, "day")
        .date();

      return [...Array(visibleNumberOfDaysFromPreviousMonth)].map(
        (day, index) => {
          return {
            date: dayjs(
              `${previousMonth.year()}-${previousMonth.month() + 1}-${previousMonthLastMondayDayOfMonth + index
              }`
            ).format("YYYY-MM-DD"),
            isCurrentMonth: false,
          };
        }
      );
    },
    //Pareille que pour les jours précédents, mais pour les jours suivants
    nextMonthDays() {
      const lastDayOfTheMonthWeekday = this.getWeekday(
        `${this.year}-${this.month}-${this.currentMonthDays.length}`
      );

      const nextMonth = dayjs(`${this.year}-${this.month}-01`).add(1, "month");

      const visibleNumberOfDaysFromNextMonth = lastDayOfTheMonthWeekday
        ? 7 - lastDayOfTheMonthWeekday
        : lastDayOfTheMonthWeekday;

      return [...Array(visibleNumberOfDaysFromNextMonth)].map((day, index) => {
        return {
          date: dayjs(
            `${nextMonth.year()}-${nextMonth.month() + 1}-${index + 1}`
          ).format("YYYY-MM-DD"),
          isCurrentMonth: false,
        };
      });
    },
  },

  methods: {
    //Retourne le jour dans la semaine d'une date (2 si c'est mardi par exemple, dimanche étant 0 et samedi 6)
    getWeekday(date) {
      return dayjs(date).weekday();
    },
    //Gère les changements de mois avec selecteur
    selectDate(newSelectedDate) {
      this.selectedDate = newSelectedDate;
    },
  },
};
</script>

<style scoped>
.calendar-month {
  block-size: 140px;
  width: 75%;
  position: relative;
  margin-left: 60px;
}

.day-of-week {
  font-size: 18px;
  padding-bottom: 5px;
}

.calendar-month-header {
  background-color: #f6f6f6;
}

.day-of-week,
.days-grid {
  height: auto;
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  justify-content: center;
}
</style>
