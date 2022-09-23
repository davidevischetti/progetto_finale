<template>
    <div id="myCart" class="container">
        <div class="row ">
            <h1 class="mb-4 offset-4 col-4 text-center">
                Carrello
            </h1>
            
           

            
            <div class="col-8 offset-2 card p-5 myBorder-primary">
                <form v-if="formVisible" method="post" enctype="multipart/form-data">
    
                    <div class="mb-3">
                        <label class="form-label" for="name">Name*</label>
                        <input class="form-control" type="text" v-model="dataOrder.name" name="name" id="name" maxlength="255" required>
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label" for="email">Email*</label>
                        <input class="form-control" type="email" v-model="dataOrder.email" name="email" id="email" maxlength="255" minlength="8" required>
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label" for="address">Address*</label>
                        <input class="form-control" type="text" v-model="dataOrder.address" name="address" id="address" maxlength="255" minlength="8" required>
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone*</label>
                        <input class="form-control" type="tel" v-model="dataOrder.phone" name="phone" id="phone" max="20" required>
                    </div>

                    <div>
                        Price Total
                        <br>
                        {{price_visualizzato}} €
                    </div>

                    
                    <button @click.prevent="myLog()" type="submit" class="btn my_btn">Save</button>
                </form>
                <div v-if="visible">
                    <v-braintree 
                        :authorization=token_collegamento
                        @success="onSuccess"
                    />
                </div>
                <div v-else-if="visible == false && formVisible == false">
                    Transazione avvenuta con successo
                </div>
            </div>
            <div>
                <ul>
                    <li v-for="plate in arrCartPlate" :key="plate.id">
                        {{plate.name}} 
                    </li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>
export default{
    name: 'CarrelloComp',
    props:{
        arrCartPlate: Array
    },
    data(){
        return {
            "dataOrder": {
                'name': '',
                'email': '',
                'address': '',
                'phone': null,
            },
            price_visualizzato: null,
            orderMessage: '',
            plateIds: [],
            token_collegamento: 'null',

            visible: false,
            formVisible: true,
        }
            
    },
    created(){
        this.generateToken();

        this.arrCartPlate.forEach(plate => {
            this.price_visualizzato += plate.price;
        });

        this.arrCartPlate.forEach(plate => {
            this.plateIds.push(plate.id);
        });
        console.log(this.price_visualizzato); 
    },  

    methods: {
        myLog(){
            this.formVisible = false;
            this.visible = true
        },
 
        onSuccess(payload) {
            let token = payload.nonce;
            axios.post('/api/orders/make/payment', {plate: this.plateIds, token: token, order: this.dataOrder}).then(response => {
                if (response.data.success) {
                    console.log(response.data.priceTotal)
                    this.visible = false;
                }
            });


            // axios.post('/api/orders', this.dataOrder).then(response => {
            //     if (response.data.success) {
            //         this.orderMessage = response.data.message
            //     }
            // })
        },
        generateToken(){
            axios.get('/api/orders/generate').then(response => {
                if (response.data.success) {
                    this.token_collegamento = response.data.token
                    
                }
            console.log(this.token_collegamento);
            console.log(this.visible);
            })
        }
    }
}
</script>


<style lang="scss" scoped>
    .my_btn{
        background-color: #d43a1c;
        color: white;
        &:hover{
            background-color: #ff5735;
            color:white;
        }
    }
    #myCart{
        background-color: #ffe6d8;
    }
</style>