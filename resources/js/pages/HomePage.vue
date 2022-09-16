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
        },
        data() {
            return {
                categories: [],
            }
        },
        created() {
            axios.get('api/restaurants').then(response => {
                if (response.data.success) {
                    this.categories = response.data.categories
                }
            })
        },
    }
</script>

<style lang="scss" scoped>
</style>
