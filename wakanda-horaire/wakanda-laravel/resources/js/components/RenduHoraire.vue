<script setup>
import { ref } from "vue"
const props = defineProps(['rendu', "cours"]);
</script>

<template>
    <div class="rendu">
        <span class="nom">{{ props.rendu.date }}</span>
    </div>
</template>

<style scoped>
.rendu {
    border-radius: 20px;
    margin-top: 2px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: #EBC2BD;
    font-size: 10px;
    border-left: 4px solid #C83C2B;
}
</style>