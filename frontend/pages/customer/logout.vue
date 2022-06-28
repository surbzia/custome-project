<template>


</template>
<script>
import swal from 'sweetalert';
export default {
    mounted(){
        swal({
            title: "You have successfully logged out",
            timer: 1500,
            icon: "success",
        });
        localStorage.clear()
        this.$store.commit("setLoginStatus", false);
        this.$store.commit("setAuthToken", "");
        this.$store.commit("setloggedInUser", {});
        this.$router.push('/login');
    }
}
</script>
