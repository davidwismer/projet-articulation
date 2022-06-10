<script setup >
import { ref } from "vue";
import { page } from "../state.js";
import {user} from "../state.js";

window.addEventListener("hashchange", () => {
  page.value = window.location.hash;
});

const props = defineProps({
  routes: {
    type: Object,
    required: true,
  },
  curHash: {
    type: String,
    required: true,
  },

  
});

async function logout() {

    await axios.get("/sanctum/csrf-cookie");
    const userdata = await axios.get("/logout");
    window.location="/";
}


</script>

<template>
  <div class="sidenav">
    <nav>
      <ul>
        <li class="menu-items" v-for="(route, hash) of routes">
          <div>
            <a :id="route.id" :href="hash" :class="{ active: hash == curHash }">
              {{ route.label }}
            </a>
          </div>
        </li>

        <div v-if ="user !== null" @click="logout()">
        <button id="logout" a href="#logout">Déconnexion</button>
        </div>
        
      </ul>
    </nav>
  </div>
</template>
    
<style lang="css" scoped>
.sidenav {
  /* visibility: hidden; */
  height: 100%;
  width: 180px; /* devra être 2 douzième de la largeur de l'écran */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #444444;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 24px 15px 24px 15px;
  text-decoration: none;
  font-size: 20px;
  color: #fff;
  display: block;

}

.sidenav a:hover {
  color: #ff0000;
}

li, #logout {
  list-style-type: none; /* enlève la bullet aux débuts des éléments "list" */
}

#login, #logout {
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

div > .active, #logout {
  
  background-color: #f6f6f6;
  border-radius: 20px 0px 0px 20px;
  color: black;
}
</style> 