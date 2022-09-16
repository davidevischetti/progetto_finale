<template>
    <div id="myHompage">

        <Jumbotrone></Jumbotrone>
        <ListaRisto></ListaRisto>
        <Footer></Footer>
    </div>
</template>

<script>

import Jumbotrone from '../components/Jumbotrone.vue';
import ListaRisto from '../components/ListaRisto.vue';
import Footer from './Footer.vue';
    export default {
        name: 'HomePage',
        components:{

            Jumbotrone,
            ListaRisto,
            Footer,
        }
    }
</script>

<style lang="scss" scoped>
</style>
