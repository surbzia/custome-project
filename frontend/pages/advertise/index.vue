<template>
   <section class="advertise">
        <Banner title="Advertising" />

        <section class="advertise-sec">
            <b-container>
                <div class="ad-title">
                   <h2>Advertise Here On Obsession Digital Radio!</h2>
                   <p>Choose Us For All Your Advertising Needs!</p>
                </div>
                <div class="ad-cols">
                    <b-row>
                        <b-col v-for="(ad, index) in ads" :key="index" col lg="4">
                         <NuxtLink :to="`advertise/`+ad.id">   <div class="img-holder">
                                 <img :src="ad.thumb_url" alt="">
                            </div>
                            <div class="img-desc">
                                <h3>{{ad.title}}</h3>
                                <p>{{ad.sub_title}}</p>
                                <NuxtLink :to="`advertise/`+ad.id">Learn More</NuxtLink>
                            </div>
                            </NuxtLink>
                        </b-col>
                    </b-row>
                </div>
            </b-container>

        </section>
   </section>
</template>
<script>
export default {
    async asyncData({$axios}){
        const {ads} = await $axios.$get('advertisements')
        return {ads} 
    },
}
</script>