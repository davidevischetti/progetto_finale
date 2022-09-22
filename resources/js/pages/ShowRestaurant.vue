<template>
    <div id="showRestaurant">
        <div class="container">
            <ul class="list-unstyled p-4 text-center border-bottom border-5 rounded-0 myBorder">
                <!-- TODO: sarebbe carino riuscire a mettere la foto come una sorta di jumbotron usando il componente già creato -->
                <li class="border-0"><img :src="arrRestInfo.img" :alt="arrRestInfo.name" class=" risto_img" ></li>
                <li class="border-0"><h1>{{arrRestInfo.name}}</h1></li>
                <li class="border-0"><h3>{{arrRestInfo.address}}</h3></li>
            </ul>

            <!-- TODO: aggiungere overflow-scroll per fare lo scroll solo dei piatti oppure alla pagina intera senza le info dei risto-->

            <div class="d-flex justify-content-between" >
                <div class="row col-6 heightScroll overflow-scroll">
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

                <div class="col-6 mb-5 p-4">
                    <ul class="list-group text-capitalize border list-group-flush mb-4 p-4 border-0 shadow bg-body rounded heightScroll overflow-scroll">
                        <li class="list-group-item text-center fs-3 fw-bold">carrello</li>
                        <li class="list-group-item fw-bold">piatti inseriti</li>
                        <li class="list-group-item" v-for="cart in arrCartPlate" :key="cart.id">
                            <span>
                                {{cart.name}} 
                            </span>
                            <div class="cart-item__details-qty">
                                <button>-</button><p>{{plateQuantity}}</p><button @click.prevent="updatePlate(cart)">+</button>
                            </div>                        
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
     props:{
        // TODO: cambiare con string
        id: Number,
     },
    data() {
        return {
            // idRistorante: id,
            arrRestInfo: [],
            arrRestPlate: [],

            
            arrCartPlate: [],
            cartQuantity: 0, //indichiamo il numero totale di articoli aggiunti
            plateQuantity: 1, //indichiamo la quantità del singolo piatto ordinato

            // isAdded: false,
        }
    },
    created(){

        axios.get('/api/category/restaurants/' + this.id).then(response => {
            if (response.data.success) {
                this.arrRestInfo = response.data.infoRestaurant
                this.arrRestPlate = response.data.plates
            }
        })
    },
    methods:{
        addToCart(element){
            // this.isAdded = true;
            if(!this.arrCartPlate.includes(element)){
                
                this.arrCartPlate.push(element);

                console.log('piatto cliccato'); 
            }
        },         
        updatePlate(){   
            this.plateQuantity++; 
        }
    }
}

</script>

<style lang="scss" scoped>
    .heightScroll{
        height: calc(50vh - 40px);
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
        height: 15rem;
    }
</style>
