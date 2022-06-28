<template>
  <section class="events">
    <Banner title="Events" />
    <section class="ne-release">
      <b-container>
        <div class="ner-title">
          <h2>New Events Releases</h2>
        </div>
        <div class="event-listing">
            <!-- TOP NAV -->
            <ul class="top-nav">
              <li>
                <a href="#!" @click="type='this_week'" :class="type=='this_week'?'active':''">Event In This Week</a>
              </li>
              <li>
                <a href="#!" @click="type='this_month'" :class="type=='this_month'?'active':''">Event In This Month</a>
              </li>
              <li>
                <a href="#!" @click="type='this_year'" :class="type=='this_year'?'active':''">Event In This Year</a>
              </li>
              <li>
                <date-range-picker
                  class="date-range-select"
                  v-model="dateRange"
                  :date-format="dateFormat"
                  :locale-data="{ firstDay: 1, format: 'dd-mm-yyyy' }"
                ></date-range-picker>
              </li>
            </ul>
            <!-- TOP NAV -->
            <!-- WHITE BOX LISTING -->
            <div class="event-container">
              <!-- EVENT ROW -->
              <div v-for="(event, index) in events" :key="index" class="event-box">
                <div class="img-holder">
                  <img height="129px" :src="event.image_url" alt="">
                </div>
                <div class="event-desc">
                  <h3>{{event.title}}</h3>
                  <ul>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i> <span><strong>Date:</strong> {{event.date}}</span></li>
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><strong>Start Time:</strong> {{event.start_time}}</span></li>
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><strong>End Time:</strong> {{event.end_time}}</span></li>
                  </ul>
                </div>
              </div>
              <div v-if="events.length==0" class="event-box">
                <h2>No Events</h2>
              </div>
              <!-- EVENT ROW -->
            </div>
            <!-- END WHITE BOX LISTING -->
        </div>
      </b-container>
    </section>

    <EGallery :gallery="event_gallery" />
  </section>
</template>

<script>
import DateRangePicker from 'vue2-daterange-picker'
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'
export default {
  name: "HomePage",
  components: { DateRangePicker },
  async asyncData({$axios, params}){
    let type = 'this_week'
    const {events, event_gallery} = await $axios.$get('events?type='+type)
    return {events, event_gallery, type} 
  },
  watch:{
    type(){
      if(this.type!=''){
        this.getEvents()
        // this.dateRange = {
        //   startDate: null,
        //   endDate: null,
        // }
      }
    },
    dateRange:{
      handler(){
        this.type='';
        var startDate = new Date(this.dateRange.startDate).toLocaleString()
        var endDate = new Date(this.dateRange.endDate).toLocaleString()
        this.$axios.$get('events?range=true&start='+startDate+'&end='+endDate).then(e=>{
          this.events = e.events
        })
      },
      deep: true,
    }
  },
  methods:{
    getEvents(){
      this.$axios.$get('events?type='+this.type).then(e=>{
        this.events = e.events
      })
    },
    dateFormat (classes, date) {
      if (!classes.disabled) {
        classes.disabled = date.getTime() < new Date()
      }
      return classes
    }
  },
  data(){
    return{
      dateRange: {
        startDate: null,
        endDate: null,
      },
    }
  }
};
</script>