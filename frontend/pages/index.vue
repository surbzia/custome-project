<template>
  <section class="home">
    <section class="banner">
      <img src="~/assets/img/banner.png" alt="" />
      <b-container>
        <div class="slide-cap">
          <h4>Welcome to</h4>
          <h1>Obsession Digital Radio</h1>
          <h3>The Elation Of Musical Medley</h3>
        </div>
      </b-container>
    </section>

    <chat :home_ads_banners="home_ads_banners" />
    <section class="about-sec">
      <b-container>
        <b-row>
          <b-col md="6" sm="12">
            <div class="about-img">
              <img src="~/assets/img/about-img.png" alt="" />
            </div>
          </b-col>
          <b-col md="6" sm="12">
            <div class="about-blk">
              <h5>The Story</h5>
              <h2>About Us</h2>
              <p>
                Obsession Digital Radio was launched worldwide in early 2020 for
                passionate music lovers. Since then we have continued to promote
                our live music events in the UK and the rest of the world.
                Obsession Music is a platform that brings all the new and
                existing DJ talents to light and also provides a great music
                service for the widespread online and offline public.
              </p>
              <p>
                Obsession Music provides you with free online music streaming
                and downloading services as well as promoting our music events.
                We here have an inclusive and diverse central music library with
                an extensive selection of albums and live music available in
                both audio and video formats.
              </p>
              <nuxt-link to="/albums">Explore Album</nuxt-link>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <section class="wrange">
      <b-container>
        <div class="wrange-title">
          <h5>We Provides Listeners With a</h5>
          <h2>Wide Range of Music</h2>
          <nuxt-link to="/albums">Download Now</nuxt-link>
        </div>
        <div class="wrange-video">
          <img src="~/assets/img/image4.jpg" alt="Video" />
       <a data-fancybox="gallery" data-src="https://d26sii38bi2b6f.cloudfront.net/videos/a2Eax6JyHzQCHHdd9vW4uz9Gjd2t183oW5uTO4WT.mp4"><i class="fa fa-play" aria-hidden="true"></i></a>
        </div>
      </b-container>
    </section>

    <section class="mpresenter">
      <b-container>
        <div class="mpresenter-title">
          <h2>Best Music Presenters</h2>
        </div>
        <div v-if="dj.length>0" class="mp-slider">
          <HomePresenters :dj="dj" />
        </div>
      </b-container>
    </section>

    <EGallery :gallery="event_gallery" />

    <section class="btanda">
      <b-container>
        <div class="btanda-title">
          <h5>Best Music</h5>
          <h2>Tracks & Artists</h2>
        </div>
        <div class="btanda-container">
          <b-row>
            <b-col col lg="7" class="pading0">
              <b-row v-if="home_album_gallery.length>0">
                <b-col col lg="4" class="pading0 ">
                  <div class="imgList">
                  <VueSlickCarousel
                    v-bind="settings"
                    class="thumbpreview"
                    ref="c4"
                    :asNavFor="$refs.c3"
                    :slidesToShow="3"
                    :arrows="false"
                    @beforeChange="syncSliders"
                    :focusOnSelect="true"
                  >
                    <div v-for="home_album in home_album_gallery" :key="home_album.id"><img :src="home_album.full_url" alt="" /></div>
                  </VueSlickCarousel>
              </div>
                </b-col>
                <b-col col lg="8">
                  <VueSlickCarousel
                    class="mainpreview"
                    ref="c3"
                    :arrows="false"
                    :asNavFor="$refs.c4"
                    @beforeChange="syncSliders" 
                    :focusOnSelect="true"
                  >
                    <div v-for="home_album in home_album_gallery" :key="home_album.id"><img :src="home_album.full_url" alt="" /></div>
                  </VueSlickCarousel>
                </b-col>
              </b-row>
            </b-col>
            <b-col v-if="album&&songs.length>0" col lg="5" class="pading0">
              <div class="cmplayer">
                <div class="player-title">
                  <h3>{{album.album_name}}</h3>
                  <p v-if="album.user">{{album.user.name}}</p>
                </div>
                <div class="scrollbar" id="style-3">
                  <div class="force-overflow">
                    <div class="plyer" v-for="(song, songk) in songs" :key="song.id">
                      <b-row>
                        <b-col cols="8">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar"
                            :aria-valuenow="song.progress"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            :style="'width: '+song.progress+'%'"
                            >
                              <span class="sr-only">{{song.progress}}% Complete</span>
                            </div>
                          </div>
                          <small class="start">{{song.song_title}}</small>
                        </b-col>
                        <b-col cols="4">
                          <ul>
                            <li v-if="song.is_playing==true&&songk>0">
                              <button @click="backPlayer(songk)"><i class="fa fa-backward" aria-hidden="true"></i></button>
                            </li>
                            <li>
                              <button @click="togglePlayer(songk)"><i :class="'fa fa-'+(song.is_playing==false?'play':'pause')" aria-hidden="true"></i></button>
                            </li>
                            <li v-if="song.is_playing==true&&(songk<(songs.length-1))">
                              <button @click="forwardPlayer(songk)"><i class="fa fa-forward" aria-hidden="true"></i></button>
                            </li>
                          </ul>
                        </b-col>
                      </b-row>
                    </div>
                    <audio id="yruxaudio" ref="yruxaudio"></audio>
                  </div>
                </div>
              </div>
            </b-col>
          </b-row>
        </div>
      </b-container>
    </section>
  </section>
</template>

<script>
import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox.css";
export default {
  name: "HomePage",
  components:{
    Fancybox,
  },
  async asyncData({$axios}){
    const {event_gallery, dj, album, home_ads_banners, home_album_gallery} = await $axios.$get('home')
    return {event_gallery, dj, album, home_ads_banners, home_album_gallery}
  },
  data() {
    return {
      settings: {
        vertical: true,
        verticalSwiping: true,
        
      },
      songs: [],
      currentPlay: 0,
    };
  },
  methods: {
    syncSliders(currentPosition, nextPosition) {
      this.$refs.c4.goTo(nextPosition);
      this.$refs.c3.goTo(nextPosition);
    },
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
  },
  async mounted(){
    // this.songs = []
    if(this.album){
      console.log(this.album,' yrux')
      for(let i = 0; i < this.album.songs.length; i++){
        this.songs.push({
          is_playing: false,
          volume: 100,
          progress: 0,
          file: this.album.songs[i].song.full_url,
          id: this.album.songs[i].id,
          song_title: this.album.songs[i].song_title
          // audio: new Audio(this.album.songs[i].song.full_url)
        })
        await this.$nextTick()
      }
      this.$refs.yruxaudio.ontimeupdate = ()=>{
        this.setProgress()
      }
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
};
</script>
