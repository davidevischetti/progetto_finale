<template>
    <div id="myHompage">

        <Jumbotrone></Jumbotrone>
        <div class="container my-4 ">
            <div class="row d-flex justify-content-between  ">
            <CategoriesTop v-for="category in categories" :key="category"
            :img="category.img"
            :name="category.name"
            class="myCategory" />
            </div>
        </div>
        <ListaRisto></ListaRisto>

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
                categories: [],
            }
        },
        created() {
            axios.get('api/restaurants').then(response => {
                if (response.data.success) {
                    this.categories = response.data.categories
                }
            })
        },
    }
</script>

<style lang="scss" scoped>

</style>
