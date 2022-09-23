<template>
    <div>
        <NavBar></NavBar>
        <!-- <div> -->
            <router-view></router-view>
        <!-- </div> -->
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
    ::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
</style>
