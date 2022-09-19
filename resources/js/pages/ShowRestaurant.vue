<template>
    <div>
        <!-- <h1>{{ arrRestInfo.name }}</h1> -->
        {{ arrRestInfo.name}}

        <ul>
            <li v-for="plate in arrRestPlate" :key="plate.id">
                {{plate.name}}
            </li>
        </ul>

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
            arrRestInfo: null,
            arrRestPlate: null,
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

</style>
