<template>
    <div id="myHompage">

        <Jumbotrone></Jumbotrone>
        <ListaRisto></ListaRisto>
        <Footer></Footer>

        <div class="d-flex justify-content-center">

            <div>
                <!-- lista categorie -->
                <div>
                    <a href="#" @click.prevent="assegnaValoreIdCategory(1)" >italiano</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValoreIdCategory(2)" >pizza</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValoreIdCategory(3)" >giapponese</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValoreIdCategory(4)" >messicano</a>
                </div>
                <div>
                    <a href="#" @click.prevent="assegnaValoreIdCategory(5)" >kebab</a>
                </div>
            </div>

            <!-- lista ristoranti -->
            <div>
                <div v-for="rest in arrRestaurants" :key="rest.id">
                    <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                    <a href="#" @click.prevent="assegnaValoreIdRest(1)">{{rest.name}}</a>
                </div>
            </div>

            <!-- lista piatti -->
            <div>
                <div v-for="plate in arrPlateRest" :key="plate.id">
                    <h1>
                        {{plate.name}}
                    </h1>
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

                categories: [], // categorie da mostrare

                // ristoranti filtrati
                arrRestaurants: [], // ristoranti filtrati in base alla categoria
                idcategory: null, // id categoria che si trova nella funzione di ogni categoria per la chiamata api

                // piatti filtrati in base al ristorante
                arrInfoRest: [],
                arrPlateRest: [],
                idRistorante : null,


            }
        },
        created() {
            this.getCategory();
        },
        methods: {
            // chiamata per mostrare le categorie
            getCategory(){
                axios.get('/api/categories').then(response => {
                if (response.data.success) {
                    this.categories = response.data.categories
                    }
                })
            },

            // chiamata per i ristoranti in base alla categoria
            getRest(){
                axios.get('/api/category/restaurants' + '?category=' + this.idcategory).then(response => {
                if (response.data.success) {
                    this.arrRestaurants = response.data.arrRestaurants
                    }
                })
            },
            assegnaValoreIdCategory($num){
                this.idcategory = $num;
                this.getRest();
            },

            // chiamata per i ristoranti in base alla categoria
            getPlate(){
                axios.get('/api/category/restaurants/' + this.idRistorante).then(response => {
                if (response.data.success) {
                    this.arrPlateRest = response.data.plateRestaurant
                    this.arrPlateRest = response.data.infoRestaurant
                    }
                })
            },
            assegnaValoreIdRest($num){
                this.idRistorante = $num
                this.getPlate()
            },
        },
    }
</script>

<style lang="scss" scoped>
</style>
