<script setup >
import { ref } from "vue";
</script>



<template>
  <div class="sidenav">
    <!-- <div class="title">Simple sidebar</div> -->
    <div class="menu-items">
      <nav>
        <ul>
          <li>
            <a href="#horaires">Horaires</a>
          </li>
          <li>
            <a href="#notes">Notes</a>
          </li>
          <li>
            <a href="#evenements">Evénements</a>
          </li>
          <li>
            <a href="#notifications">Notifications</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>


    
<style lang="css">
.sidenav {
  /* visibility: hidden; */
  height: 100%;
  width: 250px; /* devra être 2 douzième de la largeur de l'écran */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
  
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #fff;
  display: block;
}

.sidenav a:hover {
  color: #FF0000;
}

li {
  list-style-type: none; /* enlève la bullet aux débuts des éléments "list"
}

.main {
  margin-left: 300px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {
    padding-top: 15px;
  }
  .sidenav a {
    font-size: 18px;
  }
}
</style> 