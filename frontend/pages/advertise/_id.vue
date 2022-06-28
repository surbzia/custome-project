<template>
  <section class="wildcrafted">
    <Banner title="Advertising" />

    <section class="cmos">
      <b-container>
        <div class="cmos-title">
          <h2>{{ad.title}}</h2>
        </div>
        <div class="cmos-details">
          <b-row>
            <b-col col lg="6">
              <div class="img-holder">
                <img :src="ad.image_url" alt="" class="img-responsive">
              </div>
            </b-col>
            <b-col col lg="6">
              <div v-html="ad.side_description" class="content-area">
              </div>
            </b-col>
          </b-row>
          <div class="wide-section">
          <b-row>
            <b-col v-html="ad.large_description" col lg="12" class="content-area">
            </b-col>
          </b-row>
          </div>
        </div>
      </b-container>
    </section>
  </section>
</template>
<script>
export default {
    async asyncData({$axios, params}){
        const {ad} = await $axios.$get('advertisements/'+params.id)
        return {ad} 
    },
}
</script>