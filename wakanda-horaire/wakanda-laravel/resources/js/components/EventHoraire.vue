<script setup>
import { ref } from "vue"
const props = defineProps(['evenement']);
</script>

<template>
    <div class="evenement">
        <span class="nom">{{ props.evenement.titre }}</span>
    </div>
</template>

<style scoped>
.evenement {
    border-radius: 20px;
    margin-top: 2px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: #C9BBE7;
    font-size: 10px;
    border-left: 4px solid #6A24FF;
}
</style>