<template>
  <section class="djmat">
    <Banner :title="dj.name" />

    <section class="dj-container">
      <b-container>
        <div class="mp-slider">
          <div>
            <b-row class="content-container">
              <b-col sm="6" md="6" class="desc-area">
                <ul v-if="dj.schedule.length>0">
                  <li>Will Be Live At:</li>
                  <li>{{dj.upcomming.start_time}}</li>
                  <li>{{dj.upcomming.day}}</li>
                </ul>
                <h2>{{dj.name}}</h2>
                <div v-html="dj.short_description"></div>
              </b-col>
              <b-col sm="6" md="6" class="img-area">
                <img class="img-fluid" :src="dj.image.full_url" alt="presenter" />
              </b-col>

              <b-col v-html="dj.description" col md="12" class="desc-area rest-content">
                
              </b-col>
            </b-row>
          </div>
        </div>
      </b-container>
    </section>

    <section v-if="dj.albums.length>0" class="album-thumbs">
        <b-container>
            <div class="at-title">
                <h2>Albums</h2>
            </div>
            <div class="at-gallery">
                <b-row>
                    <b-col col lg="3" v-for="album in dj.albums" :key="album.id">
                        <div class="img-holder">
                            <nuxt-link class="anchor-none" :to="'/albums/'+album.album_slug">
                            <img class="h-338" :src="album.image_url" alt="">
                            <h4>{{album.album_name}}</h4>
                            </nuxt-link>
                        </div>
                    </b-col>
                </b-row>
            </div>
        </b-container>
    </section>
  </section>
</template>
<script>
export default {
    async asyncData({$axios, params}){
        const {dj} = await $axios.$get('dj/'+params.id)
        return {dj} 
    }
}
</script>