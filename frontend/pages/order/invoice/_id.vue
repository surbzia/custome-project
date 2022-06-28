<template>

  <section class="advertise">

    <Banner title="Order Invoice" />
    <div class="container" >
      <div class="card m-2 p-4">
        <section class="add-to-cart" v-if="order != null">
          <div class="container order-invoice">
            <div class="row">
              <div class="col-md-4">
                <p><b>Invoice# </b> {{ order.id }}</p>
              </div>
              <div class="col-md-4">
                <!-- <p><b>Date :</b> {{ dateFormated(order.created_at) }}</p> -->
                <p><b>Date :</b> {{ order.created_date_formatted_us }}</p>
              </div>
              <div class="col-md-4">
                <p>
                 <span> Order Status :</span>
                  <OrderStatus :order_status="order.status"/>
                </p>
              </div>
            </div>
            <div class="bill-list">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Bill To</th>
                    <th>Ship To</th>
                  </tr>
                  <tr>
                    <td>
                      <ul>
                        <li>
                          <b>Name : </b> {{ order.billing_first_name }}
                          {{ order.billing_last_name }}
                        </li>
                        <li><b>Email : </b> {{ order.billing_email }}</li>
                        <li>
                          <b>Address :</b> {{ order.billing_address }},{{
                            order.billing_address_2
                          }}
                        </li>
                        <li><b>Phone : </b> {{ order.billing_phone }}</li>
                      </ul>
                    </td>
                    <td>
                      <ul>
                        <li>
                          <b>Name : </b> {{ order.shipping_first_name }}
                          {{ order.shipping_last_name }}
                        </li>
                        <li>
                          <b>Address : </b> {{ order.shipping_address }},
                          {{ order.shipping_address_2 }}
                        </li>
                        <li><b>Phone : </b> {{ order.shipping_phone }}</li>
                        <li> &nbsp;</li>
                      </ul>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="row" v-if="order.products.length > 0">
              <div class="col-md-12">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <td class="bold">Id</td>
                      <td class="bold">Name</td>
                      <td class="bold">Price</td>
                      <td class="bold">Quantity</td>
                      <td class="bold">Total</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in order.products" :key="item.id">
                      <td>{{item.product.id}}</td>
                      <td>{{item.product.name}}</td>
                      <td>£ &nbsp;{{item.product.price}}</td>
                      <td>{{item.quantity}}</td>
                      <td>£ &nbsp;{{item.rowtotal}}</td>

                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>SUBTOTAL:</b> </td>
                      <td>£ &nbsp;{{order.subtotal}}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>TOTAL:</b> </td>
                      <td>£ &nbsp;{{order.total}}</td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <hr />
          <p><strong>ORDER NOTE :</strong> {{order.billing_notes}}</p>
        </section>
         <div v-else>
                    <span class="text-primary">Loading..</span>
                  </div>
      </div>
    </div>
  </section>
</template>
<script>
// import OrderStatus from "@/components/OrderStatus.vue";
export default {
  data() {
    return {
      order: null,
    };
  },
  methods: {
    getOrderByID() {
      let id = this.$route.params.id;
      this.$axios.get("orders/" + id).then((response) => {
        console.log(response.data.data);
        let res = response.data.data;
        this.order = res;
      });
    },
    dateFormated(date) {
      let newdate = new Date(date);
      return newdate.toLocaleString();
    }
  },
  computed: {
    loggedIn() {
      return this.$store.state.loggedIn;
    },
  },
  mounted() {
    // if (this.loggedIn) {
    this.getOrderByID();
    // } else {
    //   this.$router.push("/login");
    // }
  },
  watch: {},
};
</script>
     <style>
.bold {
  font-weight: 600;
}
 </style>
