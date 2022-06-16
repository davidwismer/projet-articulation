<script >

export default {
  name: "AppHoraire",
  data() {
    return {
      choice: ['cours']
    }
  },

  methods: {
    sendChecked() {
      this.$emit('getChecked', this.choice)
    }
  }
}

//Filtre pour sélectionner le filtre d'affichage
</script>

<template>
  <div class="bloc" width="250px">
    <div class="text-rendus">
      <h3 classe="titre-principal">Filtres</h3>
      <input type="checkbox" value="cours" id="cours" v-model="choice">
      <label for="cours">Cours</label><br>
      <input type="checkbox" value="rendus" id="rendus" v-model="choice">
      <label for="rendus">Examens & Rendus</label><br>
      <input type="checkbox" value="events" id="events" v-model="choice">
      <label for="events">Evenements</label><br>
      {{ sendChecked() }}
    </div>
  </div>
</template>

<style scoped>
.bloc {
  background-color: #eae9e9;
  border-radius: 20px;
  width: 200px;
  /* height: 250px; */
  float: right;
  position: relative;
  right: 2%;
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

h3 {
  margin-top: 20px;
}

input {
  margin-right: 5px;
  margin-top: 5px;
  transform: translate(0, 2px);
}

label,
input {
  cursor: pointer;
}
</style>