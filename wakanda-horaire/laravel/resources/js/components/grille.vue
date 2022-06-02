<script setup >
// const users = ref(usersNoms);

const cols = 7;
const rows = 8;

const app = document.querySelector('#app > #app');
const divGrille = document.createElement("div");
divGrille.classList.add("grille")

app.appendChild(divGrille)

for (let row = 0; row < rows; row++) {
  for (let col = 0; col < cols; col++) {
    const div = document.createElement("div");
    div.classList.add("grid-item");
    divGrille.appendChild(div);
  }
}

</script>


<template>


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