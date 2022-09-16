<template>
    <a href="#" class="card myCard border-0 text-decoration-none text-dark">
        <img :src="img" :alt="name" class="card-img-top  rounded-3 myCardImg">
        <div class="card-body">
            <p class="card-text text-capitalize  text-center fs-5"> {{name}} </p>
        </div>
    </a>
</template>
<!-- TODO:
    -cambiare immagine pizza nel db -->

<script>
import string from '@babel/template/lib/string';


export default {
        name: 'CategoriesTop',

        props:{
            name: String,
            img: String,
        }

    }
</script>

<style>
    .myCard{
        width: 12rem;
        height: 12rem;


    }

    .myCardImg{
        width: 100%;  
        height: 100%;
    }
</style>
