<template>
    <div>
        <h1>{{ arrRestInfo.infoRestaurant.name }}</h1>
    </div>
</template>

<script>
export default {
    name: 'ShowRestaurant',

    // components: {
    // },
     props:['id'],
    data() {
        return {
            // idRistorante: id,
            arrRestInfo: null,
            arrRestPlate: [],
        }
    },
    created:{ 
        
        getInfoRest(){
                axios.get('/api/category/restaurants/' + this.id).then(response => {
                    if (response.data.success) {
                        this.arrRestInfo = response.data.infoRestaurant
                        // this.arrPlateRest = response.data.plateRestaurant
                    }
                })
            },
    },
    methods:{
       
            getPlateRest(){
                axios.get('/api/plates' + '?userId=' + this.idRistorante).then(response => {
                    this.arrRestPlate = response.data.data
                    // if (response.data.success) {
                    // }
                })
            },
            // assegnaValoreIdRest($num){
            //     this.idRistorante = $num;
            //     this.getInfoRest();
            //     this.getPlateRest();
            // },
    }}
</script>

<style lang="scss" scoped>

</style>