<template>
  <section class="singleproduct">
    <Banner title="Shop" />
    <section class="s-prodct">
        <b-container>
            <b-row>
                <b-col col lg="6" sm="6">
                    <div class="img-container">
                        <img class="img-fluid" :src="product.image_url" alt="">
                    </div>
                </b-col>
                <b-col col lg="6" sm="6">
                    <div class="pro-desc">
                        <h2>{{product.name}}</h2>
                        <h4>${{product.price}}</h4>
                        <p>{{product.short_description}}</p>
                        <div class="quantity">

                        </div>
                        <button @click="addToCart" class="cartbtn btn-blue">Add To Cart</button>
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </b-col>
                 <b-col sm="12" lg="12" class="pro-details">
                     <h4>Product Description</h4>
                     <template v-html="product.description"></template>
                 </b-col>
            </b-row>
        </b-container>
    </section>

    <section v-if="product.related.length>0" class="related-products">
        <b-container>
            <div class="rpro-title">
                <h2>Related Products</h2>
            </div>
            <div class="mp-slider">
            <VueSlickCarousel :arrows="true" :dots="true" :slidesToShow="3">
                <div v-for="related in product.related" :key="related.reference_product">
                    <ProductContainer :product="related.reference" />
                </div>
            </VueSlickCarousel>
        </div>
        </b-container>
    </section>
  </section>
</template>
<script>
export default {
    async asyncData({$axios, params}){
        const {product} = await $axios.$get('products/'+params.slug)
        return {product} 
    },
    methods:{
        addToCart(){
            this.$store.commit('cart/add', {item: this.product,quantity: 1})
        }
    }
}
</script>