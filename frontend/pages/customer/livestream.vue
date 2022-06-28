<template>
  <section class="livestream">
    <Banner title="Live Stream" />
    <section class="livest">
      <b-container>
        <div class="card p-2 mb-2">
          <b-row>
            <b-col col md="8" >
            <p>Streaming will end if close tab.</p>
          </b-col>
          <b-col col md="4 text-right" >
            <b-button class="btn btn-danger" v-if="isPlayed" @click="stopStream">Stop</b-button>
            <b-button class="btn btn-primary" v-if="!isPlayed" @click="PlayStreaming">Play</b-button>
          </b-col>
        </b-row>
        </div>
        <b-row>
          <b-col col lg="7">
            <div style="height: 443px; width: 100%" v-if="!isStreaming">
            <img class="loader" height="99px" src="~/assets/img/loading.gif" alt="">
            </div>
            <div style="height: 489px; width: 100%" class="ls-video"></div>
          </b-col>
          <b-col col lg="5">
            <div class="cht-pg">
              <chat :home_ads_banners="emptyArr" />
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>

export default {
  async mounted() {
    await this.getToken();
    await this.$nextTick();
    this.makehost();
  },
  data() {
    return {
      emptyArr: [],
      isPlayed:true,
      isStreaming:false,
      options: {
        appId: process.env.agoraappid,
        channel: "test",
        token: "",
        role: "host",
      },
      rtc: {
        client: null,
        localAudioTrack: null,
        localVideoTrack: null,
      },
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.loggedIn;
    },
    loggedInUser() {
      return this.$store.state.loggedInUser;
    },
  },
  methods: {
    async stopStream() {
      try {
        this.rtc.localAudioTrack.close();
        this.rtc.localVideoTrack.close();
        await this.rtc.client.leave();
        this.isPlayed = false;
      } catch (ex) {
        console.log(ex);
      }
      //   this.$router.push({ name: "Dashboard" });
    },
    async getToken() {
    const { token, channel } = await this.$axios
      .post("agora/rtc/host")
      .then((e) => e.data);
    this.options.token = token;
    this.options.channel = channel;
    },
    async makehost() {
      this.rtc.client = this.$AgoraRTC.createClient({
        mode: "live",
        codec: "vp8",
      });
      this.rtc.client.setClientRole(this.options.role);
      await this.rtc.client.join(
        this.options.appId,
        this.options.channel,
        this.options.token,
        this.loggedInUser.id
      );
      this.rtc.localAudioTrack =
        await this.$AgoraRTC.createMicrophoneAudioTrack();
      this.rtc.localVideoTrack = await this.$AgoraRTC.createCameraVideoTrack();
      await this.rtc.client.publish([
        this.rtc.localAudioTrack,
        this.rtc.localVideoTrack,
      ]);
      const video = document.querySelector(".ls-video");
      this.rtc.localVideoTrack.play(video);
      this.isStreaming = true;
    },
    async PlayStreaming() {
      this.isPlayed = true;
      this.isStreaming = false;
      await this.getToken();
      this.makehost();
    }
  },
  beforeRouteLeave(to, from, next) {
    try {
      this.rtc.localAudioTrack.close();
      this.rtc.localVideoTrack.close();
      this.rtc.client.leave();
      next()
    } catch (ex) {
      console.log(ex);
    }
  },
};
</script>
<style>
/* img.loader {
   
    position: absolute;
    left: 258px;
    top: 162px;
} */


</style>
