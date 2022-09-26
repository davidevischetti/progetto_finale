<template>
    <div id="showRestaurant">
        <div class="container">
            <div class=" d-flex align-items-center p-4 text-center border-bottom border-5 rounded-0 myBorder">
                <!-- TODO: sarebbe carino riuscire a mettere la foto come una sorta di jumbotron usando il componente già creato -->
                <div class="">
                    <img :src="`/storage/${arrRestInfo.img}`" :alt="arrRestInfo.name" class="rounded-4 risto_img"/>
                </div>
                <div class="px-5 text-start text-capitalize">
                    <h1>
                    {{arrRestInfo.name}}
                    </h1>
                    <h3>
                        {{arrRestInfo.address}}
                    </h3>
                </div>
            </div>

            <!-- TODO: aggiungere overflow-scroll per fare lo scroll solo dei piatti oppure alla pagina intera senza le info dei risto-->

            <div class="d-flex wrap justify-content-between" >
                <div class="row col-lg-6 col-12  heightScroll overflow-auto">
                    <ul class="list-group mb-5 p-4">
                        <div v-for="plate in arrRestPlate" :key="plate.id" class="list-group-flush mb-4 p-4 shadow bg-body rounded">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fs-3 fw-bold">{{plate.name}} </p>
                                    <span class="float-end"><button class="btn btn_color" @click.prevent="addToCart(plate)">ADD</button></span>
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold">Descrizione: </span>
                                <span>{{plate.description}}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold">Ingredienti: </span>
                                <span> {{plate.ingredients}}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold">Prezzo:</span>
                                <span>{{plate.price}} € </span>
                            </li>
                        </div>
                    </ul>
                </div>

                <div class="col-lg-6 col-12 mb-5 p-4">
                    <ul class="list-group text-capitalize border list-group-flush mb-4 p-4 border-0 shadow bg-body rounded heightScroll overflow-auto">
                        <li class="list-group-item text-center fs-3 fw-bold">carrello</li>
                        <li class="list-group-item fw-bold">piatti inseriti</li>
                        <li class="list-group-item" v-for="cart in arrCartPlate" :key="cart.id">
                            <span class="d-flex justify-content-between">
                                <span>{{cart.name}}</span><button @click.prevent="removePlate(cart)" class="btn btn-outline-danger py-0 px-2 ">X</button>
                            </span>


                                <!-- <p>{{plateQuantity}}</p> -->
                                <!-- <button @click.prevent="updatePlate(cart)">+</button> -->
                        </li>
                    </ul>
                    <router-link :to="{name: 'cart', params: {arrCartPlate: this.arrCartPlate} }"><button class="btn btn_color text-capitalize ">procedi con il pagamento</button></router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<!-- TODO: implementare funzione che collega i piatti alla sezione carrello nella pagina -->
<!-- TODO: il button "procedi la pagamento" deve collegarsi al componente carrello e caricare quella pagina -->

<script>
export default {
    name: 'ShowRestaurant',

    // components: {
    // },
     props:['id'],
    data() {
        return {
            // idRistorante: id,
            arrRestInfo: [],
            arrRestPlate: [],

            arrCartPlate: [],

            cartQuantity: 0, //indichiamo il numero totale di articoli aggiunti
            plateQuantity: 1, //indichiamo la quantità del singolo piatto ordinato

            // isAdded: false,
            // idRest: this.id,
        }
    },
    created(){

        axios.get('/api/category/restaurants/' + this.id).then(response => {
            if (response.data.success) {
                this.arrRestInfo = response.data.infoRestaurant
                this.arrRestPlate = response.data.plates
            }
        })

        // this.prova();

    },

    mounted() {
        if (localStorage.getItem('arrCartPlate')) {
            try {
                this.arrCartPlate = JSON.parse(localStorage.getItem('arrCartPlate'));
            }
            catch(e) {
                localStorage.removeItem('arrCartPlate');
            }
        }
    },

    //dobbiamo salvare gli elementi dell'array arrCartPlate in local storage
    //nella funzione addtocart dobbiamo
    methods:{
        addToCart(element){
            this.arrCartPlate.push(element);
            this.savePlate();
        },

        savePlate(){
            const parsed = JSON.stringify(this.arrCartPlate);
            localStorage.setItem('arrCartPlate', parsed);
        },

        updatePlate(){
            this.plateQuantity++;
        },

        removePlate(element){
            if(this.plateQuantity > 1){
                this.plateQuantity--;
            } else if(this.plateQuantity <= 1){
                let myindex = this.arrCartPlate.indexOf(element);
                this.arrCartPlate.splice(myindex, 1);
                console.log("Hai rimosso questo elemento");
            }
            this.savePlate();
        },

    //     prova(){
    //         if(this.idRest != this.id){
    //             localStorage.clear();
    //             // this.idRest=this.id;
    //         }
    //    }
    }
}

</script>

<style lang="scss" scoped>
    .heightScroll{
        height: 800px;
    }
    #showRestaurant{
        background-color: #ffe6d8;
        // height: 100vh;
        // TODO: bisogna dare una misura alla NavBar così da fare con il calc() altrimenti non si riesce a fare lo scroll
    }
    .myBorder{
        border-color: #d43a1c !important;

    }

    .btn_color{
        background-color: #d43a1c;
        color:white;
        &:hover{
            background-color: #ff5735;
            color:white;
        }
    }
    .risto_img{
        // height: 15rem;
        width: 35rem;
        box-shadow: 0 0.75rem 0.75rem rgba(0, 0, 0, 0.5) !important;
    }
    .wrap{
        flex-wrap: wrap;
    }
</style>
