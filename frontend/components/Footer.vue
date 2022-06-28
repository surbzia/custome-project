<template>
  <footer class="">
    <div class="nletter">
      <b-container>
        <div class="nletter-title">
          <h2>Subscribe to our Newsletter</h2>
        </div>
        <b-form>
          <b-row>
            <b-col md="9">
              <b-input
                id="input-email"
                placeholder="Enter your email"
                required
                v-model="newsletter.email"
              ></b-input>
              <b-form-invalid-feedback :force-show="newsletterErrors.email.length>0" id="input-2-feedback">
                {{newsletterErrors.email.length>0?newsletterErrors.email.join(', '):''}}
              </b-form-invalid-feedback>
            </b-col>
            <b-col md="3"><b-button type="button" @click="saveNewsletter">Subscribe Now</b-button></b-col>
          </b-row>
        </b-form>
      </b-container>
    </div>

    <div class="ftr-cntc">
      <b-container>
        <b-row>
          <b-col md="4">
            <div class="ftr-cntc-blk">
              <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
              <h5>Email</h5>
              <a href="mailto:obsessionradio2018@gmal.com"
                >obsessionradio2018@gmal.com</a
              >
            </div>
          </b-col>
          <b-col md="4">
            <div class="ftr-cntc-blk">
              <span><i class="fa fa-mobile" aria-hidden="true"></i></span>
              <h5>Phone</h5>
              <a href="tel:07593 770525">07593 770525</a>
            </div>
          </b-col>
          <b-col md="4">
            <div class="ftr-cntc-blk bdr-none">
              <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              <h5>Office</h5>
              <a href="https://www.obsessiondigitalradic.com" target="_blank">www.obsessiondigitalradic.com</a>
            </div>
          </b-col>
        </b-row>

        <div class="social">
          <b-row>
            <b-col>
              <div class="ftr-soc">
                <ul>
                  <li>
                    <a href=""
                      ><i class="fa fa-facebook" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href=""
                      ><i class="fa fa-youtube-play" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href=""
                      ><i class="fa fa-instagram" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a href=""
                      ><i class="fa fa-twitter" aria-hidden="true"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </b-col>
            <b-col>
              <div class="ftr-card">
                <img src="~/assets/img/cards.png" alt="" />
              </div>
            </b-col>
          </b-row>
        </div>
      </b-container>
    </div>

    <div class="copyrit">
      <b-container>
        <p>Copyright © 2022 Obsession Digital Radio. All rights reserved.</p>
      </b-container>
    </div>
  </footer>
</template>
<script>
export default {
  data(){
    return{
      newsletter: {
        email: '',
      }
    }
  },
  methods:{
    saveNewsletter(){
      this.$store.dispatch('newsletter/save', this.newsletter)
      this.newsletter.email = '';
    }
  },
  computed:{
    loader(){
      return this.$store.state.newsletter.loading
    },
    newsletterErrors(){
        return this.$store.state.newsletter.newsletterErrors
    },
    hasErrors(){
      return this.$store.state.newsletter.hasErrors
    }
  }
}
</script>
