<template>
  <section class="contactus">
    <Banner title="Contact Us" />
    <section class="contact-container">
        <b-container>
            <b-row>
                <b-col col lg="7">
                    <div class="form-area">
                        <form action="" method="" ref="inquiryFrom" @submit.prevent="saveInquiry">
                            <h3>Get In Touch</h3>
                            <label><input v-model="inquriy.name" type="text" placeholder="Your Name" name=""></label>
                            <b-form-invalid-feedback :force-show="inquiryErrors.name.length>0" id="input-2-feedback">
                              {{inquiryErrors.name.length>0?inquiryErrors.name.join(', '):''}}
                            </b-form-invalid-feedback>
                            <label><input v-model="inquriy.email" type="email" placeholder="Email" name=""></label>
                            <b-form-invalid-feedback :force-show="inquiryErrors.email.length>0" id="input-2-feedback">
                              {{inquiryErrors.email.length>0?inquiryErrors.email.join(', '):''}}
                            </b-form-invalid-feedback>
                            <label><input v-model="inquriy.subject" type="text" placeholder="Subject" name=""></label>
                            <b-form-invalid-feedback :force-show="inquiryErrors.subject.length>0" id="input-2-feedback">
                              {{inquiryErrors.subject.length>0?inquiryErrors.subject.join(', '):''}}
                            </b-form-invalid-feedback>
                            <label><input v-model="inquriy.message" type="text" placeholder="Your Message" name=""></label>
                            <b-form-invalid-feedback :force-show="inquiryErrors.message.length>0" id="input-2-feedback">
                              {{inquiryErrors.message.length>0?inquiryErrors.message.join(', '):''}}
                            </b-form-invalid-feedback>
                            <label><input type="submit" name="" value="Send message" class="formbtn"></label>

                        </form>
                    </div>
                </b-col>
                <b-col col lg="5">
                    <div class="detail-sec">
                        <ul>
                            <li><i class="fa fa-globe" aria-hidden="true"></i><span><strong>Address :</strong>www.obsessiondigitalradio.com</span></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><span><strong>Phone :</strong>07593 770525</span></li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span><strong>E-mail :</strong>obsessionradio2018@gmail.com</span></li>
                        </ul>
                    </div>
                </b-col>
            </b-row>
        </b-container>
    </section>
  </section>
</template>
<script>
export default {
  data(){
    return{
      inquriy: {
        email: '',
        message: '',
        subject: '',
        name: '',
      }
    }
  },
  methods:{
    saveInquiry(){
      this.$store.dispatch('inquiry/save', this.inquriy)
      this.formReset();
    },
    formReset() {
      this.inquriy.email='';
      this.inquriy.message='';
      this.inquriy.subject='';
      this.inquriy.name='';
    }
  },
  computed:{
    loader(){
      return this.$store.state.inquiry.loading
    },
    inquiryErrors(){
        return this.$store.state.inquiry.inquiryErrors
    },
    hasErrors(){
      return this.$store.state.inquiry.hasErrors
    }
  }
}
</script>
