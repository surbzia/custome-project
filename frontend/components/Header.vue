<template>
  <header class="header">
    <b-container>
       <b-row>
          <b-col cols="2">
            <b-navbar-brand to="/"><img src="~/assets/img/logo.png" alt="" /></b-navbar-brand>
          </b-col>
      <b-col cols="10">
       <b-row>
        <b-col cols="12">
            <div class="tp-bar">
                <ul>
                   <li><nuxt-link to="/live-presentators"><span><img src="~/assets/img/live.png" alt="" /></span> Stream</nuxt-link></li>
                   <li v-if="!loggedIn"><nuxt-link to="/login"><span><i class="fa fa-user-circle" aria-hidden="true"></i></span>Login</nuxt-link></li>
                   <li v-if="!loggedIn"><nuxt-link to="/register"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Register</nuxt-link></li>
                   <li v-if="loggedIn"><nuxt-link to="/customer"><span><i class="fa fa-user-circle" aria-hidden="true"></i></span>Dashboard</nuxt-link></li>
                   <li v-if="loggedIn"><nuxt-link to="/customer/logout"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>Logout</nuxt-link></li>
                   <li><nuxt-link to="/cart"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>{{currency}} {{cartTotal}}</nuxt-link></li>
                   <li><nuxt-link to="/timeline" class="hdr-btn">Schedule</nuxt-link></li>
                </ul>
            </div>
        </b-col>
        </b-row>
      <b-navbar toggleable="lg">
        <b-navbar-toggle target="nav-collapse"><i class="fa fa-bars"></i></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item to="/">Home</b-nav-item>
            <b-nav-item to="/advertise">Advertising</b-nav-item>
            <b-nav-item to="/events">Events</b-nav-item>
            <b-nav-item to="/products">Shop</b-nav-item>
            <b-nav-item to="/albums">Albums</b-nav-item>
            <b-nav-item to="/videos">Videos</b-nav-item>
            <b-nav-item to="/contactus">Contact Us</b-nav-item>
            <b-nav-item to="/presenters">Presenters</b-nav-item>
             <ul class="resp">
                   <li><nuxt-link to="/live-presentators"><span><img src="~/assets/img/live.png" alt="" /></span> Stream</nuxt-link></li>
                   <li v-if="!loggedIn"><nuxt-link to="/login"><span><i class="fa fa-user-circle" aria-hidden="true"></i></span>Login</nuxt-link></li>
                   <li v-if="!loggedIn"><nuxt-link to="/register"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Register</nuxt-link></li>
                   <li v-if="loggedIn"><nuxt-link to="/customer"><span><i class="fa fa-user-circle" aria-hidden="true"></i></span>Dashboard</nuxt-link></li>
                   <li v-if="loggedIn"><nuxt-link to="/customer/logout"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>Logout</nuxt-link></li>
                   <li><nuxt-link to="/cart"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>{{currency}} {{cartTotal}}</nuxt-link></li>
                   <li><nuxt-link to="/timeline" class="hdr-btn">Schedule</nuxt-link></li>
                </ul>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
      </b-col>

       </b-row>
    </b-container>
  </header>
</template>
<script>
export default {
  computed:{
    cartTotal(){
      return this.$store.state.cart.total
    },
    currency(){
      return this.$store.state.currency
    },
    loggedIn(){
      return this.$store.state.loggedIn;
    },
  }
}
</script>
