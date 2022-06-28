<template>
  <section class="timeline">
    <Banner title="Schedule" />

    <section class="djlist-slider">
      <b-container>
        <div class="djlist-slider-title">
          <h2>Dj’s Listing</h2>
        </div>
        <VueSlickCarousel :arrows="true" :dots="true" :slidesToShow="9" v-bind="settings">
          <div v-for="dj in djs" :key="dj.id">
            <div class="img-holder">
              <img :src="dj.image.full_url" alt="" />
            </div>
            <h6>{{dj.name}}</h6>
          </div>
        </VueSlickCarousel>
      </b-container>
    </section>

    <section class="timeline-sec">
      <b-container>
        <div class="timeline-title">
          <h2>Timeline</h2>
        </div>
        <div class="timeline-area">
          <!-- <div class="tline-box">
            <div class="tline-top">
              <h4>Monday</h4>
              <ul>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
              </ul>
            </div>
          </div> -->

          <!-- <div class="tline-box">
            <div class="tline-top">
              <h4>Tuesday</h4>
              <ul>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
              </ul>
            </div>

            <div class="tline-whitebox">
              <b-row class="content-container">
                <b-col col lg="3">
                  <div class="img-holder">
                    <img src="~/assets/img/timelinepic.png" alt="" />
                  </div>
                </b-col>
                <b-col col md="9" class="desc-area">
                  <ul>
                    <li>Will Be Live At:</li>
                    <li>12:00 pm To 15:00 pm</li>
                    <li>Thursday</li>
                  </ul>
                  <h2>The switching yard</h2>
                  <p>
                    DJ MAT AMP aka Matthew Alakija – Listen live from the UK to
                    the ‘Switching Yard’ every Tuesday from 7 PM to 10 PM, and
                    every Thursday from 12 PM to 3 PM (full replay of the
                    previous Tuesday evening show), for a melting pot of soulful
                    beats and funky flavours.
                  </p>
                </b-col>
              </b-row>
            </div>
          </div> -->

          <div :key="dayk" v-for="(day, dayk) in days" class="tline-box">
            <div class="tline-top">
              <h4>{{dayk}}</h4>
              <ul>
                <li v-for="dj in day.djs" :key="dj.id">
                  <a href=""><img :src="dj.image.full_url" alt="" /></a>
                </li>
              </ul>
            </div>

            <div v-for="schedule in day.schedule" :key="schedule.id" class="tline-whitebox">
              <b-row class="content-container">
                <b-col lg="3" sm="3">
                  <div class="img-holder">
                    <img class="img-fluid" :src="schedule.user.image.full_url" alt="" />
                  </div>
                </b-col>
                <b-col md="9" sm="9"  class="col desc-area">
                  <ul>
                    <li>Will Be Live At:</li>
                    <li>{{schedule.start_time}} To {{schedule.end_time}}</li>
                    <li>{{schedule.day}}</li>
                  </ul>
                  <h2>{{schedule.title}}</h2>
                  <div v-html="schedule.description"></div>
                </b-col>
              </b-row>
            </div>
          </div>

          <!-- <div class="tline-box">
            <div class="tline-top">
              <h4>Thursday</h4>
              <ul>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
              </ul>
            </div>
          </div>

          <div class="tline-box">
            <div class="tline-top">
              <h4>Friday</h4>
              <ul>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
                <li>
                  <a href=""><img src="~/assets/img/Ellipse54.png" alt="" /></a>
                </li>
              </ul>
            </div>
            <div class="tline-whitebox">
              <b-row class="content-container">
                <b-col col lg="3">
                  <div class="img-holder">
                    <img src="~/assets/img/timelinepic.png" alt="" />
                  </div>
                </b-col>
                <b-col col md="9" class="desc-area">
                  <ul>
                    <li>Will Be Live At:</li>
                    <li>12:00 pm To 15:00 pm</li>
                    <li>Thursday</li>
                  </ul>
                  <h2>The switching yard</h2>
                  <p>
                    DJ MAT AMP aka Matthew Alakija – Listen live from the UK to
                    the ‘Switching Yard’ every Tuesday from 7 PM to 10 PM, and
                    every Thursday from 12 PM to 3 PM (full replay of the
                    previous Tuesday evening show), for a melting pot of soulful
                    beats and funky flavours.
                  </p>
                </b-col>
              </b-row>
            </div>
          </div> -->
        </div>
      </b-container>
    </section>
  </section>
</template>

<script>
export default {
  name: "HomePage",
  async asyncData({ $axios, params }) {
    const { djs } = await $axios.$get("djs");
    let days = {
        'monday': {
            schedule: [],
            djs: []
        },
        'tuesday': {
            schedule: [],
            djs: []
        },
        'wednesday': {
            schedule: [],
            djs: []
        },
        'thursday': {
            schedule: [],
            djs: []
        },
        'friday': {
            schedule: [],
            djs: []
        },
        'saturday': {
            schedule: [],
            djs: []
        },
        'sunday': {
            schedule: [],
            djs: []
        },
    }
    for (let i = 0; i < djs.length; i++){
        for(let q = 0; q < djs[i].schedule.length; q++){
            let user = {}
            for(let u = 0; u < djs.length; u++){
                if(djs[u].id==djs[i].schedule[q].user_id){
                    user = djs[u]
                }
            }
            djs[i].schedule[q].user = user
            days[djs[i].schedule[q].day].schedule.push(djs[i].schedule[q])
            days[djs[i].schedule[q].day].djs.push(djs[i])
        }
    }
    return { djs, days };
  },
  data(){
      return{
        settings:{
          "responsive": [
    {
      "breakpoint": 1024,
      "settings": {
        "slidesToShow": 3,
        "slidesToScroll": 3,
        "infinite": true,
        "dots": true
      }
    },
    {
      "breakpoint": 600,
      "settings": {
        "slidesToShow": 2,
        "slidesToScroll": 2,
        "initialSlide": 2
      }
    },
    {
      "breakpoint": 480,
      "settings": {
        "slidesToShow": 3,
        "slidesToScroll": 3
      }
    }
  ]
        }
          
      }
  },
  computed:{

  }
};
</script>
