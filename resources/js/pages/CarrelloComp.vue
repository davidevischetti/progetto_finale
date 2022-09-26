<template>
    <div  >
        <div id="myCart" class="container-fluid">
            <div class="row">
                <h1 class="mb-4 offset-4 col-4 text-center">
                    Checkout
                </h1>
                
               
    
                
                <div class="col-6 offset-3 card p-5 myBorder-primary">
                    <form @submit.prevent="myLog()" v-if="formVisible" method="post" enctype="multipart/form-data">
        
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
    
                        
                        <button  type="submit" class="btn my_btn">Save</button>
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

        console.log(this.arrCartPlate);
        
        if (localStorage.getItem('arrCartPlate')) {
            try {
                this.arrCartPlate = JSON.parse(localStorage.getItem('arrCartPlate'));
            }
            catch(e) {
                localStorage.removeItem('arrCartPlate');
            }
        }

        


        this.arrCartPlate.forEach(plate => {
            this.price_visualizzato += plate.price;
        });

        this.arrCartPlate.forEach(plate => {
            this.plateIds.push(plate.id);
        });
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
                    this.visible = false;
                }
                window.localStorage.clear();
            });
        },
        generateToken(){
            axios.get('/api/orders/generate').then(response => {
                if (response.data.success) {
                    this.token_collegamento = response.data.token
                    
                }
            // console.log(this.token_collegamento);
            // console.log(this.visible);
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
        height: 100vh;
    }
</style>