<template>
    <div id="showRestaurant">
        <div class="container">
            <div class="d-flex row align-items-center p-4 text-center border-bottom border-5 rounded-0 myBorder">
                <!-- TODO: sarebbe carino riuscire a mettere la foto come una sorta di jumbotron usando il componente già creato -->
                <div class="col-6">
                    <img :src="`/storage/${arrRestInfo.img}`" :alt="arrRestInfo.name" class="rounded-4 risto_img"/>
                </div>
                <div class="px-5 col-6 text-start text-capitalize">
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
                        <!-- <li class="list-group-item fw-bold">piatti inseriti</li> -->
                        <li class="list-group-item" v-for="(cartPlate, i) in arrCartPlate" :key="i">

                            <span class="d-flex justify-content-between">
                                <span>{{cartPlate.name}}</span>
                                <div>
                                    <button @click.prevent="removePlate(cartPlate)" class="btn btn-outline-danger py-0 px-2 ">-</button>
                                    <span> {{cartPlate.quantity}}</span>
                                    <button class="btn btn-outline-success py-0 px-2 " @click.prevent="updatePlate(cartPlate)">+</button>
                                </div>
                            </span>

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
            ciao: null
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


    mounted() {
        this.localStorageSave();


    },


    //dobbiamo salvare gli elementi dell'array arrCartPlate in local storage
    //nella funzione addtocart dobbiamo
    methods:{
        addToCart(selectedPlate){
            this.arrCartPlate.push(this.ciao);
            let index = this.arrCartPlate.indexOf(this.ciao);
            this.arrCartPlate.splice(index, 1);

            if(!this.arrCartPlate.includes(selectedPlate)) {
                selectedPlate['quantity'] = 1;
                this.arrCartPlate.push(selectedPlate);

            } else {
                selectedPlate['quantity']++;
            }

            this.savePlate();
        },



        savePlate(){
            const parsed = JSON.stringify(this.arrCartPlate);
            // const rest = JSON.stringify(this.id);
            localStorage.setItem('arrCartPlate', parsed);
            // localStorage.setItem('arrInfoRest', rest);
            // console.log(localStorage.getItem('arrCartPlate'));
        },

        updatePlate(element){
            this.arrCartPlate.push(this.ciao);
            let index = this.arrCartPlate.indexOf(this.ciao);
            this.arrCartPlate.splice(index, 1);

            element['quantity']++;

            console.log(this.arrCartPlate);
            console.log(element['quantity']);
            this.savePlate();
        },

        removePlate(element){
            this.arrCartPlate.push(this.ciao);
            let index = this.arrCartPlate.indexOf(this.ciao);
            this.arrCartPlate.splice(index, 1);

            element['quantity']--;

            if(element['quantity'] < 1){
            let myindex = this.arrCartPlate.indexOf(element);
            this.arrCartPlate.splice(myindex, 1);
            console.log("Hai rimosso questo elemento");
            }
            console.log(element['quantity']);
            console.log(this.arrCartPlate);
            this.savePlate();
        },

        localStorageSave() {

            if (localStorage.getItem('arrCartPlate')) {
            try {

                this.arrCartPlate = JSON.parse(localStorage.getItem('arrCartPlate'));

                if(this.arrCartPlate.length > 0) {
                    if(this.id != this.arrCartPlate[0].user_id) {
                    // localStorage.clear();
                this.arrCartPlate = [];
            }
        }
            }
            catch(e) {
                localStorage.removeItem('arrCartPlate');
            }
            }
        }

    },

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
        margin-bottom: 15px;
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
        max-width: 100%;
        box-shadow: 0 0.75rem 0.75rem rgba(0, 0, 0, 0.5) !important;
    }
    .wrap{
        flex-wrap: wrap;
    }
</style>
