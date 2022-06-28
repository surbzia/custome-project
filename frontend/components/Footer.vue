<template>
  <div class="">
    <footer class="footer-sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-links foo-logo-text">
              <img src="vendor/images/logo.png" class="img-fluid" alt="" />
              <ul>
                <li>
                  <a
                    ><i class="fa fa-map-marker" aria-hidden="true"></i>184 Main
                    Rd E, St Albans VIC 3021, USA</a
                  >
                </li>
                <li>
                  <a href="mailto:contact@company.com"
                    ><i class="fa fa-envelope" aria-hidden="true"></i
                    >contact@company.com</a
                  >
                </li>
                <li>
                  <a href="tel:+001 2233 456"
                    ><i class="fa fa-phone" aria-hidden="true"></i>+001 2233
                    456</a
                  >
                </li>
              </ul>
            </div>
            <!--footer-links-->
          </div>

          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-links foo-quick-link">
              <h3>Information</h3>
              <ul>
                <li><a href="#">Contact</a></li>
                <li><a href="#">FAQ's </a></li>
                <li><a href="#">My Account</a></li>
              </ul>
            </div>
            <!--footer-links-->
          </div>

          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-links foo-service-links">
              <h3></h3>
              <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Blogs</a></li>
              </ul>
            </div>
            <!--footer-links-->
          </div>

          <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-links foo-contact-links">
              <h3></h3>
              <ul>
                <li><a href="#">help Center</a></li>
                <li><a href="#">How To Get</a></li>
                <li><a href="#">Payment Method</a></li>
              </ul>
            </div>
            <!--footer-links-->
          </div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="foo-social-links">
              <h3></h3>
              <ul>
                <li>
                  <a href="https://www.facebook.com/"
                    ><i class="fa fa-facebook-official" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/"
                    ><i class="fa fa-instagram" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="https://www.twitter.com/"
                    ><i class="fa fa-twitter" aria-hidden="true"></i
                  ></a>
                </li>
              </ul>
            </div>
            <!--footer-links-->
          </div>
        </div>
        <!--row-->
      </div>
      <!--container-->
    </footer>
    <!--footer-sec-->

    <section class="all-right-reserved-sec">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="all-right-reserved-left">
              <h3>2022 Copyright Reserved</h3>
            </div>
            <!--all-right-reserved-left-->
          </div>
        </div>
        <!--row-->
      </div>
      <!--container-->
    </section>
    <!--all-right-reserved-sec-->
  </div>
</template>
<script>
export default {
  data() {
    return {
      newsletter: {
        email: "",
      },
    };
  },
  methods: {
    saveNewsletter() {
      this.$store.dispatch("newsletter/save", this.newsletter);
      this.newsletter.email = "";
    },
  },
  computed: {
    loader() {
      return this.$store.state.newsletter.loading;
    },
    newsletterErrors() {
      return this.$store.state.newsletter.newsletterErrors;
    },
    hasErrors() {
      return this.$store.state.newsletter.hasErrors;
    },
  },
};
</script>
