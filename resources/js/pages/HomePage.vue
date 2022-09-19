<template>
    <div id="myHompage">

        <Jumbotrone></Jumbotrone>
        <div class="container my-4 ">
            <div class="row d-flex justify-content-between  ">
            <CategoriesTop v-for="category in categories" :key="category.id"
            :img="category.img"
            :name="category.name"
            class="myCategory" />
            </div>
        </div>
        <ListaRisto></ListaRisto>
        <Footer></Footer>

        <div class="d-flex justify-content-center">

            <div>
                <div v-for="category in categories" :key="category.id">
                    <a href="#" @click.prevent="assegnaValoreIdCategory(category.id)">{{category.name}}</a>
                </div>
            </div>

            <!-- lista ristoranti -->
            <div>
                <div v-for="rest in arrRestaurants" :key="rest.id">
                    <!-- TODO:rendere dinamico il valore nella funzione, deve essere l'id del ristorante  -->
                    <a href="#" @click.prevent="assegnaValoreIdRest(rest.id)">{{rest.name}}</a>
                </div>
            </div>


            <div>
                <div v-for="restInfo in arrInfoRest" :key="restInfo.id">
                    {{restInfo.name}}
                </div>
            </div>

            <!-- lista piatti -->
            <div>
                <ul>
                    <div v-for="plate in arrPlateRest" :key="plate.id">
                        <li>
                            {{plate.namePlate}}
                        </li>
                    </div>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>

import Jumbotrone from '../components/Jumbotrone.vue';
import CategoriesTop from '../components/CategoriesTop.vue'
import ListaRisto from '../components/ListaRisto.vue';

    export default {
        name: 'HomePage',
        components:{
            Jumbotrone,
            CategoriesTop,
            ListaRisto,
        },
        data() {
            return {

                categories: [], // categorie da mostrare

                // ristoranti filtrati
                arrRestaurants: [], // ristoranti filtrati in base alla categoria
                idcategory: [], // id categoria che si trova nella funzione di ogni categoria per la chiamata api
                idJoinUrl: null,

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
                axios.get('/api/category/restaurants' + '?category=' + this.idJoinUrl).then(response => {
                if (response.data.success) {
                    this.arrRestaurants = response.data.arrRestaurants
                    }
                })
            },
            assegnaValoreIdCategory($num){
                if(!this.idcategory.includes($num)){
                    this.idcategory.push($num);
                } else {
                    const index = this.idcategory.indexOf($num);
                    this.idcategory.splice(index, 1);
                }
                this.idJoinUrl = this.idcategory.join('-');
                console.log(this.idJoinUrl);
                this.getRest();
            },

            // const index = array.indexOf(5);
            // if (index > -1) { // only splice array when item is found
            // array.splice(index, 1); // 2nd parameter means remove one item only
            // }

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

</style>
