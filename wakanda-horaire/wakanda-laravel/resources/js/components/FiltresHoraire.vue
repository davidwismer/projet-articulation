<script >
import { ref, computed } from "vue"

export default {
  name: "AppHoraire",
  data() {
    return {
      checked: []
    }
  },

  methods: {
    sendChecked() {
      this.$emit('getChecked', this.checked)
    }
  }
}
</script>

<template>
  <div class="bloc" width="250px">
    <div class="text-rendus">
      <h3 classe="titre-principal">Filtres</h3>
      <input type="checkbox" value="cours" id="cours" v-model="checked">
      <label for="cours">Cours</label><br>
      <input type="checkbox" value="examens" id="examens" v-model="checked">
      <label for="examens">Examens & Rendus</label><br>
      <input type="checkbox" value="events" id="events" v-model="checked">
      <label for="events">Evenements</label><br>
      {{ sendChecked() }}
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