<template>
  <div class="d-inline">
    <span class="" v-bind:class="[statuses[order_status].color]" > {{statuses[order_status].name}} </span>
  </div>
</template>
<script>
export default {
  props: {
    order_status: {
      type: Number,
      default: 1,
    },
  },
  data(){
      return{
          //1 = pending, 2 = processing, 3 = holded, 4 = canceled, 5 = complete/delivered
          statuses:{
             1: {color: 'text-primary', name:'Pending'},
              2: {color: 'text-warning', name:'Processing'},
              3: {color: 'text-info', name:'Holded'},
              4: {color: 'text-danger', name:'Canceled'},
              5: {color: 'text-success', name:'Completed/Delivered'},
          }
      }
  }
};
</script>
