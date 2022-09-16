<template>
<div id="myNavbar">
  <!-- <div> -->
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container justify-content-end">
            <a class="navbar-brand" href="#"><img src="" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="d-flex justify-content-end">
                <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <li v-for="(navItem, index) in navItems"  :key="index" class="nav-item">
                        <a :href="navItem.routeName" class="nav-link active">{{ navItem.label }}</a>
                    </li>
                </ul>
            </div> 
            </div>

        </div>
    </nav>
  <!-- </div> -->


</div>
</template>

<!-- TODO: sistemare toggle navbar  -->

<script>
export default {
        name: 'NavBar',
        data() {
            return {
                navItems: [
                    // {
                    //     label: 'Home',
                    //     routeName: 'home'
                    // },
                    {
                        label: 'Login',
                        routeName: 'login',
                    },
                    {
                        label: 'Register',
                        routeName: 'register',
                    },
                    {
                        label: 'Dashboard',
                        routeName: 'restaurant',
                    }
                ]
            };
  }
}

</script>

<style lang="scss" scoped>
    #myNavbar{
        background-color: #d43a1c;
    }
</style>