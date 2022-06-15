<template>
  <div class="calendar-month">
    <div class="calendar-month-header">
      <CalendarDateIndicator :selected-date="selectedDate" @dateSelected="selectDate" :current-date="today"
        class="calendar-month-header-selected-month" />
    </div>
    <CalendarWeekdays />
    <ol class="days-grid">
      <CalendarMonthDayItem v-for="day in days" :key="day.date" :day="day" :is-today="day.date === today"
      :isEventsChecked="eventsChecked" :isCoursChecked="coursChecked" :isRendusChecked="rendusChecked" />
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
    tabChecked: {
      type: Array,
      default: [1, 2, 3]
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
          if (evt == 'events') bool =true
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

    previousMonthDays() {
      const firstDayOfTheMonthWeekday = this.getWeekday(
        this.currentMonthDays[0].date
      );
      const previousMonth = dayjs(`${this.year}-${this.month}-01`).subtract(
        1,
        "month"
      );

      // Cover first day of the month being sunday (firstDayOfTheMonthWeekday === 0)
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
    getWeekday(date) {
      return dayjs(date).weekday();
    },

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
