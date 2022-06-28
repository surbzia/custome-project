<template>
  <section class="checkout">
    <!-- PAGE BANNER -->
    <section class="banner">

      <b-container>
        <div class="slide-cap">
          <h1>Payment</h1>
        </div>
      </b-container>
    </section>
    <!-- PAGE BANNER -->
    <section class="checkout-container">
      <b-container>
        <b-row>
          <b-col col lg="8" class="billing-form">
            <div id="paypal-container"></div>
          </b-col>
          <b-col col lg="4" class="payment-total">
            <div class="subtotal">
              <ul>
                <li v-for="item in data.products" :key="item.id">{{item.product.name}} x {{item.quantity}} <span>{{currency}} {{parseFloat(item.rowtotal).toFixed(2)}}</span></li>
              </ul>
              <h4>Sub Total <span>{{currency}} {{total}}</span></h4>
            </div>
            <div class="total">
              <h4>Total <span>{{currency}} {{total}}</span></h4>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>
import { loadScript } from "@paypal/paypal-js";
export default {
  async asyncData({$axios, params}){
    const {data} = await $axios.$get('orders/'+params.id)
    return {data}
  },
  computed:{
    currency(){
      return this.$store.state.currency
    },
    total(){
      let total = 0;
      for(let i = 0; i < this.data.products.length; i++){
        total+=this.data.products[i].rowtotal
      }
      return parseFloat(total).toFixed(2)
    },
  },
  async mounted(){
    try {
      let paypal = await loadScript({ "client-id": "Ac_6u6DUKtm8zhXYJfkED3XlUb54jr84K0qjW5d2WiSzGhnYN_6s62nL1uFr4uq10Ym_QrVCi9-hrn3V", currency: "GBP" });
      const total = this.total
      const orderId = this.data.id
      paypal.Buttons({
        createOrder: function(data, actions) {
          // Set up the transaction
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: total
              }
            }]
          });
        },
        onApprove: async (data, actions)=>{
          // This function captures the funds from the transaction.
          let details = await actions.order.capture()
          if(details.status=='COMPLETED'){
            let {data} = await this.$axios.$post('orders/payment-success/'+orderId,{
              payment_id: details.id
            })
            this.$router.push('/order/payment/thankyou');
          }
        }
      }).render("#paypal-container");
    } catch (error) {}
  }
}
</script>
