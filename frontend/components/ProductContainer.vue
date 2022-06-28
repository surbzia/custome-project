<template>
 <div
            class="col-lg-2 col-md-12 col-sm-12 col-xs-12"
            data-aos="fade-left"
            data-aos-duration="1200"
          >
            <div
              class="
                home-first-prod-content
                welcome-back-prod-content
                feat-prod-content
              "
            >
              <div class="home-first-prod-content-img">
                <a href="#"><img src="~../assets/images/fea-pro1.png" alt="" /></a>
              </div>
              <!--home-first-prod-content-img-->
              <div class="home-first-prod-content-price">
                <a href="#">$15.99</a>
              </div>
              <!--home-first-prod-content-price-->
              <div class="home-first-prod-content-icons">
                <ul>
                  <li>
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="left"
                      title="Quick View"
                      ><img src="../assets/images/quick-view.png" alt=""
                    /></a>
                  </li>
                  <li>
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="left"
                      title="Add to Wishlist"
                      ><img src="../assets/images/love.png" alt=""
                    /></a>
                  </li>
                  <li>
                    <a
                      href="#"
                      data-toggle="tooltip"
                      data-placement="left"
                      title="Add to Cart"
                      ><img src="../assets/images/bag.png" alt=""
                    /></a>
                  </li>
                </ul>
              </div>
            </div>
            <!--home-first-prod-content-->
          </div>
</template>
<script>
export default {
  props: {
    product: {
      default: {},
      type: Object,
    },
  },
};
</script>
