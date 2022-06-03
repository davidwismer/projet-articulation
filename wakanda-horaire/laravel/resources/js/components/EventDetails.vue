<script setup>

</script>

<template>
    <div class='block' width = 200px>
        <img class="imgEvent" src="">
        <div class="text">
            <h2>Titre</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci unde, enim praesentium voluptate
                temporibus fuga saepe ullam quaerat deserunt tempora tempore necessitatibus quasi quae. Fugit obcaecati
                natus dolorem asperiores possimus?</p>
        </div>

    </div>
</template>

<style scoped>
.block {
    background-color: #EAE9E9;
    border-radius: 20px;
    width: 200px;
    height: 400px;
    display: flex;
    flex-direction: column;
}
h2 {
    text-align: center;
    margin-top: 0;
}
.text {
    margin: 20px;
}
.imgEvent {
    width: 100%;
    height: 25%;
    border-radius: 20px 20px 0px 0px;
}
</style>