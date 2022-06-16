
<!-- Ce fichier gère les différents filtres pour les horaires (section horaire mois et semaine) -->

<script>
import { ref } from 'vue'
import { user } from '../state'

export default {
  name: "AppHoraire",

  data() {
    return {
      choice: ['cours'],
      toggleFil: true,
      toggleCl: true,
      filieres: ref(tabFilieres),
      classes: ref(tabClasses),
      titreFiliere: 'Filiere',
      titreClasse: 'Classe'
    }
  },

  computed: {
    //Retourne les filières de la bd
    getFilieres() {
      let filieres = []
      this.filieres.forEach(evt => {
        let ajoute = true
        filieres.forEach(filiereNom => {
          if(evt.nom == filiereNom) ajoute = false
        })
        if(ajoute)filieres.push(evt.nom)
      })
      return filieres
    },
    //Retourne les classes qui sont propres à la filière selectionnée dans le filtre
    getClasses() {
      let classes = []
      this.classes.forEach(classe => {
        if(classe.filiere_id == this.getFiliereId(this.titreFiliere))classes.push(classe)
      })
      return classes
    }
  },

  methods: {
    //Envoi les cases cochées du filtre
    sendChecked() {
      this.$emit('getChecked', this.choice)
    },
//Envoi la classe selectionnée pour l'horaire
    sendClasse(nomClasse) {
      let classeId = this.getClasseId(nomClasse)
      this.$emit('getClasse', classeId)
    },
//Change le nom dans le filtre des filieres
    changeTitreFiliere(newTitre) {
      this.titreFiliere = newTitre
      this.toggleFil = !this.toggleFil
    },
//Change le nom dans le filtre des cours
    changeTitreClasse(newTitre) {
      this.titreClasse = newTitre
      this.toggleCl = !this.toggleCl
    },
//Renvoie l'id d'une filiere
    getFiliereId(nomFiliere) {
      let filiereId
      this.filieres.forEach(filiere => {
        if(nomFiliere == filiere.nom) filiereId = filiere.id
      })
      return filiereId
    },
    //Renvoie l'id d'une classe
    getClasseId(nomClasse) {
      let classeId
      this.classes.forEach(classe => {
        if(nomClasse == classe.nom) classeId = classe.id
      })
      return classeId
    },
    //Si on clique sur le filtre de filiere, ça ferme le choix pour le filtre des classes
    toggleClasseClickFiliere(){
      if(!this.toggleCl)this.toggleCl = !this.toggleCl
    },
    //Vice versa
    toggleFiliereClickClasse(){
      if(!this.toggleFil)this.toggleFil = !this.toggleFil
    }
  }
}

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
    </div>
    <div class="selecteurFiliere">
      <button class="filiere" @click="toggleFil = !toggleFil; toggleClasseClickFiliere()">
        <span class="titre">{{titreFiliere}}</span>
        <img v-if="toggleFil" class="viewMoreImg" src="./assets/vectorMenuViewMoreBlack.svg" />
        <img v-if="!toggleFil" class="viewMoreImg" src="./assets/vectorMenuViewLessBlack.svg" />
      </button>
      <button class="nomFiliere" v-for="filiere of getFilieres" v-show="!toggleFil" @click="changeTitreFiliere(filiere)">{{ filiere }}</button>
    </div>
    <div class="selecteurClasse">
      <button class="classe" @click="toggleCl = !toggleCl; toggleFiliereClickClasse()">
        <span class="titre">{{titreClasse}}</span>
        <img v-if="toggleCl" class="viewMoreImg" src="./assets/vectorMenuViewMoreBlack.svg" />
        <img v-if="!toggleCl" class="viewMoreImg" src="./assets/vectorMenuViewLessBlack.svg" />
      </button>
      <button class="nomClasse" v-for="classe of getClasses" v-show="!toggleCl" @click="changeTitreClasse(classe.nom); sendClasse(classe.nom)">{{ classe.nom }}</button>
    </div>
  </div>
  {{ sendChecked() }}
</template>

<style scoped>
.bloc {
  display: flex;
  flex-direction: column;
  float: right;
  position: relative;
  right: 2%;
  margin: 20px;

  width: 200px;
}
.nomFiliere {
  border: 1px solid black;
  border-left: 0;
  border-right: 0;
  border-bottom: 0;
  padding: 0 10px 0 10px;
}
.nomClasse {
  border: 1px solid black;
  border-left: 0;
  border-right: 0;
  border-bottom: 0;
  padding: 0 10px 0 10px;
}
.titre {
  font-weight: 600;
  font-size: 16px;
}

button {
  cursor: pointer;
  border: 0px;
  background-color: transparent;
  width: 200px;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0 10px 0 10px;
}

.selecteurFiliere {
  background-color: #eae9e9;
  border-radius: 20px;
  width: 200px;
  margin: 20px;
}

.selecteurClasse {
  background-color: #eae9e9;
  border-radius: 20px;
  width: 200px;
  margin: 0 20px 0 20px;
}

.viewMoreImg {
  width: 15px;
  height: 15px;
  position: inherit;
  margin: 3px 3px 3px 3px;
  justify-content: right;
  border: 0;
}

.titre-principal {
  text-align: center;
  margin-top: 0;
}

.text-rendus {
  background-color: #eae9e9;
  border-radius: 20px;
  width: 200px;
  margin: 20px;
  padding: 20px 10px 20px 10px;

  color: black;
  text-align: left;
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