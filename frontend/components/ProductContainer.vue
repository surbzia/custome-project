<template>
  <div class="product-container">
      <NuxtLink :to="'/products/' + product.slug">
    <div class="img-holder">
      <img class="img-fluid" :src="product.image_url" alt="" />
    </div>
    </NuxtLink>
    <div class="product-name">
      <h4>{{ product.name }}</h4>
      <p>{{ product.short_description }}</p>
      <h6>${{ product.price }}</h6>
      <NuxtLink :to="'/products/' + product.slug">Add to cart</NuxtLink>
    </div>
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