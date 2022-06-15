<script setup>
import { ref } from "vue";

const props = defineProps(["notification"]);

</script>




<template>
  <div>
        

    <div v-if="notification.motif == 'Changement de salle'">
      <div id="divMom" :id="notification.id" class="couleurSalle">
          <table id="tableNotifications" style="width: 100%">
      <tr class="notif">
        <td class="bold" style="width: 50%" >{{ notification.description }}</td>
        <td>{{ notification.motif }}</td>
        <td class="bold">{{ notification.date }}</td>
      </tr>
    </table>
    </div>
    </div>

    <div v-else-if="notification.motif === 'Mise à jour de rendus'">
      <div id="divMom" :id="notification.id" class="couleurRendu">
          <table id="tableNotifications" style="width: 100%">
      <tr class="notif">
        <td class="bold" style="width: 50%" >{{ notification.description }}</td>
        <td>{{ notification.motif }}</td>
        <td class="bold">{{ notification.date }}</td>
      </tr>
    </table>
    </div>
    </div>

   <div v-else="notification.motif === 'changement horaire'">
      <div id="divMom" :id="notification.id" class="couleurHoraire">
          <table id="tableNotifications" style="width: 100%">
      <tr class="notif">
        <td class="bold" style="width: 50%" >{{ notification.description }}</td>
        <td>{{ notification.motif }}</td>
        <td class="bold">{{ notification.date }}</td>
      </tr>
    </table>
    </div>
    </div>
  </div>




</template>







<style scoped>
/* table, th, td {
  border:1px solid black;
} */

tr {
  height: 20px;
}


td {
  font-size: 23px;
}


#divMom {
  width: 90%;
  padding: 15px;
  border-radius: 25px;
  margin: 25px 25px 50px;
  box-shadow: 0.2em 0em 1em silver;
}

.couleurSalle {
  border-left: 10px solid #71A0BA;
}

.couleurHoraire {
  border-left: 10px solid #ebc2bd;
}

.couleurRendu {
  border-left: 10px solid #c83c2b;
}

.notif {
  width: 300px;
  text-align: left;
}

.bold {
  font-weight: bold;
}
</style>