import swal from "sweetalert";

export const state = () => ({
    inquiryErrors: {email: '', name:'', message:'', subject: ''},
    hasErrors: false,
    loading: false,
})
export const mutations = {
    setInquirySuccess(state){
        state.inquiryErrors = {email: '', name:'', message:'', subject: ''};
        state.hasErrors = false
    },
    setInquiryErrors(state, errors){
        state.inquiryErrors = {
            email: (errors.email?errors.email: ''),
            name: (errors.name?errors.name: ''),
            message: (errors.message?errors.message: ''),
            subject: (errors.subject?errors.subject: ''),
        }
        state.hasErrors = true
    },
    tglLoader(state){
        state.loading = !state.loading
    },
}
export const actions = {
    async save({ commit }, {email, name,subject,message}) {
        commit('tglLoader')
        const { data } = await this.$axios.$post('inquiries',{
            email: email,
            name: name,
            subject: subject,
            message: message,
        })
        .catch(e=>{
            return e.response
        })
        if(data.id){
            if(data.id){
              commit("setInquirySuccess")
              swal({
                title: "Your inquiry has been submitted successfully.",
                timer: 1100,
                icon: "success",
              });
            }
        }else{
            commit("setInquiryErrors",data.errors)
        }
        commit('tglLoader')
    },
}
