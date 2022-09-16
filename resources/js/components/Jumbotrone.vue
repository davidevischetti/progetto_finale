<template>
<!-- inserito immagine di hero -->
<div class="jumbotron jumbotron-fluid " id="myJumbotrone">
  <div class="myFilter d-flex align-items-center">
    <div class="container">
        <h1 class="text-center text-white ">Dove vuoi, quando vuoi. Direttamente dal divano di casa tua.</h1>
    </div>
  </div>

  <!-- TODO: carosello delle categorie -->
  <!-- <div class="jumbo-carousel">
        <div class="container">
          <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-6 g-3">
            <div class="col ms_thumb ms_select">
              <img src="img/returnal-listing-thumb-01-ps5.jpg" alt=""/>
            </div>
            <div class="col">
              <img src="img/ratchet-and-clank-rift-apart-keyart.jpg" alt=""/>
            </div>
            <div class="col">
              <img src="img/returnal-listing-thumb-01-ps5.jpg" alt=""/>
            </div>
            <div class="col">
              <img src="img/ratchet-and-clank-rift-apart-keyart.jpg" alt=""/>
            </div>
            <div class="col">
              <img src="img/returnal-listing-thumb-01-ps5.jpg" alt=""/>
            </div>
            <div class="col">
              <img src="img/ratchet-and-clank-rift-apart-keyart.jpg" alt=""/>
            </div>
          </div>
        </div>
      </div> -->
</div>
</template>

<script>
    export default {
        name: 'Jumbotrone',
        data() {
            return {
                categoryItems: [
  
                    {
                        label: 'Italiano',

                    },
                    {
                        label: 'Giapponese',

                    },
                    {
                        label: '',

                    }
                ]
            };
  }

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