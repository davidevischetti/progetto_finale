<template>
    <div id="myHomepage">

        <Jumbotrone></Jumbotrone>
        <div class="container">
            <div class="row">
              
                <!-- Categorie e Lista ristoranti -->
                <div class="col-12 categories_on">
                    <!-- Lista Categorie -->
                    <div class="row d-flex justify-content-between my-4">
                        <div @click.prevent="assegnaValoreIdCategory(category.id)" class="col-2 text-decoration-none text-dark"  v-for="(category, i) in categories" :key="i">
                            <div class="card myCateg" @click.prevent="activeBorder(i)" :class="arrElements.includes(i) && arrTrueOrFalse ? 'myactive' : ''">
                                <img :src="category.img" :alt="category.name" class="card-img myCategImg">
                                <div class="card-img-overlay p-0 d-flex align-items-end">
                                    <p class="card-text text-capitalize text-center fs-4 my_text_cat col-12"> {{category.name}} </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
                <!-- Pulsante reset filtri -->
                <div class="col-12 d-flex align-items-center justify-content-start my-4 myButton">
                    <button class="btn btn-primary border-0 rounded-pill px-4 my_btn" @click.prevent="resetCategory()">Cancella filtri</button>
                </div>

                <div class="col-12">
                    <!-- lista ristoranti -->
                    <div class="row">
                        <div class="col-6">
                            <div v-for="rest in arrRestaurants" :key="rest.id" class="card mb-3 myRisto" >
                                <div class="row g-0">
                                    <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                                <div class="col-md-4 d-flex align-items-center ">
                                    <img :src="rest.img" :alt="rest.name" class="myRistoImg img-fluid rounded" >
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body ms-2  ">
                                        <router-link :to="{name: 'show', params: {id: rest.id} }" class="card-title text-decoration-none text-dark text-capitalize">
                                            <div class="fs-5 fw-bold">{{rest.name}}</div>
                                            <div>{{rest.address}}</div>
                                            <div v-for="category in rest.category">
                                                {{category.name}}
                                            </div>
                                        </router-link>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" v-if="arrRestaurants.length == 0 && arrElements.length > 1">
                        <div class="col-6">
                            <!-- TODO: fix scritta -->
                            <div class="alert alert-danger" role="alert">
                                La tua ricerca non ha prodotto risultati.
                            </div>
                        </div>

                    </div>

                    <!-- Lista ristoranti random -->
                    <div class="row justify-content-between" v-if="arrRestaurants.length == 0 && arrElements.length == 0">
                            <div v-for="rand in arrRandomRest" :key="rand.id" class="card mb-3 myRisto col-5 " >
                                <div class="row g-0">
                                    <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                                    <div class="col-md-4 d-flex align-items-center ">
                                        <img :src="rand.img" :alt="rand.name" class="myRistoImg img-fluid rounded">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body ms-2  ">
                                            <router-link :to="{name: 'show', params: {id: rand.id} }" class="card-title text-decoration-none text-dark text-capitalize">
                                                <div class="fs-5 fw-bold">{{rand.name}}</div>
                                                <div>{{rand.address}}</div>
                                                <div v-for="category in rand.category">
                                                    {{category.name}}
                                                </div>
                                            </router-link>
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
                idcategory: [], // id categoria che si trova nella funzione di ogni categoria per la chiamata api


                // piatti filtrati in base al ristorante
                arrInfoRest: [],
                arrPlateRest: [],
                idRistorante : null,


                arrElements: [],
                arrTrueOrFalse: [],
                index: null,

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
                if (this.idcategory.includes($num)) {
                    let position = this.idcategory.indexOf($num)
                    this.idcategory.splice(position, 1)
                } else {
                    this.idcategory.push($num);
                }

                this.getRest();
            },


            activeBorder(element) {
                if(!this.arrElements.includes(element)) {
                    this.arrElements.push(element);
                    this.arrTrueOrFalse.push(true);

                } else if (this.arrTrueOrFalse[0] === true){ // this.arrTrueOrFalse[0]
                    this.index = this.arrElements.indexOf(element);
                    this.arrTrueOrFalse.splice(0, 1)
                    this.arrElements.splice(this.index, 1)
                }
            },

            resetCategory(){
                this.arrElements = [];
                this.arrTrueOrFalse = [];
                this.arrRestaurants = []; 
            }
        }
    }
</script>

<style lang="scss" scoped>

    .categories_on{
        margin-top: -130px;
    }

    .myCateg{
        width: 12rem;
        height: 12rem;
        border: none;
        border-radius: 10px !important;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    .myCategImg{
        height: 100%;
        object-fit: cover;
    }

    .myRisto{
        max-width: 540px;
    }
    .myRistoImg{
        width: 12rem;
        height: auto;
    }

    .myCateg.myactive{
        //margin-top: -36px;
        //transition: all 0.2s ease-in-out;
        transform:translate(0, -36px);
        border-bottom: 5px solid #d43a1c;
        color: red !important;
    }

    .myButton{
        //height: 12rem;
    }

    .my_btn{
        background-color: #d43a1c;
        color: white;
        &:hover{
            background-color: #ff5735;
            color:white;
        }
    }
    
    .my_text_cat{
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 5px 0;
        border-radius: 0 0 5px 5px;
    }

    #myHomepage{
        background-color: #FFE6D8;
    }
</style>
