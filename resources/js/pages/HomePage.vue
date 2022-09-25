<template>
    <div id="myHomepage">

        <Jumbotrone></Jumbotrone>
        <div class="container">
            <div class="row">

                <!-- Categorie e Lista ristoranti -->
                <div class="col-12 categories_on">
                    <!-- Lista Categorie -->
                    <div class="row w-100 d-flex rowCat justify-content-between my-4">
                        <div @click.prevent="assegnaValoreIdCategory(category.id)" :class="arrElements.includes(i) && arrTrueOrFalse ? 'upcat' : ''"  class="col-md-4 col-lg-3 col-xxl-2 col-6 text-decoration-none text-dark"  v-for="(category, i) in categories" :key="i">
                            <div class="card myCateg myShadow" @click.prevent="activeBorder(i)" :class="arrElements.includes(i) && arrTrueOrFalse ? 'myactive' : ''">
                                <img :src="`/storage/${category.img}`" :alt="category.name" class="card-img myCategImg">
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
                <div class="heightScroll overflow-auto">
                    <!-- lista ristoranti -->
                    <div class="row justify-content-between">
                        <div v-for="rest in arrRestaurants" :key="rest.id" class="card col-12 col-lg-6 mb-3 myRisto border-0 shadow bg-body rounded" >
                            <div class="row">
                                <div class="col-md-4 p-0 contain_img">
                                    <img :src="`/storage/${rest.img}`" :alt="rest.name" class="myRistoImg img-fluid rounded" >
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-0 ms-2 h-100 d-flex align-items-center">
                                        <router-link :to="{name: 'show', params: {id: rest.id} }" class="card-title text-decoration-none text-dark text-capitalize">
                                            <div class="fs-5 fw-bold">
                                                {{rest.name}}
                                            </div>
                                            <div>
                                                {{rest.address}}
                                            </div>
                                            <span v-for="category in rest.category">
                                                <strong>
                                                    &middot;
                                                </strong>
                                                {{category.name}}
                                            </span>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" v-if="arrRestaurants.length == 0 && arrElements.length > 1">
                        <div class="col-6">
                            <!-- TODO: fix scritta -->
                            <div class="alert alert-danger" role="alert">
                                <span>Mi dispiace la tua ricerca non ha prodotto risultati. 
                                    <strong>Riprova</strong>
                                </span>
                            </div>
                        </div>

                    </div>

                    <!-- Lista ristoranti random -->
                    <div class="row justify-content-between" v-if="arrRestaurants.length == 0 && arrElements.length == 0">
                            <div v-for="rand in arrRandomRest" :key="rand.id" class="card mb-4 myRisto col-12 col-lg-6 border-0 shadow bg-body rounded" >
                                <div class="row wrap_rist d-flex">
                                    <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                                    <div class="col-4 p-0 contain_img">
                                    <router-link :to="{name: 'show', params: {id: rand.id} }"><img :src="`/storage/${rand.img}`" :alt="rand.name" class="myRistoImg img-fluid rounded"></router-link>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body p-0 ms-2 h-100 d-flex align-items-center">
                                            <router-link :to="{name: 'show', params: {id: rand.id} }" class="card-title text-decoration-none text-dark text-capitalize">
                                                <div class="fs-5 fw-bold">
                                                    {{rand.name}}
                                                </div>
                                                <div>
                                                    {{rand.address}}
                                                </div>
                                                <span v-for="category in rand.category">
                                                    <strong>
                                                        &middot;
                                                    </strong>
                                                    {{category.name}}
                                                </span>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TODO: rivedere il lato responsive -->

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
    .heightScroll {
        min-height: 500px;
    }
    #myHomepage{
        background-color: #FFE6D8;
    }
    .categories_on{
        margin-top: -200px;
        height: auto;
    }
    .rowCat{
        flex-wrap: nowrap;
        height: 300px;
        overflow-x: auto;
        align-items: flex-end;
        padding-bottom: 5px;
    }

    .myCateg{
        width: 200px;
        height: 200px;
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
        max-width: 40rem;
        height: 8rem !important;
    }
    .contain_img{
        height: 8rem;
        width: 12rem;
    }
    .wrap_rist{
        flex-wrap: nowrap;
    }
    .myRistoImg{
        height: 100%;
        object-fit: cover;
    }

    .myCateg.myactive{
        transform:translate(0, -36px);
        border-bottom: 5px solid #d43a1c;
        color: red !important;
    }
    .upcat{
        transform:translate(0, -36px);
    }
    .myShadow {
        box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.5) !important;
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
</style>
