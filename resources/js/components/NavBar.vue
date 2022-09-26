<template>
<div id="myNavbar">
    <nav class="navbar navbar-expand-lg navbar-dark p-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="/image/logo-deliveboo-transparent.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li v-for="(navItem, index) in navItems"  :key="index" class="nav-item ">
            <a :href="navItem.routeName" class="nav-link active">{{ navItem.label }}</a>
        </li>
      </ul>

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
                // {
                //     label: 'Dashboard',
                //     routeName: 'restaurant',
                // }
            ]
        };
    }
}
</script>

<style lang="scss" scoped>
    #myNavbar{
        background-color: #d43a1c;
    }

    img{
        width: 80px;
    }
</style>