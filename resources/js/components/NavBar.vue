<template>
<div id="myNavbar" >
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand mx-0 mx-lg-1" href="/">
        <img src="/image/logo-deliveboo-transparent-tagliato.png" alt="">
      </a>
      <!-- <div class="d-flex"> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li v-for="(navItem, index) in navItems"  :key="index" class="nav-item mx-0 mx-lg-1">
              <a :href="navItem.routeName" class="nav-link py-3 px-0 px-lg-3 rounded active">{{ navItem.label }}</a>
            </li>
          </ul>
        </div>        
      </div>
          <!-- TODO: posizionato così si spoasta a destra il testo ma in responsive il toggle si apre male -->
    <!-- </div> -->
  </nav>
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
        // width: 100vw;
    }

    img{
        width: 80px;
    }
</style>