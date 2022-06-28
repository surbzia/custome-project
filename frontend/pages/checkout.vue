<template>
  <section class="checkout">
    <Banner title="Check Out" />
    <section class="checkout-container">
      <b-container>
        <b-row>
          <b-col col lg="8" class="billing-form">
            <h3>Billing Details</h3>
            <b-form>
              <b-row>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_first_name" class="text-white" type="text" placeholder="First Name" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_last_name" class="text-white" type="text" placeholder="Last Name" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_address" class="text-white" type="text" placeholder="Address" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_address_2" class="text-white" type="text" placeholder="Address Line 2" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_city" class="text-white" type="text" placeholder="City" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_zip" class="text-white" type="number" placeholder="Zip Code" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_phone" class="text-white" type="number" placeholder="Phone" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input @input="billing_email" class="text-white" type="email" placeholder="Email" name="" />
                  </label>
                </b-col>
                <b-col col lg="12">
                  <label>
                    <input
                      type="text"
                      placeholder="Additional Information"
                      class="text-white"
                      name=""
                      @input="billing_notes"
                    />
                  </label>
                </b-col>
                <b-col col lg="12">
                  <b-form-checkbox
                    class="text-white"
                    id="checkbox-1"
                    v-model="same_as_billing_comp"
                    name="checkbox-1"
                  >
                    Shipping Same as Billing
                  </b-form-checkbox>
                </b-col>
              </b-row>
              <b-row v-if="!same_as_billing_comp">
                <b-col col lg="12">
                  <h3>Shipping Details</h3>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input type="text" class="text-white" @input="shipping_first_name" placeholder="First Name" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input type="text" class="text-white" @input="shipping_last_name" placeholder="Last Name" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input type="text" class="text-white" @input="shipping_address" placeholder="Address" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input type="text" class="text-white" @input="shipping_address_2" placeholder="Address Line 2" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input type="text" class="text-white" @input="shipping_city" placeholder="City" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input type="number" class="text-white" @input="shipping_zip" placeholder="Zip Code" name="" />
                  </label>
                </b-col>
                <b-col col lg="6">
                  <label>
                    <input type="number" class="text-white" @input="shipping_phone" placeholder="Phone" name="" />
                  </label>
                </b-col>
              </b-row>
            </b-form>
          </b-col>
          <b-col col lg="4" class="payment-total">
            <!-- <div class="payment">

              <h4>Payment</h4>
              <div>

                  <b-form-radio
                    v-model="selected"
                    :aria-describedby="ariaDescribedby"
                    name="some-radios"
                    value="Direct Bank Transfer"
                    >Direct Bank Transfer</b-form-radio>
                  <b-form-radio
                    v-model="selected"
                    :aria-describedby="ariaDescribedby"
                    name="some-radios"
                    value="Cash on delivery"
                    >Cash on delivery</b-form-radio
                  >
                  <b-form-radio
                    v-model="selected"
                    :aria-describedby="ariaDescribedby"
                    name="some-radios"
                    value="Online Getway"
                    >Online Getway</b-form-radio
                  >
              </div>
               <img src="~/assets/img/payments.png" alt="">
            </div> -->

            <div class="subtotal">
              <ul>
                <li v-for="item in items" :key="item.product.id">{{item.product.name}} x {{item.quantity}} <span>{{currency}} {{item.product.price*item.quantity}}</span></li>
              </ul>
              <h4>Sub Total <span>{{currency}} {{total}}</span></h4>
            </div>
            <div class="total">
              <h4>Total <span>{{currency}} {{total}}</span></h4>
            </div>
            <input v-if="items.length>0" @click="saveOrder" type="submit" class="blue-btn" value="Place An Order" />
          </b-col>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>
import { mapMutations, mapState, mapActions } from 'vuex'
export default {
  computed:{
    ...mapState({
      billing_first_name_comp: state=>state.checkout.billing_first_name,
      billing_last_name_comp: state=>state.checkout.billing_last_name,
      billing_address_comp: state=>state.checkout.billing_address,
      billing_address_2_comp: state=>state.checkout.billing_address_2,
      billing_city_comp: state=>state.checkout.billing_city,
      billing_zip_comp: state=>state.checkout.billing_zip,
      billing_phone_comp: state=>state.checkout.billing_phone,
      billing_email_comp: state=>state.checkout.billing_email,
      billing_notes_comp: state=>state.checkout.billing_notes,
      shipping_first_name_comp: state=>state.checkout.shipping_first_name,
      shipping_last_name_comp: state=>state.checkout.shipping_last_name,
      shipping_address_comp: state=>state.checkout.shipping_address,
      shipping_address_2_comp: state=>state.checkout.shipping_address_2,
      shipping_city_comp: state=>state.checkout.shipping_city,
      shipping_zip_comp: state=>state.checkout.shipping_zip,
      shipping_phone_comp: state=>state.checkout.shipping_phone,
      items: state=>state.cart.items,
      total: state=>state.cart.total,
      currency: state=>state.currency,
      // same_as_billing_comp: 'checkout/same_as_billing',
    }),
    same_as_billing_comp:{
      get(){
        return this.$store.state.checkout.same_as_billing
      },
      set(value){
        this.$store.commit('checkout/set_same_as_billing', value)
      }
    },
    items(){
      return this.$store.state.cart.items;
    }
  },
  methods: {
    ...mapMutations({
      billing_first_name: 'checkout/set_billing_first_name',
      billing_last_name: 'checkout/set_billing_last_name',
      billing_address: 'checkout/set_billing_address',
      billing_address_2: 'checkout/set_billing_address_2',
      billing_city: 'checkout/set_billing_city',
      billing_zip: 'checkout/set_billing_zip',
      billing_phone: 'checkout/set_billing_phone',
      billing_email: 'checkout/set_billing_email',
      billing_notes: 'checkout/set_billing_notes',
      shipping_first_name: 'checkout/set_shipping_first_name',
      shipping_last_name: 'checkout/set_shipping_last_name',
      shipping_address: 'checkout/set_shipping_address',
      shipping_address_2: 'checkout/set_shipping_address_2',
      shipping_city: 'checkout/set_shipping_city',
      shipping_zip: 'checkout/set_shipping_zip',
      shipping_phone: 'checkout/set_shipping_phone',
    }),
    saveOrder(){
      this.$store.dispatch('checkout/save',{
        items: this.items
      })
    },
  }
};
</script>
