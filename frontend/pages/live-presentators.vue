<template>
  <section class="list-of-presenters">
    <Banner title="Live Presenters" />

    <section class="albums-cover">
      <b-container fluid>
        <div class="ac-title">
          <h2>Live Presenters</h2>
        </div>
        <b-row>
          <div class="all-covers">
            <ul v-if="djs.length > 0">
              <li v-for="dj in djs" :key="dj.id">
                <nuxt-link :to="'/livestream/'+dj.id">
                  <img :src="dj.image.full_url" alt="" />
                  <span>{{dj.name}}</span>
                </nuxt-link>
              </li>
            </ul>
            <div class="row" v-else>
              <div class="col-md-12 card pt-3 pb-3">
                <h5>There is no DJ Available right now,please visit after sometime </h5>
              </div>
            </div>
            <!-- <a href="#">Download Now</a> -->
          </div>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>
export default {
    async asyncData({$axios, params}){
        const {djs} = await $axios.$get('djs?is_live=1')
        return {djs}
    },
}
</script>
