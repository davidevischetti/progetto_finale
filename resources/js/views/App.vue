<template>
    <div>
        <NavBar></NavBar>
        <div>
            <router-view></router-view>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
    import NavBar from '../components/NavBar.vue';
    import Footer from '../components/Footer.vue';

    export default {
        name: 'App',
        components: {
            NavBar,
            Footer
        }
    }
</script>

<style lang="scss">
    @import "~bootstrap/scss/bootstrap";
</style>
