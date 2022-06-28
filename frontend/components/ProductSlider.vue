<template>
    <VueSlickCarousel  :arrows="true" :dots="true" :slidesToShow="5">
       <div  v-for="product  in products" :key="product.id" >
        <div class="item m-2" >
          <div class="home-first-prod-content welcome-back-prod-content">
            <div class="home-first-prod-content-img">
              <a href="#"
                ><img
                  src="~../assets/images/welcome-prod1.png"
                  alt=""
              /></a>
            </div>
            <div class="home-first-prod-content-price">
              <a href="#">$15.99</a>
            </div>
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
        </div>
       </div>
    </VueSlickCarousel>
</template>
<script>
export default {
    props: {
    products: {
      default: {},
      type: Object,
    },
  },
  data() {
    return {

    };
  },
};
</script>
