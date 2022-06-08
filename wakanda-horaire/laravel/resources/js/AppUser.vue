<script setup >
import { user } from "./state.js";
import { ref } from "vue";
const users = ref(tabUsers);

console.log(user.value);

const [year, month, day] = user.value.dateNaissance.split("-");
const date = [day, month, year].join(".");
</script>

<template>
  <svg height="300" width="300">
    <circle cx="150" cy="150" r="140" stroke="black" stroke-width="3" />
  </svg>

  <div id="infosPers" class="cellulesUser">
    <h2>Informations personnelles</h2>
    <strong>Nom :</strong>
    <p>{{ user.prenom }} {{ user.nom }}</p>
    <strong>Date de naissance :</strong>
    <p>{{ date }}</p>
    <strong>Mail :</strong>
    <p>{{ user.email }}</p>
    <strong>N° téléphone :</strong>
    <p>{{ user.noTel }}</p>
    <strong>Filière :</strong>
    <p>{{ user.filiere_id }}</p>
  </div>

  <div id="motDePasse" class="cellulesUser">
    <table>
      <tr>
        <th>
          <img id="imgModifMDP" src="./components/assets/modifMotDePasse.svg" />
        </th>
        <th>
           <p id="buttonMotDepasse">Modifier mon mot de passe</p>
        </th>
      </tr>
    </table>
  </div>

  <div id="formAbsence">
    <h2>Formulaire d'absence</h2>
    <p>
      La présence aux cours est obligatoire, toute absence doit être annoncée
      (voir aussi art. 7 et 8 du règlement HEIG-VD).
    </p>
    <a
      href="https://intra.heig-vd.ch/academique/formulaire-absence/Pages/default.aspx"
      target="_blank"
    >
      <button id="buttonFormAbsence">Formulaire d'absence</button>
    </a>
  </div>

  <div id="tauxAbsence">
    <h2>Taux d'absence</h2>
    <p>
      Une unité d’enseignement peut être considérée comme échouée si le taux
      d’absence dépasse 15% (voir aussi art. 7 et 8 du règlement HEIG-VD).
    </p>
  </div>
</template>

<style scoped>
svg {
  margin: 0 auto;
  display: block;
}

strong {
  text-transform: uppercase;
  color: grey;
}

div {
  padding: 20px 20px 4px 20px;
  border-radius: 25px;
  margin: 25px 25px 25px;
  box-shadow: 0.2em 0em 1em silver;
}

#buttonMotDepasse {
  color: red;
}

#imgModifMDP {
  width: 20px;
  height: 20px;
  margin: -17.5px 20px 0px 0px;
}

#buttonFormAbsence {
  margin: 0% 5% 2% 5%;
  width: 90%;
  border-radius: 25px;
  cursor: pointer;
  background-color: transparent;
}
</style>

