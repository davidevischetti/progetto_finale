<template>
    <div>
        <div class="container myContainer">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'App',

    }
</script>

<style lang="scss">
    @import "~bootstrap/scss/bootstrap";
    .myContainer {
        height: 100vh;
        border: 3px solid red;
    }
</style>
