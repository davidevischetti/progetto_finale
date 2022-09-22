<template>
    <div id="myCart">
        <h1>prova</h1>

        <!-- TODO: bisogna mettere il collegamento alla pagina anche in front.js -->
        <!-- TODO:  struttura carrello 
                    -una volta importato avrà navbar e footer  
                    -elemento centrale con le informazioni di contatto
                    -elemento per il pagamento di braintree
                    -salvare info ordini per le statistiche -->
    </div>
</template>

<script>
export default{
    name: 'CarrelloComp',
    // components:{

    // }
    props:{
        id: Number,
    },
}
</script>

<style lang="scss" scoped>
    #myCart{
        background-color: #ffe6d8;
    }
</style>