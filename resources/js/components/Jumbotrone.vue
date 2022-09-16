<template>
    <div id="myJumbotrone">
        <h1>Jumbotrone</h1>

        <div class="d-flex">
            <div v-for="category in categories" :key="category.id">
                <h1>
                    {{category.name}}
                </h1>
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
        background-color:  blue;
    }
</style>
