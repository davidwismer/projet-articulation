<script setup >
import { ref } from "vue";
import { page } from "../state.js";
import { user } from "../state.js";
import logo from "./logo.vue";

window.addEventListener("hashchange", () => {
  page.value = window.location.hash;
});


let display = ref(false);


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
  window.location = "/";
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
        <div v-if="user !== null" @click="logout()">
          <button id="logout" a href="#logout">Déconnexion</button>
        </div>
      </ul>
    </nav>
    <logo id="logo"></logo>
  </div>
</template>
    
<style lang="css" scoped>
.sidenav {
  visibility: visible;
  height: 100%;
  width: 180px; /* devra être 2 douzième de la largeur de l'écran */
  position: fixed;
  display:block;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #444444;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 24px 15px 24px 15px;
  width: 150px;
  text-decoration: none;
  font-size: 18px;
  color: #fff;
  display: block;
}

#logo {
  position: absolute;
  bottom: 30px;
}

#logout {
  padding: 24px 15px 24px 15px;
  width: 150px;
  text-decoration: none;
  font-size: 18px;
  color: #fff;
  background-color: transparent;
  display: block;
  border: 0;
  text-align: left;
}

.sidenav a:hover {
  color: #ff0000;
}

.sidenav button:hover {
  color: #ff0000;
}

li,
#logout {
  list-style-type: none; /* enlève la bullet aux débuts des éléments "list" */
}

#login,
#logout {
  position: absolute;
  bottom: 90px;
}
div > .active {
  background-color: #f6f6f6;
  border-radius: 20px 0px 0px 20px;
  color: black;
}










@media screen and (max-width: 450px) {
  .sidenav {
  visibility: hidden;
  }

  #burger {
  width: 42px;
  height: 24px;
  cursor: pointer;
  position: relative;
}

#burger span {
  width: 100%;
  height: 4px;
  background-color: black;
  display: block;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
    border-radius: 25px;
}

#burger span::before, #burger span::after{
  content:'';
  position:absolute;
  width:100%;
  height:4px;
  background-color:black;
  border-radius: 25px;
}

#burger span::before {
  transform: translateY(-10px);
}

#burger span::after {
  transform: translateY(10px);
}


}


</style> 