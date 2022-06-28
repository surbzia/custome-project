<template>
  <section class="videos">
    <Banner title="Videos" />
    <section v-if="firstVideo.id>0" class="wrange">
      <b-container>
        <div class="wrange-title">
          <h5>We Provides Listeners With a</h5>
          <h2>Wide Range of Music</h2>
        </div>
        <div class="wrange-video">
          <img :src="firstVideo.thumb_url" alt="Video" />
          <a data-fancybox="gallery" :data-src="firstVideo.video_url"><i class="fa fa-play" aria-hidden="true"></i></a>
        </div>
      </b-container>
    </section>

    <section class="music-thumbs">
        <b-container>
            <b-row>
                <b-col :key="video.id" v-for="video in exceptFirst" col lg="4">
                    <div class="video-thumbs">
                        <img :src="video.thumb_url" alt="">
                        <a data-fancybox="gallery" :data-src="video.video_url"><i class="fa fa-play" aria-hidden="true"></i></a>
                    </div>
                </b-col>
            </b-row>
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
    const {videos} = await $axios.$get('videos')
    return {videos} 
  },
  computed:{
    firstVideo(){
      if(this.videos.length>0){
        return this.videos[0]
      }
      return {id: 0}
    },
    exceptFirst(){
      if(this.videos.length>0){
        return this.videos.slice(1)
      }
      return []
    }
  }
};
</script>