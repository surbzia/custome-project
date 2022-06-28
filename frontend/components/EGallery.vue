<template>
  <section v-if="gallery.length>0" class="egallery">
    <div class="container">
      <div class="egallery-title">
        <h5>We Have the Best Guests</h5>
        <h2>Our Events Gallery</h2>
      </div>
      <div class="egallery-slider">
        <VueSlickCarousel
          class="mainpreview"
          ref="c5"
          :asNavFor="$refs.c6"
          :infinte="true"
          :focusOnSelect="true"
          @beforeChange="syncSliders"
        >
          <div v-for="(event_image, index) in gallery" :key="index"><img :src="event_image.image_url" alt="" /></div>
        </VueSlickCarousel>
        <VueSlickCarousel
          class="thumbpreview"
          ref="c6"
          :asNavFor="$refs.c5"
          :slidesToShow="5"
          :infinte="true"
          :arrows="false"
          :focusOnSelect="true"
          @beforeChange="syncSliders"
        >
          <div v-for="(event_image, index) in gallery" :key="index"><img :src="event_image.thumb_url" alt="" /></div>
        </VueSlickCarousel>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  components: {
  },
  data() {
    return {
      c5: undefined,
      c6: undefined,
    };
  },
  mounted() {
    this.c5 = this.$refs.c5;
    this.c6 = this.$refs.c6;
  },
  methods: {
    syncSliders(currentPosition, nextPosition) {
      this.$refs.c5.goTo(nextPosition);
      this.$refs.c6.goTo(nextPosition);
    },
  },
  props:{
    gallery:{
      type: Array,
      default: [],
    }
  }
};
</script>