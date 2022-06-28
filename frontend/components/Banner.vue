<template>
    <!-- PAGE BANNER -->
    <section class="banner">
        <img src="~/assets/img/bannerinner.png" alt="" />
        <b-container>
            <div class="slide-cap">
                <h1>{{title}}</h1>
            </div>
        </b-container>
    </section>
    <!-- PAGE BANNER -->
</template>
<script>
export default {
    props:{
        title: {
            type: String,
            default: ''
        }
    }
}
</script>