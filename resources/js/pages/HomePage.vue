<template>
    <div id="myHompage">

        <Jumbotrone></Jumbotrone>
        <div class="container">
            <div class="row">

                <!-- Pulsante reset filtri -->
                <div class="col-1 d-flex align-items-center justify-content-center my-4 myButton">
                    <button class="btn btn-primary border-0 my_btn" @click.prevent="resetCategory()">Reset</button>
                </div>

                <!-- Categorie e Lista ristoranti -->
                <div class="col-11">
                    <!-- Lista Categorie -->
                    <div class=" row d-flex justify-content-between my-4">
                        <a href="#" @click.prevent="assegnaValoreIdCategory(category.id)" class="col-4 text-decoration-none text-dark"  v-for="(category, i) in categories" :key="i">
                            <div class="card myCateg" @click="activeBorder(i)" :class= "activeCard.includes(i) && isActive ? 'myactive' : ''">
                                <img :src="category.img" :alt="category.name" class="card-img-top  rounded-3 myCategImg">
                                <div class="card-body">
                                    <p class="card-text text-capitalize text-center fs-5"> {{category.name}} </p>
                                </div>
                            </div>

                        </a>
                    </div>

                    <!-- lista ristoranti -->
                    <div class="row">
                        <div class="col-6">
                            <div v-for="rest in arrRestaurants" :key="rest.id" class="card mb-3 myRisto" >

                                <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                                <div class="col-md-4">
                                    <img :src="rest.img" :alt="rest.name" class="myRistoImg" >
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <router-link :to="{name: 'show', params: {id: rest.id} }" class="card-title">{{rest.name}}</router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lista ristoranti random -->
                    <div class="row" v-if="arrRestaurants.length == 0">
                        <div class="col-6">
                            <div v-for="rand in arrRandomRest" :key="rand.id" class="card mb-3 myRisto" >
                                <div class="row g-0">
                                    <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                                <div class="col-md-4 d-flex align-items-center ">
                                    <img :src="rand.img" :alt="rand.name" class="myRistoImg img-fluid rounded" >
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body ms-2  ">
                                        <router-link :to="{name: 'show', params: {id: rand.id} }" class="card-title text-decoration-none text-dark text-capitalize">
                                            <div class="fs-5 fw-bold">{{rand.name}}</div> 
                                            <div>{{rand.address}}</div> 
                                        </router-link>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- TODO: stampa di ristoranti randomici nella homepage prima della selezione categories -->
        <!-- TODO: stampa immagini da storage -->
        <!-- TODO:al secondo click l'active si deve togliere -->
        <!-- TODO:le categorie non devono essere esclusive non si possono selezionare più categorie contemporaneamente -->

    

        
    </div>
</template>

<script>

import isFlattenable from 'lodash/_isFlattenable';
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


                activeCard: [],
                isActive: false,

                arrRandomRest: null

            }
        },
        created() {
            this.getCategory();
            axios.get('/api/restaurant/random').then(response => {
                if (response.data.success) {
                    this.arrRandomRest = response.data.randomRest
                }
            })
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
                // this.getInfoRest();
                // this.getPlateRest();
            },

            activeBorder(element) {
                // this.isActive = false;
                // if(this.isActive == false){
                    this.activeCard.push(element); 
                     this.isActive = true; 
                // }else{
                //     index = this.activeCard.indexOf(element);
                //     this.activeCard.splice(index, 1);
                //     this.isActive = false;
                // }

                // some code to filter users
                console.log("funziona");
                console.log(element);
            },

            resetCategory(){
                console.log("Ciao");
                this.arrRestaurants = [];
                this.isActive = false;
                console.log(this.arrRestaurants);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .myCateg{
        width: 12rem;
        height: 12rem;
        border: none;
    }

    .myCategImg{
        height: 100%;
    }

    .myRisto{
        max-width: 540px;
    }
    .myRistoImg{
        width: 12rem;
        height: auto;
    }

    .card.myactive{
        border: 3px solid #d43a1c;
        color: red !important; 
    }

    .myButton{
        height: 12rem;
    }

    .my_btn{
        background-color: #d43a1c;
        color: white;
        &:hover{
            background-color: #ff5735;
            color:white;
        }
    }
    // .my_list_risto{
    //     min-height: 400px;
    // }
</style>
