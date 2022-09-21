<template>
    <div class="container">
        <ul class="list-group my-5 text-center border-bottom border-5 rounded-0 pb-3 myBorder">   
            <!-- <li class="list-group-item"><img :src="arrRestInfo.img" :alt="arrRestInfo.name" class=" risto_img" ></li> -->
            <li class="list-group-item border-0"><h1>{{arrRestInfo.name}}</h1></li>
            <li class="list-group-item border-0"><h3>{{arrRestInfo.address}}</h3></li>
        </ul>


        <div class="d-flex justify-content-between" >
            <div class="row col-6">
                <ul class="list-group mb-5">
                    <div v-for="plate in arrRestPlate" :key="plate.id" class=" list-group-flush mb-2">
                        <li class="list-group-item">
                            <p class="fs-3 fw-bold">{{plate.name}} 
                                <span class="float-end"><button class="btn btn_color">ADD</button></span></p>
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

            <div class="col-6 ">
                <ul class="list-group text-capitalize border list-group-flush">
                    <li class="list-group-item text-center">carrello</li>
                    <li class="list-group-item">piatti inseriti:</li>
                    <li class="list-group-item text-center"><button class="btn btn_color text-capitalize ">procedi con il pagamento</button></li>
                </ul>
            </div>

        </div>
        

    </div>
</template>

<script>
export default {
    name: 'ShowRestaurant',

    // components: {
    // },
     props:{
        id: Number,
     },
    data() {
        return {
            // idRistorante: id,
            arrRestInfo: [],
            arrRestPlate: [],
        }
    },
    created(){

        axios.get('/api/category/restaurants/' + this.id).then(response => {
            if (response.data.success) {
                this.arrRestInfo = response.data.infoRestaurant
                this.arrRestPlate = response.data.plates
            }
        })
    }
}

</script>

<style lang="scss" scoped>
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
