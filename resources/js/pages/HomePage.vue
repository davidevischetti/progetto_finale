<template>
    <div id="myHompage">

        <Jumbotrone></Jumbotrone>
        <ListaRisto></ListaRisto>
        <Footer></Footer>

        <div class="d-flex justify-content-center">
            <!-- <div class="me-4">
                <div v-for="restaurant in restaurants" :key="restaurant.id">
                    {{restaurant.name}}
                </div>
            </div> -->
            <!-- <div>
                <div v-for="category in categories" :key="category.id">
                    {{category.name}}
                </div>
            </div> -->
            <!-- ristoranti filtrati -->

            <div>
                <div v-for="rest in arrRestaurants" :key="rest.id">
                    {{rest.name}}
                </div>
            </div>

            <div>
                <div>
                    <a href="#" @click.prevent="assegnaValore(1)" >italiano</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValore(2)">pizza</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValore(3)">giapponese</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValore(4)">messicano</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValore(5)">kebab</a>
                </div>
            </div>
        </div>

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
                arrRestaurants: [],
                idcategoy: null,
            }
        },
        created() {
            this.getRest()
        },
        methods: {
            getRest(){
                axios.get('api/restaurants' + '?category=' + this.idcategoy).then(response => {
                if (response.data.success) {
                    this.categories = response.data.categories
                    this.arrRestaurants = response.data.arrRestaurants
                    }
                })
            },
            assegnaValore($num){
                this.idcategoy = $num;
                return this.getRest();
            }
        },
        computed:{
        }

    }
</script>

<style lang="scss" scoped>
</style>
