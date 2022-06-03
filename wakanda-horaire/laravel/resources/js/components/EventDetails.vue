<script>
export default {
    props: ['titre', 'description'],
}
</script>

<template>
    <div class='block' width=200px>
        <img class="imgEvent"
            src="https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg">
        <div class="contenu">
            <h2>{{ titre }}</h2>
            <p>{{ description }}</p>
            <button>S'INSCRIRE</button>
        </div>
    </div>
</template>

<style scoped>
.block {
    background-color: #EAE9E9;
    border-radius: 20px;
    width: 200px;
    display: flex;
    flex-direction: column;
}

h2 {
    text-align: center;
    margin-top: 0;
}

.contenu {
    margin: 20px;
    align-items: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.imgEvent {
    width: 100%;
    height: 25%;
    border-radius: 20px 20px 0px 0px;
}

button {
    background-color: #C83C2B;
    color: white;
    text-align: center;
    padding: 5px 10px;
    border: 0px;
    border-radius: 20px;
}
</style>