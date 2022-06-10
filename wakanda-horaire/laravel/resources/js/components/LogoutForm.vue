<script>
import Vue from "vue";




async function logout() {

    await axios.get("/sanctum/csrf-cookie");
    const userdata = await axios.get("/logout");
    window.location="/";
}






</script>



<template>
<h1>coucou</h1>
</template>



    
<style lang="css" scoped>
</style>