import swal from "sweetalert";

export const state = () => ({
    newsletterErrors: {email: ''},
    hasErrors: false,
    loading: false,
})
export const mutations = {
    setNewsletterSuccess(state){
        state.newsletterErrors = {email: ''};
        state.hasErrors = false
    },
    setNewsletterErrors(state, errors){
        state.newsletterErrors = errors
        state.hasErrors = true
    },
    tglLoader(state){
        state.loading = !state.loading
    },
}
export const actions = {
    async save({ commit }, {email}) {
        commit('tglLoader')
        const { data } = await this.$axios.$post('newsletters',{
            email: email
        })
        .catch(e=>{
            return e.response
        })
        if(data.id){
            if(data.id){
              commit("setNewsletterSuccess")
              swal({
                title: "You have been successfully subscribe for our newsletter",
                timer: 1100,
                icon: "success",
              });
            }
        }else{
            commit("setNewsletterErrors",data.errors)
        }
        commit('tglLoader')
    },
}
