<template>
  <section class="album-name">
    <Banner :title="album.album_name" />
    <section class="albumname-box">
      <b-container>
        <b-row class="an-container">
          <b-col col lg="6">
            <div class="img-holder">
              <img :src="album.image_url" alt="" />
            </div>
          </b-col>
          <b-col col lg="6">
            <div class="an-desc">
              <div class="an-heading">
                <h4>{{ album.album_name }}</h4>
                <h6>{{ album.user.name }}</h6>
              </div>
              <div class="an-content" v-html="album.album_description"></div>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
    <section class="album-list-player">
      <b-container>
        <div class="music-div" v-for="(song, songk) in songs" :key="song.id">
          <b-row>
            <b-col col lg="7">
              <div class="music-img">
                <img src="~/assets/img/albummini.png" alt="" />
              </div>
              <div class="p-bar">
                <div class="progress">
                  <div
                    class="progress-bar"
                    role="progressbar"
                    :aria-valuenow="song.progress"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    :style="'width: '+song.progress+'%'"
                  >
                    <span class="sr-only">{{song.progress}}% Complete</span>
                  </div>
                  <input type="range" @change="updateProgress(songk, $event)" name="progress-stepper" class="stepper" step="1" min="0" max="100" />
                </div>
              </div>
            </b-col>
            <b-col col lg="5">
              <div class="music-btns">
                <ul>
                  <li v-if="song.is_playing==true&&songk>0">
                    <button @click="backPlayer(songk)">
                      <i aria-hidden="true" class="fa fa-backward"></i>
                    </button>
                  </li>
                  <li>
                    <button @click="togglePlayer(songk)">
                      <i aria-hidden="true" :class="'fa fa-'+(song.is_playing==false?'play':'pause')"></i>
                    </button>
                  </li>
                  <li v-if="song.is_playing==true&&(songk<(songs.length-1))">
                    <button @click="forwardPlayer(songk)">
                      <i aria-hidden="true" class="fa fa-forward"></i>
                    </button>
                  </li>
                </ul>
              </div>
              <div class="range-sli">
                  <i @click="song.volume=0" v-if="song.volume>0" :class="(song.volume==100?'fa fa-volume-up':'fa fa-volume-down')" aria-hidden="true"></i>
                  <i @click="song.volume=100" v-if="song.volume==0" class="fa fa-volume-off" aria-hidden="true"></i>
                  <form>
                    <input type="range" id="vol" v-model="song.volume" name="vol" min="0" max="100" />
                  </form>
              </div>
            </b-col>
          </b-row>
        </div>
      </b-container>
    </section>
    <audio id="yruxaudio" ref="yruxaudio"></audio>
  </section>
</template>
<script>
export default {
  async asyncData({ $axios, params }) {
    const { album } = await $axios.$get("albums/" + params.slug);
    return { album };
  },
  data(){
      return{
          songs: [],
          currentPlay: 0,
      }
  },
  async mounted(){
    for(let i = 0; i < this.album.songs.length; i++){
      this.songs.push({
        is_playing: false,
        volume: 100,
        progress: 0,
        file: this.album.songs[i].song.full_url,
        id: this.album.songs[i].id,
        // audio: new Audio(this.album.songs[i].song.full_url)
      })
      await this.$nextTick()
    }
    this.$refs.yruxaudio.ontimeupdate = ()=>{
      this.setProgress()
    }
  },
  watch:{
    songs:{
      handler(newValue, oldValue){
        for(let i = 0; i < this.songs.length; i++){
          if(this.songs[i].is_playing==true){
            this.$refs.yruxaudio.volume = (this.songs[i].volume/100)
          }
          // this.songs[i].audio.volume = (this.songs[i].volume/100)
        }
      },
      deep: true,
    },
  },
  methods:{
    updateProgress(key, object){
      // this.$refs.yruxaudio.currentTime = 60
      if(this.songs[key].is_playing==true){
        this.$refs.yruxaudio.currentTime = ((this.songs[key].audio.duration/100)*parseInt(object.target.value))
      }
    },
    setProgress(){
      let i = this.currentPlay
      if(this.songs[i].is_playing==true){
        this.songs[i].progress = ((this.$refs.yruxaudio.currentTime/this.$refs.yruxaudio.duration)*100)
      }
    },
    async togglePlayer(key){
      if(this.songs[key].is_playing===false){
        this.currentPlay = key
        this.$refs.yruxaudio.pause()
        this.songs.forEach(e=>{
          e.is_playing=false
          // e.audio.pause()
        })
        await this.$nextTick()
        this.songs[key].is_playing = true
        try{
          this.$refs.yruxaudio.src = this.songs[key].file
          this.$refs.yruxaudio.currentTime = 50
          this.$refs.yruxaudio.play()
          // this.songs[key].audio.play();
        }catch(ex){}
      }else{
        this.songs[key].is_playing = false
        this.$refs.yruxaudio.pause()
        // this.songs[key].audio.pause()
      }
    },
    backPlayer(key){
      if(key>0){
        this.togglePlayer((key-1))
      }
    },
    forwardPlayer(key){
      if(key<this.songs.length){
        this.togglePlayer((key+1))
      }
    },
    pauseAll(){
      
    }
  }
};
</script>