<script setup >
import DataExemple from "./components/DataExemple.vue";
import CelluleModule from "./components/CelluleModule.vue";
import Vue from "vue";
import { ref } from "vue";
import { user } from "./state.js";
import CelluleNotifications from "./components/CelluleNotifications.vue";

const notifications = ref(tabNotifications);
</script>


<template>
  <div id="divv">
    <div>
      <h2 class="bold">Nouveautés et changements</h2>
      <br />
    </div>

    <div>
      <table style="width: 22%">
        <td class="cercleSalle"></td>
        <td>Salle</td>

        <td class="cercleHoraire"></td>
        <td>Horaire</td>

        <td class="cercleRendu"></td>
        <td>Rendus</td>
      </table>
      <br />
    </div>
  
  <cellule-notifications v-for="notif of notifications" :notification="notif">
  </cellule-notifications>
  </div>

</template>











<style scoped>
#divv {
    margin: 80px;
}
.cercleSalle {
  height: 30px;
  width: 30px;
  background-color: #71a0ba;
  border-radius: 50%;
  display: flex;
}

.cercleHoraire {
  height: 30px;
  width: 30px;
  background-color: #ebc2bd;
  border-radius: 50%;
  display: flex;
}

.cercleRendu {
  height: 30px;
  width: 30px;
  background-color: #c83c2b;
  border-radius: 50%;
  display: flex;
}

#tableIntro {
  margin: 3% 3% 3% 2%;
  width: 90%;
}

#buttonSem {
  text-align: right;
}

button {
  cursor: pointer;
  border: 0px;
  background-color: transparent;
  color: #888888;
}

.invisible {
  visibility: hidden;
}

.next {
  margin-left: 10px;
}

.previous {
  margin-right: 10px;
}

.bold {
  font-weight: bold;
}
</style>