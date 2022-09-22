<template>
    <div id="myCart" class="container">
        <div class="row ">
            <h1 class="mb-4 offset-4 col-4 text-center">
                Carrello
            </h1>
            
            <div v-if="orderMessage.length >= 1">
                <div class="col-4 offset-4 text-center">
                    {{orderMessage}}
                </div>
            </div>
            <div v-else-if="orderMessage.length == 0" class="col-8 offset-2 card p-5 myBorder-primary">
                <form @submit.prevent="sendOrder()" method="post" enctype="multipart/form-data">
    
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
                        99.99 $
                    </div>

                    <button type="submit" class="btn my_btn">Save</button>
                </form>
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
                'price_total': 40,
            },
            orderMessage: '',
            plateIds: []
        }
            
    },
    created(){
        this.arrCartPlate.forEach(plate => {
            this.plateIds.push(plate.id);
        });
    },

    methods: {
 
        sendOrder() {
            axios.post('/api/orders', this.dataOrder).then(response => {
                if (response.data.success) {
                    this.orderMessage = response.data.message
                }
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