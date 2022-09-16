<template>
<!-- inserito immagine di hero -->
<div class="jumbotron jumbotron-fluid " id="myJumbotrone">
  <div class="myFilter d-flex align-items-center">
    <div class="container">
        <h1 class="text-center text-white ">Dove vuoi, quando vuoi. Direttamente dal divano di casa tua.</h1>
    </div>
  </div>

</div>
</template>

<script>

    export default {
        name: 'Jumbotrone',
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
    #myJumbotrone{
        height: 500px;
        background-image:
            url('/image/pizza-in-oven.jpg');
        background-position: bottom ;
        background-size: cover;
        background-repeat: no-repeat;

        .myFilter{
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.356);
        }
    }
</style>
