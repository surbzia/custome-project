<template>
  <section class="list-of-presenters">
    <Banner title="List of Presenters" />

    <section class="albums-cover">
      <b-container fluid>
        <div class="ac-title">
          <h5>Best Music</h5>
          <h2>List of Presenters</h2>
        </div>
        <b-row>
          <div class="all-covers">
            <ul>
              <li v-for="dj in djs" :key="dj.id">
                <nuxt-link :to="'/presenters/'+dj.id">
                  <img :src="dj.image.full_url" alt="" />
                  <span>{{dj.name}}</span>
                </nuxt-link>
              </li>
            </ul>
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
        const {djs} = await $axios.$get('djs')
        return {djs} 
    },
}
</script>