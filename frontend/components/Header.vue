<template>
<header>
    <section class="top-bar-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
          <div class="top-logo" data-aos="fade-right" data-aos-duration="800">
            <a href="index.php"
              ><img src="../assets/images/logo.png" class="img-fluid" alt=""
            /></a>
          </div>
          <!--top-logo-->
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div
            class="top--search-bar"
            data-aos="fade-in"
            data-aos-duration="800"
          >
            <form action="#" method="post">
              <div class="input-group">
                <div class="form-outline">
                  <input
                    type="search"
                    id="form1"
                    class="form-control"
                    placeholder="Search"
                  />
                </div>
                <button type="button" class="top-search-bar-btn">
                  <img
                    src="../assets/images/search-icon.png"
                    alt=""
                    class="img-fluid"
                  />
                </button>
              </div>
            </form>
          </div>
          <!--top--search-bar-->
        </div>

        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
          <div
            class="top-right-icons"
            data-aos="fade-left"
            data-aos-duration="800"
          >
            <ul>
              <li>
                <a href="#"><img src="../assets/images/heart.png" alt="" /></a>
              </li>
              <li>
                <a href="#"><img src="../assets/images/cart.png" alt="" /></a>
              </li>
              <li>
                <a href="#"><img src="../assets/images/user.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <!--top-logo-->
        </div>

        <div class="website-divider-line"></div>
      </div>
      <!--row-->
    </div>
    <!--container-fluid-->
  </section>
  <!--top-bar-sec-->

  <section class="navbar-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="header-navbar">
            <nav
              class="navbar navbar-expand-md"
              data-aos="fade-up"
              data-aos-duration="800"
            >
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                  </li>
                  <!-- <li class="nav-item">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Event</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Another action</a>
                  </div>
                </li> -->
                  <li class="nav-item">
                    <a class="nav-link" href="#">Books</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Audiobook</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Png</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Svg</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blogs.php">Blogs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          <!--header-navbar-->
        </div>
      </div>
      <!--row-->
    </div>
    <!--container-fluid-->
  </section>
  <!--navbar-sec-->
</header>
</template>
<script>
export default {
  computed: {
    cartTotal() {
      return this.$store.state.cart.total;
    },
    currency() {
      return this.$store.state.currency;
    },
    loggedIn() {
      return this.$store.state.loggedIn;
    },
  },
};
</script>
