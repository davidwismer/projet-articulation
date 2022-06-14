<script setup>

</script>

<template>
  <div class="bloc" width="250px">
    <div class="text-rendus">
      <h3 classe="titre-principal">Filtres</h3>
      <input type="checkbox" name="Cours" value="un" />Cours<br>
      <input type="checkbox" name="Examens" value="deux" />Examens & Rendus <br>
      <input type="checkbox" name="Event" value="trois" />Evénements  <br>
    </div>
  </div>
</template>

<style scoped>
.bloc {
  background-color: #eae9e9;
  border-radius: 20px;
  width: 250px;
  height: 250px;
  float: right;
}

.titre-principal {
  text-align: center;
  margin-top: 0;
}

.text-rendus {
  margin: 20px;
  color: black;
  text-align: left;
}

.checkbox__box:checked {
  font-family: 'FontAwesome';
  content: '\2714';
}
</style>