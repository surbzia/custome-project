<template>
  <section class="advertise">
    <Banner title="Orders" />
    <div class="container-fluid" v-if="loggedIn">
      <div class="card m-2 p-4">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="container">
                <CustomerSidebar />
              </div>
            </div>
            <div class="col-md-9">
              <div class="">
                <h5><b> Orders</b></h5>
                <table class="table table-sm orderTable">
                  <thead  class="dark">
                    <tr>
                      <td scope="col">S#</td>
                      <td scope="col">Order#</td>
                      <td scope="col">Email</td>
                      <td scope="col">Date</td>
                      <td scope="col">Total</td>
                      <td scope="col">Status</td>
                      <td scope="col">Action</td>
                    </tr>
                  </thead>
                  <div v-if="items.length == 0">
                    <span class="text-primary">Data not found.</span>
                  </div>

                  <tbody v-else>
                    <tr v-for="(item, index) in items" :key="index">
                      <td>{{ index + 1 }}</td>
                      <td>{{ item.id }}</td>
                      <td>{{ item.billing_email }}</td>
                      <td>{{ item.created_date_formatted_us }}</td>
                      <td>${{ item.total }}</td>
                      <td>
                        <OrderStatus :order_status="item.status" />
                      </td>
                      <td>
                        <nuxt-link
                          class="btn btn-outline-info btn-sm rounded-pill btn-pill"
                          :to="'/order/invoice/' + item.id"
                          ><small>View</small></nuxt-link
                        >
                      </td>
                    </tr>
                  </tbody>
                  <tfoot v-if="action.last_page >= action.current_page">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                          <button
                          class="btn"
                          @click="changePage('prevoius')"
                          :class="{
                            disabled:
                              action != 0 && action.current_page == 1,
                          }"
                        >
                          <i class="fa fa-chevron-left" aria-hidden="true"></i
                          >Previous
                        </button>
                      </td>
                      <td>

                        <button
                          @click="changePage('next')"
                          class="btn"
                          :class="{
                            disabled:
                              action != 0 && action.last_page == currentPage,
                          }"
                          >Next
                          <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </button>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
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
      action: 0,
      perPage: 5,
      currentPage: 1,
      rows: "",
      to: "",
      options: {},
      items: [],
    };
  },
  methods: {
    getAllOrders() {
      let query = "?page=" + this.currentPage;
      query += "&perPage=" + this.perPage;
      this.$axios.get("orders" + query).then((response) => {
        let res = response.data.data;
        this.action = res;
        this.items = res.data;
        this.rows = res.total;
      });
    },
    changePage(action) {
      if (action == "next" && this.currentPage != this.action.last_page) {
        this.items = [];
        this.currentPage++;
      }
      if (action == "prevoius" && this.currentPage > 1) {
         this.items = [];
        this.currentPage--;
      }
    },
  },
  computed: {
    loggedIn() {
      return this.$store.state.loggedIn;
    },
  },
  mounted() {
    if (this.loggedIn) {
      this.getAllOrders();
    } else {
      this.$router.push("/login");
    }
  },
  watch: {
    currentPage: {

      handler: function (value) {
        this.getAllOrders();
      },
    },
  },
};
</script>
<style>
.disableLink {
  pointer-events: none;
}
.btn-pill{
  padding: 0px 9px 0px 9px;
}
.orderTable{
      font-size: 13px;
}
</style>
