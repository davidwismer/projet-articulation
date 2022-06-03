<script setup >
import { ref } from "vue";
import { page } from "../state.js";

window.addEventListener("hashchange", () => {
  page.value = window.location.hash;
});

const props = defineProps({
    routes: {
      type: Object,
      required: true
    },
    curHash: {
      type: String,
      required: true
    }
  });
</script>

<template>
  <div class="sidenav">
    <nav>
      <ul>
        <li class="menu-items" v-for="(route, hash) of routes">     
        <a :href="hash" :class="{ active: hash == curHash }">
          {{ route.label }}
        </a>
      </li>
        <li class="menu-items" id="li-user">
          <a href="#user">Mon compte</a>
        </li>
      </ul>
    </nav>
  </div>
</template>
    
<style lang="css" scoped>
.sidenav {
  /* visibility: hidden; */
  height: 100%;
  width: 200px; /* devra être 2 douzième de la largeur de l'écran */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 24px 6px 24px 0px;
  text-decoration: none;
  font-size: 20px;
  color: #fff;
  display: block;
}

.sidenav a:hover {
  color: #ff0000;
}

li {
  list-style-type: none; /* enlève la bullet aux débuts des éléments "list" */
}

#li-user {
  position: absolute;
  bottom: 32px;
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