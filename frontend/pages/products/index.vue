<template>
  <section class="shop">
    <Banner title="Shop" />

    <section class="shop-gallery">
        <b-container>
            <div class="sg-title">
                <h2>Our Products</h2>
            </div>
            <b-row>
                <b-col v-for="product in products.data" :key="product.id" lg="4" sm="12" md="6">
                    <ProductContainer :product="product" />
                </b-col>
            </b-row>
            <b-row class="card-pagination">
                <b-pagination
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
                ></b-pagination>
            </b-row>
        </b-container>
    </section>
  </section>
</template>
<script>
export default {
    async asyncData({$axios, params}){
        const {products} = await $axios.$get('products')
        return {products} 
    },
    mounted(){
        this.perPage = this.products.per_page
        this.rows = this.products.total
        this.currentPage = this.products.current_page
    },
    data(){
        return{
            currentPage: 1,
            perPage: 1,
            rows: 1,           
        }
    },
    watch:{
        currentPage(){
            this.getProducts()
        },
    },
    methods:{
        async getProducts(){
            const {products} = await this.$axios.$get('products?page='+this.currentPage)
            this.products = products
        }
    }
}
</script>