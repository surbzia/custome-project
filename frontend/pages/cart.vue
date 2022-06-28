<template>
  <section class="addtocart">
    <Banner title="Cart" />

    <section class="addocart-container">
      <b-container>
        <b-row>
          <b-col col lg="9">
            <div class="cart-table table-responsive">
              <table>
                <tr>
                <th></th>
                <th>Pricing</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                <th></th>
              </tr>
                <tr v-for="(item, itemk) in items" :key="item.id">
                  <td class="clmn-width"><div class="cart-blk">
                   <span class="prod-img"><img :src="item.product.image_url" alt="cart image"></span>
                   <div class="prod-disp">
                     <h4>{{item.product.name}}</h4>
                     <p>Lorem Ipsum is simply dummy text of the printing</p>
                   </div>
                  </div></td>
                  <td><span class="red-price">{{currency}} {{item.product.price}}</span></td>
                  <td class="quantity-tbl">
                  <div class="quantity-blk">
                    <button @click="lessQty(itemk)" class="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
                      <input readonly type="text" :value="item.quantity">
                    <button @click="addQty(itemk)" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                  </div>
                  </td>
                  <td><span class="red-price">{{currency}} {{item.product.price*item.quantity}}</span></td>
                  <td><button @click="removeItem(itemk)" class="remove-prod"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                </tr>
              </table>
              <div class="cart-btns">
                <NuxtLink class="contin-bt" to="/products">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>Continue Shopping
                </NuxtLink>
                <!-- <a class="update-btn btn btn-secondary" href="">Update Cart</a> -->
              </div>
            </div>
          </b-col>
          <b-col class="cart-side" col lg="3">
            <div class="cart-card">
              <ul>
                <li><span class="total">Sub Total</span> <span class="price">{{currency}} {{total}}</span></li>
                <!-- <li>Shipping<span class="cart-opt">Free</span></li>
                <li>Estimate For<span class="cart-opt">United Kingdom</span></li> -->
                <li><span class="total">Total</span> <span class="price">{{currency}} {{total}}</span></li>
              </ul>
              <div v-if="items.length>0" class="checkout-btn">
                <NuxtLink class="btn btn-secondary" to="/checkout">
                  Checkout
                </NuxtLink>
              </div>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>
export default {
  data() {
    return {};
  },
  computed: {
    items() {
      return this.$store.state.cart.items;
    },
    total() {
      return this.$store.state.cart.total;
    },
    currency() {
      return this.$store.state.currency;
    },
  },
  methods:{
    lessQty(index){
      this.$store.commit('cart/qtyChange',{
        index: index,
        type: 'less'
      })
    },
    addQty(index){
      this.$store.commit('cart/qtyChange',{
        index: index,
        type: 'add'
      })
    },
    removeItem(index){
      this.$store.commit('cart/remove',{
        index: index,
      })
    }
  }
};
</script>