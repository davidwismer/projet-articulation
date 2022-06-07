<script setup>
import { ref } from "vue";

const props = defineProps({
  branche: {
    type: Object,
    required: true,
  },
  module: {
    type: Object,
    required: true,
  },
});
</script>
 
<template>
  <div id="divMom" :id="branche.id">
    <button class="viewMoreButton"> <!-- or viewLess -->
      <img class="viewMoreImg" src="./assets/vectorNotesViewMore.svg" />
    </button>
    <div id="firstFloor">
      <div id="titre" class="compoBox titre">
        <h1>{{ branche.dimin }}</h1>
      </div>
      <div class="compoBox note1">
        <p>Note 1</p>
      </div>
      <div class="compoBox note2">
        <p>Note 2</p>
      </div>
      <div class="compoBox note3">
        <p>Note 3</p>
      </div>
      <div class="compoBox moyenne">
        <p>Moyenne</p>
      </div>
    </div>
    <!-- Deuxième niveau :-->
    <div id="secondFloor">
      <div class="compoBox titre">
        <p>Notes :</p>
        <!-- ça affiche ce que je veux correctement -->
      </div>
      <div class="compoBox note1">
        <p>une note</p>
      </div>
      <div class="compoBox note2">
        <p>une note</p>
      </div>
      <div class="compoBox note3">
        <p>une note</p>
      </div>
      <div class="compoBox moyenne">
        <p>une moyenne</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
.compoBox {
  display: inline-block;
  text-align: center;
}

.titre {
  margin-left: 10px;
}

.note1 {
  margin-left: 50px;
}

.note2 {
  margin-left: 100px;
}

.note3 {
  margin-left: 150px;
}

.moyenne {
  margin-left: 200px;
}

#divMom {
  width: 80%;
  padding: 10px;
  border: 5px solid v-bind("module.couleur");
  margin: 0;
}

h1 {
  color: v-bind("module.couleur");
}

p {
  font-style: italic;
}
</style>