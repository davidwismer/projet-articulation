<script setup>
const props = defineProps(['titre', 'description', 'lieu', 'dateDebut', 'dateFin']);

//Description format
const shortDesc = props.description.substr(0, 80)
//Date Debut format
const dateD = new Date(props.dateDebut);
const monthDeb = ["janvier", "fevrier", "mars", "avril", "mai", "juin",
    "juillet", "aout", "septembre", "octobre", "novembre", "decembre"][dateD.getMonth()];
const dateDeb = dateD.getDate() + ' ' + monthDeb;
//DateFin format
const dateF = new Date(props.dateFin);
const monthFin = ["janvier", "fevrier", "mars", "avril", "mai", "juin",
    "juillet", "aout", "septembre", "octobre", "novembre", "decembre"][dateF.getMonth()];
const dateFin = dateF.getDate() + ' ' + monthFin;
const annee = dateF.getFullYear();
</script>

<template>
    <div class='block' width=200px>
        <img class="imgEvent"
            src="https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg">
        <div class="contenu">
            <h2>{{ titre }}</h2>
            <ul class="liste">
                <li>du {{ dateDeb }} au {{ dateFin }} {{ annee }}</li>
                <li>{{ lieu }}</li>
            </ul>
            <p>{{ shortDesc }}... <a href="" class="lireSuite">Lire la suite</a></p>
        </div>
    </div>
</template>

<style scoped>
.block {
    background-color: #EAE9E9;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    margin-bottom: 50px;
}

h2 {
    margin-top: 0;
}

.liste {
    list-style-type: '- ';
}

.contenu {
    margin: 20px;
    display: flex;
    flex-direction: column;
    align-items: left;
}

.imgEvent {
    width: 100%;
    height: 150px;
    border-radius: 20px 20px 0px 0px;
}
</style>