<template>
  <section class="login">
    <Banner title="Login" />
    <section class="contact-container">
      <b-container>
        <b-row>
          <b-col col lg="6" offset-lg="3">
            <div class="form-area">
              <b-form @submit="tryLogin">
                <h3>Login Your Account</h3>

                <label><input v-model="form.email" type="text" placeholder="Email" name="" /></label>
                <label><input v-model="form.password" type="password" placeholder="Password" name=""/></label>
                <div>
                  <b-form-checkbox
                    id="checkbox-1"
                     v-model="form.remember_me"
                    name="checkbox-1"
                    value="accepted"
                    unchecked-value="not_accepted">
                    Remember Me
                  </b-form-checkbox>
                </div>
                <label>
                  <input v-if="!loginLoader" type="submit" name="" value="Login" class="formbtn"/>
                  <i v-else class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                  <!-- <button v-else type="submit" class="formbtn">
                  </button> -->
                </label>
                <b-row class="forget-pass">
                    <b-col col lg="6">
                        <!-- <a href="">Forgot Password?</a> -->
                    </b-col>
                    <b-col col lg="6">
                        Don’t have an acount? <nuxt-link to="/register">Register</nuxt-link>
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
      title: 'Login | '+process.env.company,
    }
  },
  methods:{
    tryLogin(e){
      e.preventDefault()
      this.$store.dispatch('tryLogin',this.form)
      // this.loginLoader = false
    }
  },
  computed:{
    loginLoader(){
      return this.$store.state.loader
    },
  },

  data(){
    return{
      form:{
        email: '',
        password: '',
        remember_me: false,
      }
    }
  }
}
</script>
