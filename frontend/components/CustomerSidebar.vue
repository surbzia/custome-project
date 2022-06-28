<template>
 <ul class="list-group">
  <li class="list-group-item"> <nuxt-link class="text-dark" to="/customer"><small> Profile</small></nuxt-link></li>
  <li class="list-group-item"><nuxt-link  class="text-dark" to="/customer/order"><small>Orders</small></nuxt-link></li>
  <li class="list-group-item" v-if="loggedInUser.role_id == 3">
  <a href="javascript:;" class="text-dark" @click="livestream()" ><small>Start Live Stream <span class="badge badge-pill badge-danger">&nbsp;</span></small></a></li>
  <li class="list-group-item"><nuxt-link to="/customer/logout"><small> Logout</small></nuxt-link></li>
</ul>
</template>
<script>
import swal from "sweetalert";
export default {
  methods: {
    logout() {
      return this.$store.dispatch("logout");
    },
    livestream(){
      swal({
      title: "Do you want to start live streaming?",
      buttons: true,
      buttons: ["Cancel", "Go Live"],
      dangerMode: false,
    })
    .then((goLive) => {
      if (goLive) {
        this.$router.push("/customer/livestream");
        // location.replace('/customer/livestream')
        // this.$router.push({ name: "customer-livestream" });
      } else {
      }
    })
    },
  },
    computed: {
    loggedInUser() {
      return this.$store.state.loggedInUser;
    },
  },
};
</script>
