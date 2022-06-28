<template>
  <section class="login">
    <Banner title="Register" />
    <section class="contact-container">
      <b-container>
        <b-row>
          <b-col col lg="6" offset-lg="3">
            <div class="form-area">
              <b-form @submit="tryLogin">
                <h3>Register Your Account</h3>

                <label>
                  <b-form-invalid-feedback :force-show="true" id="input-1-live-feedback">{{ errors.name[0] }}</b-form-invalid-feedback>
                  <input v-model="form.name" type="text" placeholder="Full Name" />
                </label>
                <label>
                  <b-form-invalid-feedback :force-show="true" id="input-1-live-feedback">{{ errors.email[0] }}</b-form-invalid-feedback>
                  <input v-model="form.email" type="email" placeholder="Email" />
                </label>
                <label>
                  <b-form-invalid-feedback :force-show="true" id="input-1-live-feedback">{{ errors.password[0] }}</b-form-invalid-feedback>
                  <input v-model="form.password" type="password" placeholder="Password" />
                </label>
                <label><input v-model="form.password_confirmation" type="password" placeholder="Confirm Password" /></label>

                <label>
                  <input v-if="!loginLoader" type="submit" name="" value="Register" class="formbtn" />
                  <i v-else class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                  <!-- <button v-else type="submit" class="formbtn">
                  </button> -->
                </label>
                <b-row class="forget-pass">
                  <b-col col lg="6">
                    <!-- <a href="">Forgot Password?</a> -->
                  </b-col>
                  <b-col col lg="6">
                    Already have an acount? <nuxt-link to="/login">Login</nuxt-link>
                  </b-col>
                </b-row>
              </b-form>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
  </section>
</template>
<script>
export default {
  head() {
    return {
      title: 'Register | ' + process.env.company,
    }
  },
  methods: {
    async tryLogin(e) {
      e.preventDefault();
      this.resetErrors()
      if (!this.loginLoader) {
        this.loginLoader = true
        let res = await this.$axios.post('register', this.form).then(function (e) {
          return { status: 1, data: e.data.data }
        }).catch(function (e) {
          return { status: 0, data: e.response.data.errors };
        })
        if (!res.status) {
          if (res.data.name) {
            this.errors.name = res.data.name
          }
          if (res.data.email) {
            this.errors.email = res.data.email
          }
          if (res.data.password) {
            this.errors.password = res.data.password
          }
          if (res.data.password_confirmation) {
            this.errors.password_confirmation = res.data.password_confirmation
          }
        } else {
          await this.$store.dispatch('tryLogin', {
            email: this.form.email,
            password: this.form.password,
          })
          this.form = {
            email: '',
            password: '',
            name: '',
            password_confirmation: '',
          }
        }
        this.loginLoader = false
      }
    },
    resetErrors() {
      this.errors = {
        name: [],
        email: [],
        password: [],
        password_confirmation: [],
      }
    }
  },
  computed: {

  },
  data() {
    return {
      loginLoader: false,
      form: {
        email: '',
        password: '',
        name: '',
        password_confirmation: '',
      },
      errors: {
        name: [],
        email: [],
        password: [],
        password_confirmation: [],
      },
    }
  }
}
</script>
