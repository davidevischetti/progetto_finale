<template>
    <div>
        <div class="container myContainer">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import HomePage from '../pages/HomePage.vue';
    export default {
        name: 'App',
        components: {
            HomePage,
        }
    }
</script>

<style lang="scss">
    @import "~bootstrap/scss/bootstrap";
    .myContainer {
        height: 100vh;
        border: 3px solid red;
    }
</style>
