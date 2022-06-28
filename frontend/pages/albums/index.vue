<template>
  <section class="albums">
    <Banner title="Albums" />

    <section class="albums-cover">
      <b-container fluid>
        <div class="ac-title">
          <h5>Best Music</h5>
          <h2>List of Albums</h2>
        </div>
        <b-row>
          <div class="all-covers">
            <ul>
                <li v-for="album in albums" :key="album.id">
                    <nuxt-link :to="'/albums/'+album.album_slug">
                        <img :src="album.image_url" alt="" />
                        <span>{{album.album_name}}</span>
                    </nuxt-link>
                </li>
            </ul>
            <!-- <a class="styled" href="#">Download Now</a> -->
          </div>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>
export default {
    async asyncData({$axios, params}){
        const {albums} = await $axios.$get('albums')
        return {albums} 
    }
}
</script>