<script setup >
// const users = ref(usersNoms);

const cols = 7;
const rows = 8;
</script>

<template>
<div class="grille">
  <template v-for="index in rows">
      <template v-for="index in cols">
    <div class="grid-item"></div>
      </template>
  </template>
</div>
</template>
    
<style lang="css">
.grille {
  max-width: 1300;
  width: 100%;
  height: auto;
  margin: 30px auto;
  display: grid;
  grid-template-columns: repeat(7, 120px);
  justify-content: center;

  grid-gap: 20px;
}

.grid-item {
  width: 120px;
  height: 100px;
  background: #eae9e9;
}
</style> 