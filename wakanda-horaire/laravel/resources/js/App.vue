<script setup >
  import logo from "./components/logo.vue";
</script>

<template>
<logo></logo>
    @foreach($users as $user)
    <h1><?php $user ?></h1>
    @endforeach
</template>
    

    
<style lang="css">
</style> 