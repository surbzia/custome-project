<template>
  <div>
    <Header />
    <Nuxt />
    <div class="toggle-player">
      <div class="player-btn">
        <i class="fa fa-play"></i>
      </div>
      <div class="player-body">
        <iframe
          src="https://az10.yesstreaming.net/public/obsession_digital_radio"
          frameborder="0"
          allowtransparency="true"
          style="width: 100%;"
        ></iframe>
      </div>
    </div>
    <Footer />
  </div>
</template>
<script>
export default {
  mounted() {
    this.$store.dispatch('checkLogin')
    this.$store.commit("cart/initialize");
    this.$store.dispatch("setUserNameChatDefault");
  },
};
</script>