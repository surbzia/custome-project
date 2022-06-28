<template>
  <VueSlickCarousel v-bind="slickSettings">
    <div v-for="djuser in dj" :key="djuser.id">
      <b-row class="content-container">
        <b-col sm="12" md="6" class="desc-area">
          <ul>
            <li>Will Be Live At:</li>
            <li>{{ djuser.upcomming.start_time }}</li>
            <li>{{ djuser.upcomming.day }}</li>
          </ul>
          <h2>{{ djuser.name }}</h2>
          <div v-html="djuser.short_description"></div>
          <nuxt-link :to="'/presenters/' + djuser.id">Learn More</nuxt-link>
        </b-col>
        <b-col sm="12" md="6" class="img-area">
          <img class="img-fluid" :src="djuser.image.full_url" alt="presenter" />
        </b-col>
      </b-row>
    </div>
  </VueSlickCarousel>
</template>
<script>
export default {
    props:{
        dj:{
            default: [],
            type: Array,
        }
    },
    data(){
        return {
            slickSettings: {
                "autoplay": true,
                "autoplaySpeed": 3000,
                "arrows": true,
                "dots": true,
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "adaptiveHeight": true,
                "speed": 2000,
                "infinite": false,
                // "cssEase": "linear"
            }
        }
    }
}
</script>