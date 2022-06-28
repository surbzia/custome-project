<template>
  <section class="livestream">
    <Banner title="Live Stream" />
    <section class="livest">
      <b-container>
        <b-row>
          <b-col col lg="7">
            <div style="height: 490px; width: 100%" v-if="!isStreaming">
              <img
                class="loader"
                height="99px"
                src="~/assets/img/loading.gif"
                alt=""
              />
            </div>
            <div
              style="height: 490px !important; width: 100%"
              class="ls-video"
              id="ls-video"
            ></div>
          </b-col>
          <b-col col lg="5">
            <div class="cht-pg">
              <chat :home_ads_banners="emptyarr" />
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>
export default {
  async asyncData({ $axios, params }) {
    const dj_id = params.id;
    return { dj_id };
  },
  async mounted() {
    await this.getToken();
    await this.$nextTick();
    this.makehost();
  },
  beforeMount() {
    // alert('this is on before load');
    // this.stopStream()
  },
  data() {
    return {
      emptyarr: [],
      isPlayed: true,
      isStreaming: false,
      options: {
        appId: process.env.agoraappid,
        channel: "test",
        token: "",
        role: "audience",
        uid: "",
      },
      rtc: {
        client: null,
        localAudioTrack: null,
        localVideoTrack: null,
      },
    };
  },
  methods: {
    async getToken() {
      const { token, channel, uid } = await this.$axios
        .post("agora/rtc/viewer/" + this.dj_id)
        .then((e) => e.data);
      this.options.token = token;
      this.options.channel = channel;
      this.options.uid = uid;
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
        this.options.uid
      );
      this.rtc.client.on("user-published", async (user, mediaType) => {
        await this.rtc.client.subscribe(user, mediaType);
        if (mediaType === "video") {
          const remoteVideoTrack = user.videoTrack;
          const playerContainer = document.createElement("div");
          playerContainer.id = user.uid.toString();
          playerContainer.style.width = "100%";
          playerContainer.style.height = "443px";
          document.getElementById("ls-video").append(playerContainer);
          remoteVideoTrack.play(playerContainer);
        }
        if (mediaType === "audio") {
          const remoteAudioTrack = user.audioTrack;
          remoteAudioTrack.play();
        }
      });
      this.rtc.client.on("user-unpublished", (user) => {
        const playerContainer = document.getElementById(user.uid);
        playerContainer.remove();
      });
      this.isStreaming = true;
    },
  },
  beforeRouteLeave(to, from, next) {
    try {
      this.rtc.client.leave();
      this.isPlayed = false;
      next();
    } catch (ex) {
      console.log(ex);
    }
  },
  watch: {},
};
</script>
