<script>

export default {

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
    },

    computed: {
        getCaseContent() {
            let tab = []
            if (this.case.split(':')[1] == '00') tab.push(this.case)
            return tab[0]
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
    }
}

</script>

<template>
    <li class="calendar-case" :class="{
        'hour': isHour
    }">
        {{ getCaseContent }}
    </li>
</template>

<style scoped>
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