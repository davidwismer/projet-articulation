<script setup >
import { ref } from "vue";
</script>



<template>
  <div class="sidenav">
    <div class="title">Simple sidebar</div>
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
  width: 200px;
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
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
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