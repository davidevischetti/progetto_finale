<template>
    <div>
        <NavBar></NavBar>
        <Jumbotrone></Jumbotrone>
        <ShowRisto></ShowRisto>
        <Footer></Footer>
    </div>
</template>

<script>
import NavBar from './NavBar.vue';
import Jumbotrone from './Jumbotrone.vue';
import ShowRisto from './ShowRisto.vue';
import Footer from './Footer.vue';
    export default {
        name: 'HomePage',
        components:{
            NavBar,
            Jumbotrone,
            ShowRisto,
            Footer,
        }
    }
</script>

<style lang="scss" scoped>
    
</style>
