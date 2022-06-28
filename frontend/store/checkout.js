export const state = () => ({
    billing_first_name: '',
    billing_last_name: '',
    billing_address: '',
    billing_address_2: '',
    billing_city: '',
    billing_zip: '',
    billing_phone: '',
    billing_email: '',
    billing_notes: '',
    shipping_first_name: '',
    shipping_last_name: '',
    shipping_address: '',
    shipping_address_2: '',
    shipping_city: '',
    shipping_zip: '',
    shipping_phone: '',
    same_as_billing: true,
})

export const mutations = {
    set_billing_first_name(state, billing_first_name){
        state.billing_first_name = billing_first_name.target.value
    },
    set_billing_last_name(state, billing_last_name){
        state.billing_last_name = billing_last_name.target.value
    },
    set_billing_address(state, billing_address){
        state.billing_address = billing_address.target.value
    },
    set_billing_address_2(state, billing_address_2){
        state.billing_address_2 = billing_address_2.target.value
    },
    set_billing_city(state, billing_city){
        state.billing_city = billing_city.target.value
    },
    set_billing_zip(state, billing_zip){
        state.billing_zip = billing_zip.target.value
    },
    set_billing_phone(state, billing_phone){
        state.billing_phone = billing_phone.target.value
    },
    set_billing_email(state, billing_email){
        state.billing_email = billing_email.target.value
    },
    set_billing_notes(state, billing_notes){
        state.billing_notes = billing_notes.target.value
    },
    set_shipping_first_name(state, shipping_first_name){
        state.shipping_first_name = shipping_first_name.target.value
    },
    set_shipping_last_name(state, shipping_last_name){
        state.shipping_last_name = shipping_last_name.target.value
    },
    set_shipping_address(state, shipping_address){
        state.shipping_address = shipping_address.target.value
    },
    set_shipping_address_2(state, shipping_address_2){
        state.shipping_address_2 = shipping_address_2.target.value
    },
    set_shipping_city(state, shipping_city){
        state.shipping_city = shipping_city.target.value
    },
    set_shipping_zip(state, shipping_zip){
        state.shipping_zip = shipping_zip.target.value
    },
    set_shipping_phone(state, shipping_phone){
        state.shipping_phone = shipping_phone.target.value
    },
    set_same_as_billing(state, same_as_billing){
        state.same_as_billing = same_as_billing
    },
    
}
export const actions = {
    async save({ commit, state }, {items}) {
        let formData = state
        formData.items = items
        const { data } = await this.$axios.$post('orders',formData).catch(e=>{
            return e.response
        })
        if(data.errros){

        }else{
            this.$router.push('/order/payment/'+data.id)
        }
    }
}