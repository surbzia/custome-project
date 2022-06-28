<template>
  <section class="chat">
    <b-container>
      <div class="chat-main">
        <div class="chat-title">
          <b-row>
            <b-col>
              <h4>Shoutbox</h4>
            </b-col>
            <b-col>
              <!-- <h5><b></b> Users<span>({{ onlineUsers }})</span></h5> -->
            </b-col>
          </b-row>
        </div>
        <ul>
          <li v-if="shoutboxapiuri">
            <div @click="getmsgs" class="loadmorechat"><button type="button">Load More</button></div>
          </li>
          <li v-for="(message, index) in messageHistory" :key="index">
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>{{ message.by }}</b>
            <small>{{ message.message }}</small>
            <span>{{ message.time ? message.time : '' }}</span>
          </li>
          <!-- <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Jackie</b>
            <small>Blessings all the way 🙏🏾💯🎵</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Peach</b>
            <small
              >Bad tunes DJ Saint nothing can replace those old tunes</small
            >
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>Made it Geezer. Have a puka weekend geezwr</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>Tuuunes</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>What a mix siiick</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>💥💯💭💭👊🏿</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Trevor</b>
            <small>Merc battleaxe wicked reggae tunes</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Jackie</b>
            <small>Blessings all the way 🙏🏾💯🎵</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Jackie</b>
            <small>Blessings all the way 🙏🏾💯🎵</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Peach</b>
            <small
              >Bad tunes DJ Saint nothing can replace those old tunes</small
            >
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>Made it Geezer. Have a puka weekend geezwr</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>Tuuunes</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>What a mix siiick</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Billy</b>
            <small>💥💯💭💭👊🏿</small>
            <span>30 min</span>
          </li>
          <li>
            <img src="~/assets/img/chat-icon.png" alt="" />
            <b>Trevor</b>
            <small>Merc battleaxe wicked reggae tunes</small>
            <span>30 min</span>
          </li> -->
        </ul>

        <div class="chat-msg">
          <form v-if="allowedChat">
            <b-row>
              <b-col md="10" sm="12">
                <b-form-input id="input-1" placeholder="Write your message here" required v-model="message">
                </b-form-input>
                <!-- <img src="~/assets/img/face.png" alt="" /> -->
              </b-col>

              <b-col md="2" sm="12">
                <b-button @click="sendMsg" type="button" variant="primary">Send</b-button>
              </b-col>
            </b-row>
          </form>
          <form v-else>
            <b-row>
              <b-col md="9" sm="12">
                <b-form-input id="input-1" placeholder="Type your User Name" v-model="usernamemodel" required>
                </b-form-input>
              </b-col>

              <b-col md="3" sm="12">
                <b-button @click="initializeChat" type="button" variant="primary">Set User Name</b-button>
              </b-col>
            </b-row>
          </form>
        </div>
      </div>

      <VueSlickCarousel v-if="home_ads_banners.length>0" class="mt-3" v-bind="home_ads_setting">
        <img v-for="home_ads_banner in home_ads_banners" :key="home_ads_banner.id" :src="home_ads_banner.full_url"
          alt="" />
      </VueSlickCarousel>
    </b-container>
  </section>
</template>
<script>
export default {
  components: {
  },
  props: {
    home_ads_banners: {
      type: Array,
      default: [],
    }
  },
  mounted() {
    this.initializeChat()
    this.getmsgs()
  },
  data() {
    return {
      Agoraoptions: {
        uid: "",
        token: ""
      },
      AgoraAuth: {
        appID: process.env.agoraappid,
        client: undefined,
        channel: undefined,
        channelName: "shoutbox"
      },
      allowChatStatic: false,
      usernamemodel: '',
      message: '',
      page: 1,
      shoutboxapiuri: '',
      home_ads_setting: {
        dots: true,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: false,
        // "centerMode": true,
        "responsive": [
          {
            "breakpoint": 1024,
            "settings": {
              "slidesToShow": 2,
              "slidesToScroll": 2,
              "infinite": true,
              "dots": true
            }
          },
          {
            "breakpoint": 600,
            "settings": {
              "slidesToShow": 1,
              "slidesToScroll": 1,
              "initialSlide": 1
            }
          },
          {
            "breakpoint": 480,
            "settings": {
              "slidesToShow": 1,
              "slidesToScroll": 1
            }
          }
        ]

      }
    }
  },
  methods: {
    async initializeChat() {
      this.allowChatStatic = false
      if(!this.username){
        await this.$store.dispatch('setUserNameChat', {name: this.usernamemodel})
      }
      if (this.username != '') {
        this.Agoraoptions.token = await this.$axios.post('agora/rtm',{
          name: this.username
        }).then(e=>e.data.token)
        this.Agoraoptions.uid = this.username
        this.$store.dispatch('setUserNameChat', { name: this.username })
        this.AgoraAuth.client = this.$AgoraRTM.createInstance(this.AgoraAuth.appID)
        this.AgoraAuth.client.on('MessageFromPeer', (message, peerId) => {
          this.$store.dispatch('addMessage', { message: message, by: this.username })
        })
        await this.AgoraAuth.client.login(this.Agoraoptions)
        this.AgoraAuth.channel = this.AgoraAuth.client.createChannel(this.AgoraAuth.channelName)
        this.AgoraAuth.channel.on('ChannelMessage', async (message, memberId) => {
          this.$store.dispatch('addMessage', { message: message.text, by: memberId })
        })
        // Display channel member stats
        this.AgoraAuth.channel.on('MemberJoined', (memberId) => {
          this.$store.dispatch('addMessage', { message: "Joined Shoutbox", by: memberId })
        })
        // Display channel member stats
        this.AgoraAuth.channel.on('MemberLeft', (memberId) => {
          this.$store.dispatch('addMessage', { message: "Left Shoutbox", by: memberId })
        })
        await this.AgoraAuth.channel.join()
      }
      this.allowChatStatic = true
    },
    async sendMsg() {
      if (this.message != ''&&this.allowChatStatic==true) {
        this.$store.dispatch('sendMessageSocket', { message: this.message, by: this.username })
        await this.AgoraAuth.channel.sendMessage({ text: this.message })
        this.message = ''
        this.scrolltobtmofshoutbox()
      }
    },
    scrolltobtmofshoutbox(btm = true) {
      if (btm) {
        this.$nextTick(() => {
          if (document.getElementsByClassName('chat-main')[0]) {
            document.getElementsByClassName('chat-main')[0].children[1].scrollTop = document.getElementsByClassName('chat-main')[0].children[1].scrollHeight
          }
        })
      } else {
        this.$nextTick(() => {
          if (document.getElementsByClassName('chat-main')[0]) {
            document.getElementsByClassName('chat-main')[0].children[1].scrollTop = 0
          }
        })
      }
    },
    getmsgs() {
      this.$axios.get('getshoutbox?page=' + this.page).then(e => e.data).then(e => {
        var _isfirst = this.page == 1 ? true : false;
        this.shoutboxapiuri = e.next_page_url
        this.page++
        this.$store.dispatch('prependMessages', e.data)
        this.scrolltobtmofshoutbox(_isfirst);
      })
    },
  },
  watch:{
    allowedChat(){
      if(this.allowedChat===true){
        //allowed now
        // console.log('here')
      }
    }
  },
  computed: {
    username() {
      // return 'yrux'
      return this.$store.state.username
    },
    allowedChat() {
      return this.$store.state.allowedChat
    },
    messageHistory() {
      return this.$store.state.messages
    },
    onlineUsers() {
      return this.$store.state.online
    }
  }
}
</script>
