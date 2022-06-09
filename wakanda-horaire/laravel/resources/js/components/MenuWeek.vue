<script setup>
import { ref } from "vue";

const toggle = ref(true);
</script>

<template>
    <div>
        <button @click="toggle = !toggle">
            <img v-if="toggle" class="viewMoreImg" src="./assets/vectorMenuViewMore.svg" />
            <img v-if="!toggle" class="viewMoreImg" src="./assets/vectorMenuViewLess.svg" />
        </button>
    </div>
</template>

<style>
</style>