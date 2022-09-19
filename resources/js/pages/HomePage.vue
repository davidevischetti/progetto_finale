<template>
    <div id="myHompage">

        <Jumbotrone></Jumbotrone>
        <div class="container my-4"  >
            <div class=" row d-flex justify-content-between">
                <a href="#" @click.prevent="assegnaValoreIdCategory(category.id)" class="card myCateg col-4 border-0 text-decoration-none text-dark" v-for="category in categories" :key="category.id">
                <img :src="category.img" :alt="category.name" class="card-img-top  rounded-3 myCategImg">
                <div class="card-body">
                    <p class="card-text text-capitalize text-center fs-5"> {{category.name}} </p>
                </div>
            </a>
            </div>
        </div>

        <!-- TODO: stampa di ristoranti randomici nella homepage prima della selezione categories -->
        <!-- TODO: stampa immagini da storage -->

    <!-- lista ristoranti -->
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div v-for="rest in arrRestaurants" :key="rest.id" class="card  mb-3 myRisto" >
                    
                        <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                        <div class="col-md-4">
                            <img :src="rest.img" :alt="rest.name" class="myRistoImg" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="#" @click.prevent="assegnaValoreIdRest(rest.id)" class="card-title">{{rest.name}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lista piatti -->
                <div class="col-6">
                        <ul class="list-group">
                            <div v-for="plate in arrPlateRest" :key="plate.id"  class="card  mb-2" style="width: 18rem;">
                                <li  class="card-body list-group-item">
                                    {{plate.namePlate}}
                                </li>
                            </div>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Jumbotrone from '../components/Jumbotrone.vue';

    export default {
        name: 'HomePage',
        components:{
            Jumbotrone,
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
            getInfoRest(){
                axios.get('/api/category/restaurants/' + this.idRistorante).then(response => {
                    if (response.data.success) {
                        this.arrInfoRest = response.data.infoRestaurant
                        // this.arrPlateRest = response.data.plateRestaurant
                    }
                })
            },
            getPlateRest(){
                axios.get('/api/plates' + '?userId=' + this.idRistorante).then(response => {
                    this.arrPlateRest = response.data.data
                    // if (response.data.success) {
                    // }
                })
            },
            assegnaValoreIdRest($num){
                this.idRistorante = $num;
                this.getInfoRest();
                this.getPlateRest();
            }
        }
    }
</script>

<style lang="scss" scoped>
    .myCateg{
        width: 12rem;
        height: 12rem;

    }

    .myCategImg{
        height: 100%;  
    }
    
    .myRisto{
        max-width: 540px;
    }
    .myRistoImg{
        width: 80px;
        height: 40px;
    }
</style>
