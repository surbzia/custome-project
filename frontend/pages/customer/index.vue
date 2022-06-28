<template>
  <section class="advertise">
    <Banner title="Profile" />
    <div class="container-fluid" v-if="loggedIn">
      <div class="card m-2 p-4">
        <!-- <h1>Profile</h1> -->
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="container">
                <CustomerSidebar />
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-area">
                <form @submit="onSubmit" id="profile-form">
                  <h5>Profile</h5>
                  <hr />
                  <div class="row">
                    <div class="col-md-12 mt-2">
                      <input
                          type="text"
                          name=""
                          form="profile-form"
                          class="form-control"
                          placeholder="Customer Name"
                          v-model="customer.name"
                        />
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-md-6 mt-2">
                      <input
                          type="email"
                          name=""
                           form="profile-form"
                           class="form-control"
                          placeholder="Customer Email"
                          v-model="customer.email"
                      />
                    </div>
                    <div class="col-md-6 mt-2">
                      <input
                        v-if="showPassword"
                        type="text"
                         form="profile-form"
                         class="form-control"
                        placeholder="Password here if want to change"
                        v-model="customer.password"
                      />
                      <input
                        v-else
                        type="password"
                         class="form-control"
                          form="profile-form"
                        placeholder="Password here if want to change"
                        v-model="customer.password"
                      />
                      <span
                        style="position: absolute; right: 29px; bottom: 7px"
                        @click="showpassword"
                      >
                        <i
                          class="fa"
                          :class="{
                            'fa-eye-slash': showPassword,
                            'fa-eye': !showPassword,
                          }"
                        ></i
                      ></span>
                      <span
                        class="text-danger"
                        v-if="errors.password.length > 0"
                        >{{ errors.password }}</span
                      >
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-right">
                      <input type="submit" class="btn btn-primary btn-sm" form="profile-form" value="Update Profile">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import swal from "sweetalert";
export default {
  data() {
    return {
      showPassword: false,
      customer: {
        id: "",
        name: "",
        email: "",
        password: "",
      },
      errors: {
        email: [],
        password: [],
      },
      success: {
        status: false,
        message: "",
      },
    };
  },
  methods: {
    showpassword() {
      this.showPassword = !this.showPassword;
    },
    async onSubmit(event) {
      event.preventDefault();
      this.errors.email = [];
      this.errors.password = [];
      var formdata = new FormData();
      formdata.append("id", this.customer.id);
      formdata.append("name", this.customer.name);
      formdata.append("email", this.customer.email);
      if (this.customer.password != null) {
        formdata.append("password", this.customer.password);
      }
      formdata.append("_method", "put");
      var res = await this.$axios
        .post("/updateprofile", formdata)
        .then(function (r) {
          return { status: 1, data: r.data };
        })
        .catch(function (e) {
          return { status: 0, data: e.response.data.errors };
        });
      if (res.status == 0) {
        if (res.data.email) {
          this.errors.email = res.data.email[0];
        }
        if (res.data.password) {
          this.errors.password = res.data.password[0];
        }
      } else {
        swal({
          title: "Profile Updated Successfully.",
          timer: 1500,
          icon: "success",
        });
      }
    },

    getCustomerDetails() {
      this.$axios.get("/me").then((resp) => {
        this.customer.id = resp.data.id;
        this.customer.name = resp.data.name;
        this.customer.email = resp.data.email;
        this.customer.password = null;
      });
    },
  },
  mounted() {
    if (this.loggedIn) {
      this.getCustomerDetails();
    } else {
      this.$router.push("/login");
    }
  },
  computed: {
    loggedIn() {
      return this.$store.state.loggedIn;
    },
  },
};
</script>
